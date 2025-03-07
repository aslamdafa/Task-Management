<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    use HasFactory;
    protected $fillable = [
        'pemesanan_id', 
        'waktu_checkin', 
        'status'];

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
