<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailTransaksi extends Model
{
    use HasFactory;

    public function barang(): BelongsTo{
        return $this->belongsTo(Barang::class);
    }
    public function transaksi(): BelongsTo{
        return $this->belongsTo(Transaksi::class);
    }

    protected $fillable = [
      'transaksi_id'  ,
      'barang_id'  ,
      'qty'  ,
      'jumlah'  ,
    ];
}
