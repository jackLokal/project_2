<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id_trans';
    protected $fillable = ['id_trans', 'nama_pembeli', 'total', 'id_user'];

    protected function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function detail()
    {
        return $this->hasMany(detail::class, 'id_trans');
    }
}
