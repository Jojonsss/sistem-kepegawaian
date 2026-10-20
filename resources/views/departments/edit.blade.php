
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Departemen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-header bg-warning">
            <h4 class="mb-0">Edit Departemen</h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('departments.update', $department) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Departemen</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name', $department->name) }}"
                        required
                        maxlength="255"
                    >
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('departments.index') }}"
                   class="btn btn-secondary">
                    Batal
                </a>
            </form>
        </div>
    </div>
</div>

</body>
</html>
