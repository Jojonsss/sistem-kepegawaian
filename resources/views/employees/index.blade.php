
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            Sistem Kepegawaian
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-light">Logout</button>
        </form>
    </div>
</nav>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Pegawai</h2>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">
            + Tambah Pegawai
        </a>
    </div>

    <div class="mb-3">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">
            Dashboard
        </a>
        <a href="{{ route('departments.index') }}" class="btn btn-outline-primary btn-sm">
            Data Departemen
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>No.</th>
                        <th>Nama Pegawai</th>
                        <th>Departemen</th>
                        <th>Jabatan</th>
                        <th>Gaji</th>
                        <th>Tanggal Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->department->name }}</td>
                            <td>{{ $employee->position }}</td>
                            <td>Rp {{ number_format((float) $employee->salary, 0, ',', '.') }}</td>
                            <td>{{ $employee->joined_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('employees.edit', $employee) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('employees.destroy', $employee) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus pegawai ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">
                                Belum ada data pegawai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
