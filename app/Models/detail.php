<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail';
    protected $fillable = ['id_detail', 'subtotal', 'jumlah', 'id_trans', 'id_produk'];

    public function trans()
    {
        return $this->belongsTo(transaksi::class, 'id_trans');
    }

    public function produk()
    {
        return $this->belongsTo(produk::class, 'id_produk');
    }
}
