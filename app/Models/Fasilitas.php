<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $fillable = [
        'wisata_id', 
        'nama_fasilitas', 
        'status'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}
