<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Khusus Admin</title>
</head>
<body style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; font-family: Arial, sans-serif; background-color: #f8f9fa;">
    <div class="container" style="text-align: center;">
        <h1 style="margin-bottom: 20px;">Akses website hanya khusus admin 'WEREHOUSE BPBD'</h1>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="dropdown-item has-icon text-danger" style="display: inline-block; padding: 10px 20px; font-size: 16px; color: #fff; background-color: #dc3545; border: none; border-radius: 5px; cursor: pointer; margin-top: 20px;">
                <i class="fas fa-door-open" style="margin-right: 8px;"></i> Keluar
            </button>
        </form>
    </div>
</body>
</html>
