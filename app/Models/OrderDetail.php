<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OrderDetail extends Model
{
   use HasFactory;


   protected $fillable = [
       'order_id', // relasi ke order untuk mengabil data data nya
       'tool_id', // relasi ke alat
       'quantity', // total alat yg dipinjam user
       'price_per_day', // harga alat per hari
       'subtotal',  // quantity * price_per_day * duration (diambil dari orders)
   ];


   /**
    * Relasi ke Order
    * 1 detail dimiliki oleh 1 order
    */
   public function order()
   {
       return $this->belongsTo(Order::class);
   }


   /**
    * Relasi ke Product
    * 1 detail berisi 1 produk
    */
   public function tool()
   {
       return $this->belongsTo(Tool::class);


}

}