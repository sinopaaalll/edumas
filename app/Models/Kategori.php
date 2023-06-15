<?php

namespace App\Models;

use App\Models\Pengaduan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pengaduan(): HasMany
    {
        return $this->hasMany(Pengaduan::class);
    }

}
