<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        // Mengambil semua tugas dari database
        $tasks = Task::all(); 
        // Mengembalikan view dengan data tugas
        return view('tasks.index', compact('tasks')); 
    }

    public function store(Request $request)
{
    $request->validate([
        'description' => 'required|string|max:255',
        'employee_name' => 'required|string|max:100',
    ]);

    Task::create([
        'description' => $request->description,
        'employee_name' => $request->employee_name,
    ]);

    // Pastikan mengarahkan kembali ke halaman Trello
    return redirect()->route('trello.index')->with('success', 'Tugas berhasil ditambahkan!');
}
}