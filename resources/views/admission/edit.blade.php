<!DOCTYPE html>
<html lang="en">
<head>
   <title>Edit Your Application</title>
    <link rel="stylesheet" href="{{ asset('admission.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
@include('layouts.header')
<main>

    <div class="contanier">

        <h1 class="form_title">Edit Your Application</h1>

        <form action="{{ route('admissions.update') }}" method="POST">
            @csrf

            <div class="main_user_info">
                    <input type="hidden" name="id" value="{{ $admission->id }}">

                    <div class="user_input_box">
                        <label>Name:</label>
                        <input type="text" name="name" value="{{ $admission->name }}" required>
                    </div>
                    <div class="user_input_box">
                        <label>Email:</label>
                        <input type="email" name="applicant_email" value="{{ $admission->applicant_email }}" required>
                    </div>
                    <div class="user_input_box">
                        <label>National ID:</label>
                        <input type="text" name="national_id" value="{{ $admission->national_id }}" required>
                    </div>
                    <div class="user_input_box">
                        <label>Birth Date:</label>
                        <input type="date" name="date_of_birth" value="{{ $admission->date_of_birth }}" required>
                    </div>

                    <div class="user_input_box">
                            <label>Fees Paid:</label>
                            <select name="fees_paid" required>
                                <option value="1" {{ $admission->fees_paid ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$admission->fees_paid ? 'selected' : '' }}>No</option>
                            </select>
                    </div>
                    <div class="user_input_box">
                        <label>Application Type:</label>
                        <input type="text" name="application_type" value="{{ $admission->application_type }}" required>
                    </div>
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
                        <input type="submit" name="submit" id="submit" value="submit">
                        <input type="reset" name="reset" id="reset">
                    </div>
            </div>
        </form>
        
    </div>




</main>
<footer id="footer">
    @include('layouts.footer')
</footer>
</body>
</html>
