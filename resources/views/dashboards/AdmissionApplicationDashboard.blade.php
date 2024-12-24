<!DOCTYPE html>
<head>
    <title>Admission Dashboard</title>
    <link rel="stylesheet" href="{{ asset('admission.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    @include('layouts.header')
<main>

    <div class="contanier">
        <h1 >Welcome to Your Dashboard</h1>




        @if($admission)
            <table border="1">
                <tr><th>Name</th><td>{{ $admission->name }}</td></tr>
                <tr><th>Email</th><td>{{ $admission->applicant_email }}</td></tr>
                <tr><th>National ID</th><td>{{ $admission->national_id }}</td></tr>
                <tr><th>Exam Date</th><td>{{ $admission->exam_date }}</td></tr>
                <tr><th>Exam Status</th><td>{{ $admission->exam_status }}</td></tr>
                <tr><th>Fees Paid</th><td>{{ $admission->fees_paid ? 'Yes' : 'No' }}</td></tr>
                <tr><th>Application Type</th><td>{{ $admission->application_type }}</td></tr>
            </table>


            @if ($errors->any())
            <div class="alert alert-danger ">  
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br />
                    @endforeach 
            </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <div class="btn">
                <a href="{{ route('admissions.edit') }}"><input type="button" name="edit" id="edit" value="edit">
                </a>
            </div>
            <form action="{{ route('admissions.destroy') }}" method="POST" style="display: inline;">
                @csrf
                <div class="btn">
                <button type="submit" onclick="return confirm('Are you sure you want to delete your application?')">Delete Application</button>
                </div>
            </form>
        @else
            <p>No data found for your application.</p>
        @endif
    </div>
</main>
    <footer id="footer">
        @include('layouts.footer')
    </footer>
</body>
</html>
