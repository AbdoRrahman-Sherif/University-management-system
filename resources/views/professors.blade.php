<!DOCTYPE html>
<html>
    <head>
        <title>professors</title>
        <link rel="stylesheet" href="{{ asset('professors.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <script src="home.js"></script> -->
    </head>

    <body>
        @include('layouts.header')


        <main>
            <h1 id="under_dev">Under development</h1>
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