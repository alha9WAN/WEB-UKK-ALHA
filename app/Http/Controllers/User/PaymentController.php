<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

use Midtrans\Notification;
use App\Models\Payment;
use Midtrans\Snap;
class PaymentController extends Controller
{
       /*
   |--------------------------------------------------------------------------
   | 1. HALAMAN PEMBAYARAN (SHOW)
   |--------------------------------------------------------------------------
   */

   public function show(Order $order)
   {
       //1.Pastikan order milik user
       if ($order->user_id != auth()->id()) {
           abort(403);
       }


       try {


           //2.Jika belum ada snap token, buat baru
           if (!$order->snap_token) {
            // INI MEMNGGIL FUNCTION BAGIAN 2 ( YAITU GENERTE SNAP TOKEN)
               $snapToken = $this->generateSnapToken($order);
            //    BAGIAN INI
               if (!$snapToken) {
    dd("Snap Token gagal dibuat");
}


               $order->snap_token = $snapToken;
               $order->save();
           }


           return view('user.pages.detailOrder', [
               'order' => $order,
               'snapToken' => $order->snap_token,
               'clientKey' => config('midtrans.client_key')
           ]);


       } catch (\Exception $e) {


           Log::error('Payment Page Error: '.$e->getMessage());


           return back()->with('error','Terjadi kesalahan sistem');
       }
   }


    /*
   |--------------------------------------------------------------------------
   | 2. GENERATE SNAP TOKEN(BUAT SNAP TOKEN)
   |--------------------------------------------------------------------------
   */
   private function generateSnapToken(Order $order)
   {

       try {
           $params = [

               'transaction_details' => [
                   'order_id' => $order->invoice_number,
                   'gross_amount' => (int) $order->gross_amount,
               ],

               'customer_details' => [
                   'first_name' => $order->name,
                   'email' => $order->email,
                   'phone' => $order->phone,
               ]


           ];


           return Snap::getSnapToken($params);


       } catch (\Exception $e) {

    // BAGIAN INI
 dd($e->getMessage());

           return null;
       }
   }


   /*
   |--------------------------------------------------------------------------
   | 3. CALLBACK MIDTRANS
   |--------------------------------------------------------------------------
   */


   public function callback(Request $request)
   {

 Log::info('CALLBACK MASUK', $request->all()); // WAJIB DEBUG

       try {


           $notification = new Notification();


           $transactionStatus = $notification->transaction_status;
           $orderId = $notification->order_id;
           $transactionId = $notification->transaction_id;
           $paymentType = $notification->payment_type;


           $order = Order::where('invoice_number', $orderId)->first();


           if (!$order) {
               return response()->json(['message' => 'Order tidak ditemukan'], 404);
           }


           // Simpan data pembayaran
           Payment::updateOrCreate(
               ['order_id' => $order->id],
               [
                   'transaction_id' => $transactionId,
                   'payment_type' => $paymentType,
                   'transaction_status' => $transactionStatus
               ]
           );


           // Update status order
           if ($transactionStatus == 'settlement') {


               $order->payment_status = 'paid';
               $order->status = 'waiting_approval';


           } elseif ($transactionStatus == 'pending') {


               $order->payment_status = 'pending';


           } elseif (
               $transactionStatus == 'cancel' ||
               $transactionStatus == 'deny' ||
               $transactionStatus == 'expire'
           ) {


               $order->payment_status = 'failed';
               $order->status = 'cancelled';
           }


           $order->save();


           return response()->json(['status' => 'success']);


       } catch (\Exception $e) {


           Log::error('Midtrans Callback Error: '.$e->getMessage());


           return response()->json(['error' => 'Server error'], 500);
       }
   }


   /*
   |--------------------------------------------------------------------------
   | 4.  FINISH(REDIRECT)
   |--------------------------------------------------------------------------
   */
   public function finish(Request $request)
   {

       $orderId = $request->order_id;


       $order = Order::where('invoice_number', $orderId)->first();

       if (!$order) {


           return redirect()->route('halaman.orderDetail')
               ->with('error', 'Order tidak ditemukan');
       }


  // Redirect ke route notifikasi yang baru
    return redirect()->to('/notifikasi/pembayaran/berhasil?order_id=' . $orderId);
       }



     /*
   |--------------------------------------------------------------------------
   | 5.CHEK STATUS REAL TIME
   |--------------------------------------------------------------------------
   */
   public function checkStatus(Order $order)
   {


       if ($order->user_id != auth()->id()) {
           abort(403);
       }


       return response()->json([
           'payment_status' => $order->payment_status,
           'order_status' => $order->status
       ]);
   }


}
