<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>dashboard</title>
    <link rel="stylesheet" href="{{ asset('admission.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    @include('layouts.header')
<main>
    <div class="contanier">
        <h1 >Welcome to Your Dashboard Postgraduate Student!</h1>


        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @if($student)
            <table border="1">
                <tr><th>Name</th><td>{{ $student->name }}</td></tr>
                <tr><th>Email</th><td>{{ $student->university_email }}</td></tr>
                <tr><th>National ID</th><td>{{ $student->national_id }}</td></tr>
                <tr><th>Birth Date</th><td>{{ $student->date_of_birth }}</td></tr>
                <tr><th>Sex</th><td>{{ $student->gender }}</td></tr>
                <tr><th>Status</th><td>{{ $student->status }}</td></tr>
                <tr><th>section</th><td>{{ $student->section }}</td></tr>
                <tr><th>Faculty</th><td>{{ $student->faculty_name }}</td></tr>
                <tr><th>Major</th><td>{{ $student->major_code }}</td></tr>
                <tr><th>Graduate Program</th><td>{{ $student->graduate_program }}</td></tr>
                <tr><th>Allowed Credit Hours</th><td>{{ $student->allowed_credit_hours }}</td></tr>
            </table>
        @else
            <p>No data found.</p>
        @endif
    </div>


</main>
<footer>
    @include('layouts.footer')
</footer>
</body>
</html>