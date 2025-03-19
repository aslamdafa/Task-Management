@section('title', 'Tugas Pegawai')

@section('contents')
<div class="container">
    <h1 class="my-4 text-center text-primary">Tugas Pegawai Hari Ini</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($tasks->isEmpty())
        <div class="alert alert-warning text-center">Tidak ada tugas untuk hari ini.</div>
    @else
        <div class="row">
            @foreach ($tasks as $task)
                <div class="col-md-4 mb-3">
                    <div class="card border-primary">
                        <div class="card-header bg-primary text-white">
                            <h5 class="m-0">{{ $task->employee_name }}</h5>
                        </div>
                        <div class="card-body">
                            <h6 class="card-title">{{ $task->description }}</h6>
                            <p class="card-text">
                                <small class="text-muted">{{ $task->created_at->format('d/m/Y H:i') }}</small>
                            </p>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal{{ $task->id }}">
                                Edit
                            </button>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus tugas ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $task->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-warning text-white">
                                <h5 class="modal-title" id="editModalLabel{{ $task->id }}">Edit Tugas</h5>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="description">Deskripsi Tugas</label>
                                        <textarea class="form-control" id="description" name="description" required>{{ $task->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="employee_name">Nama Pegawai</label>
                                        <input type="text" class="form-control" id="employee_name" name="employee_name" value="{{ $task->employee_name }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Tombol untuk menambah tugas -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#taskModal">
        Tambah Tugas
    </button>

    <!-- Modal untuk menambah tugas (sama seperti sebelumnya) -->
    <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="taskModalLabel">Isi Tugas Pegawai</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="description">Deskripsi Tugas</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="employee_name">Nama Pegawai</label>
                            <input type="text" class="form-control" id="employee_name" name="employee_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Tugas</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection