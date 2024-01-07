<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cabang extends Model
{

    public function user(): HasMany{
        return $this->hasMany(User::class);
    }

    use HasFactory;
    
    protected $fillable = [
        'nama_cabang',
        'alamat',
    ];
}
