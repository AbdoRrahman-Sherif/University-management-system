<!DOCTYPE html>
<html>
    <head>
        <title>about</title>
        <link rel="stylesheet" href="{{ asset('about.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <script src="home.js"></script> -->
    </head>

    <body>
        @include('layouts.header')


        <main>
            <section id="about_s1">
                <h1>About E-JUST</h1>
                <h2>Egypt-Japan University of Science and Technology (E-JUST)</h2>
                <h3>الجامعة المصرية اليابانية للعلوم والتكنولوجيا‎</h3>
                <h3>エジプト日本科学技術大学</h3>
            </section>
            <section id="about_s2">
                <div class="wrapper">
                    <img src="pictures/about-page/1.jpg" alt="couldn't load picture">
                    <p>
                        Egypt-Japan University of Science and Technology (E-JUST) is a research university with an ambition 
                        to cultivate an academic environment and become a benchmark for the Egyptian and African countries in education.
                        It was first established as a bilateral agreement project between the Egyptian and Japanese governments in 
                        May 2009 and later in 2010 it was ready to accept its first batch of students and make the dream a reality.
                    </p>
                </div>

                <div class="wrapper">
                    <img src="pictures/about-page/2.jpg" alt="couldn't load picture">
                    <p>
                        There is a strong relationship between both governments where they both divide the cooperation 
                        cohesively to ensure positive results. The Japan International Cooperation Agency (JICA) fully 
                        supports EJUST by sending their administrative and academic experts to assist and guide in the 
                        technical and managerial system of the university, as well as sending academic experts from the 
                        Japanese Supporting University Consortium (JSUC) to support in teaching, conducting joint research 
                        and co-supervising graduate students. Additionally, they provide state-of-the-art machinery, equipment 
                        and tools for research purposes. The Egyptian government fully runs and financially supports the university, 
                        which is managed by Egyptian members from both the academic and administrative staff.
                        All decisions that govern the university are made through its Board of Trustees (BOT) which is composed 
                        of 15 prominent figures from Egypt and Japan. They represent stakeholders from the government, as well as members 
                        from the academic field and industry from both countries.
                    </p>
                </div>

                <div class="wrapper">
                    <img src="pictures/about-page/3.jpg" alt="couldn't load picture">
                    <h3>Vision</h3>
                    <ul>
                        <li>A status of national and international recognition.</li>
                        <li>A first class international academic institution known worldwide for the high standard of its educational system, the high standard of its graduates and for the achievements of its research centers.</li>
                        <li>A world class center of excellence for higher education and research including regional and global reach.</li>
                        <li>One of the top 500 international universities within 10 years.</li>
                        <li>A success story and living proof of the Egyptian and Japanese cooperation that promotes human development in the region and the world.</li>
                    </ul>
                </div>

                <div class="wrapper">
                    <img src="pictures/about-page/4.png" alt="couldn't load picture">
                    <h3>Mission</h3>
                    <ul>
                        <li>To become a role model for graduate education and research institutions in Egypt by fostering the Japanese educational standards, policies, and systems. In this regard, E-JUST will foster links of collaboration between Egyptian and Japanese academic institutions.</li>
                        <li>To award academic degrees to E-JUST’s special graduates that hold a high status of international recognition and accreditation from local and international accrediting bodies.</li>
                        <li>To contribute to the enhancement and improvement of human resources in the region, by providing a high level educational system and offering pragmatic and innovative solutions to human needs.</li>
                        <li>To promote and support the establishment of strong businesses, and strengthen technical and commercial ties between Japanese industries and organizations and their counterparts in countries and regions served by E-JUST.</li>
                    </ul>
                </div>

                <div class="wrapper">
                    <img src="pictures/about-page/5.jpg" alt="couldn't load picture">
                    <h3>Concept</h3>
                    <ul>
                        <li>National university based on a partnership between Egypt and Japan.</li>
                        <li>A first class, leading university meant to serve Egypt, the Middle East and Africa.</li>
                        <li>Role model for Egypt’s 21st century universities and Higher Education reform in Egypt.</li>
                        <li>Research-oriented university.</li>
                        <li>Japanese-style approach (lab-based education, practical implementation and problem-solving).</li>
                        <li>Unique academic programs (close interaction with the industry, multidisciplinary research, Information and Communications Technology (ICT) utilization …etc)</li>
                    </ul>
                </div>

                <div class="wrapper">
                    <img src="pictures/about-page/6.jpg" alt="couldn't load picture">
                    <h3>Vision</h3>
                    <ul>
                        <li>A status of national and international recognition.</li>
                        <li>A first class international academic institution known worldwide for the high standard of its educational system, the high standard of its graduates and for the achievements of its research centers.</li>
                        <li>A world class center of excellence for higher education and research including regional and global reach.</li>
                        <li>One of the top 500 international universities within 10 years.</li>
                        <li>A success story and living proof of the Egyptian and Japanese cooperation that promotes human development in the region and the world.</li>
                    </ul>
                </div>

                <div class="wrapper">
                    <h3>Study in Japan programs</h3>
                    <p>
                        E-JUST, with the cooperation of Ministry of Higher Education (MOHE) in Egypt and Japanese Supporting University Consortium (JSUC), prepared a program for Ph.D. students to have the opportunity to study and conduct their research in Japan with partner universities for a period of 6-9 months.
                    </p>
                </div>

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