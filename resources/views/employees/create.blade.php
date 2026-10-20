
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Pegawai</h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pegawai</label>
                    <input type="text" id="name" name="name"
                           class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="department_id" class="form-label">Departemen</label>
                    <select id="department_id" name="department_id"
                            class="form-select" required>
                        <option value="">-- Pilih Departemen --</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                @selected(old('department_id') == $department->id)>
                                {{ $department->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label">Jabatan</label>
                    <input type="text" id="position" name="position"
                           class="form-control" value="{{ old('position') }}" required>
                </div>

                <div class="mb-3">
                    <label for="salary" class="form-label">Gaji</label>
                    <input type="number" id="salary" name="salary"
                           class="form-control" min="0.01" step="0.01"
                           value="{{ old('salary') }}" required>
                </div>

                <div class="mb-3">
                    <label for="joined_at" class="form-label">Tanggal Masuk</label>
                    <input type="date" id="joined_at" name="joined_at"
                           class="form-control" value="{{ old('joined_at') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('employees.index') }}"
                   class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
