<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Admin
    </h1>

    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-danger">
        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
    </button>
    </form>
</body>
</html>
