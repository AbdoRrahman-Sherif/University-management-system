<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Course</title>
    <link rel="stylesheet" href="{{ asset('admission.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    @include('layouts.header')
<main>
    <div class="container">
        <h1>Create a New Course</h1>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <ul style="color: red;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            <table border="1">
                <tr>
                    <th>Course Code</th>
                    <td><input type="text" name="CourseCode" required maxlength="7"></td>
                </tr>
                <tr>
                    <th>Course Name</th>
                    <td><input type="text" name="CourseName" required maxlength="50"></td>
                </tr>
                <tr>
                    <th>Credit Hours</th>
                    <td>
                        <select name="CreditHours" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Course Status</th>
                    <td>
                        <select name="CourseStatus" required>
                            <option value="accepting registrations">Accepting Registrations</option>
                            <option value="closed registrations">Closed Registrations</option>
                            <option value="suspended">Suspended</option>
                            <option value="under review">Under Review</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Assign Professor</th>
                    <td>
                        <select name="ProfessorID" required>
                            @foreach($professors as $professor)
                                <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
            </table>
            <div style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Create Course</button>
                <a href="{{ route('staff.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </form>
    </div>
</main>
<footer>
    @include('layouts.footer')
</footer>
</body>
</html>
