
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Departemen</title>
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
            <button class="btn btn-light" type="submit">Logout</button>
        </form>
    </div>
</nav>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Departemen</h2>
        <a href="{{ route('departments.create') }}" class="btn btn-primary">
            + Tambah Departemen
        </a>
    </div>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm mb-3">
        Kembali ke Dashboard
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
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
                        <th>Nama Departemen</th>
                        <th>Jumlah Pegawai</th>
                        <th width="190">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departments as $department)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $department->name }}</td>
                            <td>{{ $department->employees_count }}</td>
                            <td>
                                <a href="{{ route('departments.edit', $department) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('departments.destroy', $department) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus departemen ini?')">
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
                            <td colspan="4" class="text-center">
                                Belum ada data departemen.
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
