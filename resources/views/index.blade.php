<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Welcome to the University</h1>
        <p class="text-center">Please log in:</p>
        <div class="d-flex justify-content-center">
            <a href="{{ route('login') }}" class="btn btn-primary mx-2">Login</a>
        </div>
    </div>
</body>
</html>
