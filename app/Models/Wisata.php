<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_wisata', 
        'lokasi', 
        'deskripsi', 
        'kapasitas',
        'jam_operasional', 
        'harga_tiket'];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function staf()
    {
        return $this->hasMany(Staf::class);
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }  
    public function totalPendapatan()
    {
        return $this->laporan()->sum('total_pendapatan');
    }

}
