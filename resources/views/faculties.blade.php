<!DOCTYPE html>
<html>
    <head>
        <title>faculties</title>
        <link rel="stylesheet" href="{{ asset('professors.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <script src="home.js"></script> -->
    </head>

    <body>
        @include('layouts.header')


        <main>
            @foreach ($faculties as $faculty)
            <div class="contanier">
                <div class="wrapper">
                    <img src="{{ asset('pictures/about-page/3.jpg')}}" alt="couldn't load picture">
                    <h3>{{ $faculty->faculty_name}}</h3>
                    <ul>
                        <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium, rem! Voluptatum fugiat recusandae aut incidunt facere deserunt voluptas culpa labore.</li>
                    </ul>
                </div>
            </div>
        @endforeach
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
    </script>
</html>