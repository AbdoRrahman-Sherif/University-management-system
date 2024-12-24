<!DOCTYPE html>
<html>
    <head>
        <title>addmission login</title>
        <link rel="stylesheet" href="{{ asset('admission.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <script src="home.js"></script> -->
        <script>
            document.getElementById("myForm").addEventListener("submit", function(event){
                var email = document.getElementById("email").value;

                if(name == "" || email == "") {
                    alert("Email field cannot be empty");
                    event.preventDefault();
                }
            });
        </script>
    </head>

    <body>
        @include('layouts.header')


        <main>
            <div class="contanier">
                <h1 class="form_title">login</h1>

                <form method="POST" action="{{ route('admission.login.submit') }}">
                    @csrf

                    <div class="main_user_info">

                            <div class="user_input_box">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" name="email" placeholder="  email" required>
                            </div> 
                           
                            <div class="user_input_box">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="  Password" required>
                            </div>
                            
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="btn">
                        <input type="submit" name="submit" id="submit" value="login">
                        <input type="reset" name="reset" id="reset">
                    </div>
                </form>
            </div>
        </main>
        <footer id="footer">
            @include('layouts.footer')
        </footer>
    </body>

    <script>
        const toggle_btn = document.querySelector('.togle_btn')
        const toggle_btn_icon = document.querySelector('.togle_btn i')
        const dropdown_menu = document.querySelector('.dropdown_menu')

        toggle_btn.onclick = function(){
            dropdown_menu.classList.toggle('open')
            const is_open = dropdown_menu.classList.contains('open')

            toggle_btn_icon.classList = is_open? "fa-solid fa-xmark" : "fa-solid fa-bars"
        }

        const validateEmail = (email) => {
            return String(email)
            .toLowerCase()
            .match(
                /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };
        document.getElementById("form").addEventListener("submit", function(event){
            var first_name = document.getElementById("first_name").value;
            var last_name = document.getElementById("last_name").value;
            var phone_number = document.getElementById("phone_number").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            // if(first_name == "") {
            //     alert("first Name fields cannot be empty");
            //     event.preventDefault();
            // }
            // if(last_name == "") {
            //     alert("last Name fields cannot be empty");
            //     event.preventDefault();
            // }

            // if(phone_number == "") {
            //     alert("phone number fields cannot be empty");
            //     event.preventDefault();
            // } else if (phone_number.length != 11) {
            //     alert("invaild phone number");
            //     event.preventDefault();
            // }

            if (phone_number.length != 11) {
                alert("invaild phone number");
                event.preventDefault();
            }


            if(!validateEmail(email)){
                alert("invaild E-mail");
                event.preventDefault();
            }

            // if(email.length == 0){
            //     alert("E-mail feild cannot be empty");
            //     event.preventDefault();
            // } else if(!validateEmail(email)){
            //     alert("invalid E-mail");
            //     event.preventdefault();
            // }

            // if(password.length == 0){
            //     alert("Password feild cannot be empty");
            //     event.preventDefault();
            // }
            if(confirm_password != password){
                alert("passwords does not match");
                event.preventDefault();
            }
            
        });
    </script>
</html>