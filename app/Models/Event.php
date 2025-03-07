<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'wisata_id', 
        'nama_event', 
        'deskripsi', 
        'tanggal_mulai', 
        'tanggal_selesai', 
        'status'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}
