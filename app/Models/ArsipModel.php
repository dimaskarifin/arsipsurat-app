<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipModel extends Model
{
    use HasFactory;

    protected $table = 'arsipsurat';

    protected $fillable = [
        'nomor_surat',
        'kategori',
        'judul_surat',
        'document'
    ];
    protected $guarded = ["id"];
}
