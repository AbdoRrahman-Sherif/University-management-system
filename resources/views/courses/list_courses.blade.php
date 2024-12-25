<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Course</title>
    <link rel="stylesheet" href="{{ asset('admission.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    @include('layouts.header')
<main>
    <div class="contanier">
        <h1>Courses</h1>

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
        @if(Auth::guard('staff')->check()) <!-- Check if the user is staff -->
        @foreach($courses as $course)
        
                    <table border="1">
                        <tr>
                            <th>Course Name</th>
                            <td>{{ $course->CourseName }}</td>
                        </tr>
                        <tr>
                            <th>Credit Hours</th>
                            <td>

                                    {{ $course->CreditHours }}

                            </td>
                        </tr>
                        <tr>
                            <th>Course Status</th>
                            <td>
                                    {{ $course->CourseStatus }}
                            </td>
                        </tr>
                        <tr>
                        <form action="{{ route('courses.closeregistration') }}" method="POST">
                            @csrf

                            <input type="hidden" name="CourseCode" value="{{ $course->CourseCode }}">
                            <button type="submit">close</button>
                        </form>
                    </tr>

                    </table>
                <br  />
        @endforeach
        @elseif(Auth::guard('ug_student')->check()) 

        @foreach($courses as $course)
        @if ($course->CourseStatus == 'accepting registrations' && !in_array($course->CourseCode, $registeredCourseCodes) )
        <table border="1">
            <tr>
                <th>Course Name</th>
                <td>{{ $course->CourseName }}</td>
            </tr>
            <tr>
                <th>Credit Hours</th>
                <td>

                        {{ $course->CreditHours }}

                </td>
            </tr>
            <tr>
                <th>Course Status</th>
                <td>
                        {{ $course->CourseStatus }}
                </td>
            </tr>
            <tr>
                <th>Course Status</th>
                <td>
                    <form action="{{ route('courses.register') }}" method="POST">
                        @csrf

                        <input type="hidden" name="CourseCode" value="{{ $course->CourseCode }}">
                        <button type="submit">Register</button>
                    </form>
                    
                    
                    
                    
                    
                </td>
            </tr>
        </table>
        <br  />

        @endif
        @endforeach          

        @else
            <p>TODO.</p>
        @endif
    </div>
</main>
<footer>
    @include('layouts.footer')
</footer>
</body>
</html>
