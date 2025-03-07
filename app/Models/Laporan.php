<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;
    protected $fillable = [
        'wisata_id', 
        'tanggal', 
        'jumlah_pengunjung', 
        'total_pendapatan', 
        'catatan'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}
