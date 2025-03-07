<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staf extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'wisata_id', 
        'nama_staf', 
        'posisi', 
        'shift', 
        'status'];

    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }
}
