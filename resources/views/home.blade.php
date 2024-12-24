<!DOCTYPE html>
<html>
    <head>
        <title>project</title>
        <link rel="stylesheet" href="{{ asset('home.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <script src="{{ asset('home.js') }}"></script> -->
    </head>

    <body>
        @include('layouts.header')

        <main>
            <section id="welcome">
                <h1>welcome</h1>
                <h2>Egypt-Japan University of Science and Technology</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis deserunt officia sint harum in quae omnis maiores similique accusamus voluptates culpa itaque, fuga reprehenderit ut rerum quos suscipit consequatur necessitatibus.</p>
                <a id="join_btn" href="{{ route('admission') }}">Join now</a>
            </section>
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