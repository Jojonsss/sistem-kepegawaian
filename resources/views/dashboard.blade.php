
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Sistem Kepegawaian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand">Sistem Kepegawaian</span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-light">
                Logout
            </button>
        </form>
    </div>
</nav>

<div class="container py-5">
    <h2>Dashboard</h2>
    <p class="text-muted">
        Selamat datang, {{ auth()->user()->name }}!
    </p>

    <div class="row g-4 mt-2">
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4>Data Departemen</h4>
                    <p>
                        Kelola data departemen, termasuk tambah, edit,
                        dan hapus.
                    </p>
                    <a href="{{ route('departments.index') }}"
                       class="btn btn-primary">
                        Buka Data Departemen
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h4>Data Pegawai</h4>
                    <p>
                        Kelola identitas pegawai, jabatan, gaji,
                        tanggal masuk, dan departemen.
                    </p>
                    <a href="{{ route('employees.index') }}"
                       class="btn btn-success">
                        Buka Data Pegawai
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
