<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Pastikan untuk mengimpor model Task

class TrelloController extends Controller
{
    public function index()
    {
        $tasks = Task::whereDate('created_at', now())->get(); // Ambil tugas hari ini
        return view('trello.index', compact('tasks')); // Kirim tugas ke view
    }
}