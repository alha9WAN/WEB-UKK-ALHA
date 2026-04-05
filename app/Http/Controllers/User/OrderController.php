<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
    use App\Models\Tool;
use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{

// MENAPILKAN HALAAMAN ORDER DAN MEMANGGIL DATA DATA ALAT NY
public function create($id)
{
    $tool = Tool::findOrFail($id);

    return view('user.pages.peminjaman', compact('tool'));
}

    /**
     * SIMPAN PEMINJAMAN
     * 1 order = 1 alat
     */
    public function store(Request $request, $id)
    {
        $request->validate(
[
    // Data diri
    'name' => 'required|string|max:100',
    'email' => 'required|email|max:100',
    'phone' => 'required|max:20',
    'nik' => 'required|digits:16',
    'address' => 'required',
    'notes' => 'nullable',

                // Data peminjaman
    'start_date' => 'required|date|after_or_equal:today',
    'end_date' => 'required|date|after:start_date',
    'quantity' => 'required|integer|min:1',
    'ktp_image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
],

[
    // PESAN VALIDASI

    'name.required' => 'Nama lengkap wajib diisi',
    'name.max' => 'Nama maksimal 100 karakter',

    'email.required' => 'Email wajib diisi',
    'email.email' => 'Format email tidak valid',

    'phone.required' => 'Nomor HP wajib diisi',

    'nik.required' => 'NIK wajib diisi',
    'nik.digits' => 'NIK harus 16 digit',

    'address.required' => 'Alamat wajib diisi',

    'start_date.required' => 'Tanggal pinjam wajib diisi',
    'start_date.after_or_equal' => 'Tanggal pinjam tidak boleh sebelum hari ini',

    'end_date.required' => 'Tanggal kembali wajib diisi',
    'end_date.after' => 'Tanggal kembali harus setelah tanggal pinjam',

    'quantity.required' => 'Jumlah alat wajib diisi',
    'quantity.min' => 'Jumlah alat minimal 1',

    'ktp_image.required' => 'Foto KTP wajib diupload',
    'ktp_image.image' => 'File harus berupa gambar',
    'ktp_image.mimes' => 'Format KTP harus JPG atau PNG',
    'ktp_image.max' => 'Ukuran KTP maksimal 2MB',
]
);


// 2.tambahkan try(untuk kondisi ketika ada 1 yang gagal maka semua proses tidak dilanjutkan )
try {

    // proses simpan

    // kode 4
      DB::beginTransaction();
       $tool = Tool::findOrFail($id);

    // kode 5 cek stok
if ($request->quantity > $tool->stock) {

// ADA TAMBAHN INIA
    DB::rollBack();

    return back()->withErrors([
        'quantity' => 'Stok tidak mencukupi'
    ]);
}


    // 6.uplod ktp
     $imagePath = null;
    if ($request->hasFile('ktp_image')) {
        $imagePath = $request->file('ktp_image')->store('ktp', 'public');
    }

    // 7.hitung lama pinjam

$start = Carbon::parse($request->start_date);
$end = Carbon::parse($request->end_date);

$days = $start->diffInDays($end);


        // 8.total
        $total = $tool->price * $request->quantity * $days;

        // kode tambahan untuk invois number
$invoice = 'INV-' . date('YmdHis') . rand(100,999);

        // 9.masukan ke data base order
        $order = Order::create([
            'invoice_number' => $invoice,
            'user_id' => auth()->id(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'nik' => $request->nik,
            'address' => $request->address,
            'notes' => $request->notes,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'ktp_image' => $imagePath,
'status' => 'waiting_approval',
            'gross_amount' => $total,
            // dan
            'duration_days' => $days,
            // dan
 'purpose' => $request->notes ?? '-',
        ]);


        // 10.masukan ke order detail
   OrderDetail::create([
    'order_id' => $order->id,
    'tool_id' => $tool->id,
    'quantity' => $request->quantity,
    'price_per_day' => $tool->price,
    'subtotal' => $total
]);

        // 11.
           DB::commit();

// NOTIFIKASI
$petugas = \App\Models\User::where('level', 'petugas')->get();

foreach ($petugas as $petugasUser) {
    \App\Models\Notification::send(
        $petugasUser->id,
        '📥 Peminjaman Baru',
        auth()->user()->name . ' mengajukan peminjaman ' . $tool->name,
        'info'
    );
}

//11.BAGIAN REDIRCT
    return redirect()->route('payment.show', $order->id)
    ->with('success', 'Peminjaman berhasil dibuat. Silakan cek detail pesanan Anda dan lakukan pembayaran sesuai instruksi yang tersedia.');


} catch (\Exception $e) {

// 12.tambahkan ini
DB::rollback();

// TAMBAHKAN KODE DD INI
   dd($e->getMessage()); // Ini akan menampilkan error sebenarnya
    return back()->with('error', 'Terjadi kesalahan');
}

    }



// ORDER DETAIL
    /**
     * HALAMAN DETAIL ORDER
     * Menampilkan data order dan order_details
     */
    public function orderDetail (Order $order)
    {
        // Pastikan order milik user yang login
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

$order->load('details.tool');

        return view('user.pages.detailOrder', compact('order'));
    }


}