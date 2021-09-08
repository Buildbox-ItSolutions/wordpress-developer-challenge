
    <footer class="footer">
        <section class="footer-content">
            <div class="container">
                <div class="logo">
                    <img class="logomarca" src="<?= get_template_directory_uri()?>./assets/img/logo-play.svg" alt="logo">
                </div>
                <div class="copyright">
                    © 2020 — Play — Todos os direitos reservados.
                </div>
            </div>
        </section>
    </footer>

    <?php
        global $wp;
        $urlAtual = home_url($wp->request);
        $urlFilmes = get_site_url() . '/category/filmes';
        $urlDocumentarios = get_site_url() . '/category/documentarios';
        $urlSeries = get_site_url() . '/category/series';
    ?>

    <aside class="menu-mobile">
        <div class="menu-mobile-content">
            <section class="menu-item">
                <a <?php echo $urlAtual == $urlFilmes ? 'class="active"' : ''; ?> href="<?= get_site_url() . '/category/filmes' ?>">
                    <svg version="1.1" viewBox="0 0 24 16" xmlns="http://www.w3.org/2000/svg">
                        <path transform="translate(0 -4)" d="M23.458,6.111a1,1,0,0,0-1.039.075L17,10.057V7a3,3,0,0,0-3-3H3A3,3,0,0,0,0,7V17a3,3,0,0,0,3,3H14a3,3,0,0,0,3-3V13.943l5.419,3.87A.988.988,0,0,0,23,18a1.019,1.019,0,0,0,.458-.11A1,1,0,0,0,24,17V7A1,1,0,0,0,23.458,6.111ZM15,17a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V7A1,1,0,0,1,3,6H14a1,1,0,0,1,1,1Zm7-1.943L17.721,12,22,8.943Z" />
                    </svg>
                    <div class="menu-mobile-title">Filmes</div>
                </a>
            </section>
            <section class="menu-item">
                <a <?php echo $urlAtual == $urlDocumentarios ? 'class="active"' : ''; ?> href="<?= get_site_url() . '/category/documentarios/' ?>">
                    <svg version="1.1" width="22" height="22" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
                        <path transform="translate(-1 -1)" d="M19.82,1H4.18A3.184,3.184,0,0,0,1,4.18V19.82A3.184,3.184,0,0,0,4.18,23H19.82A3.184,3.184,0,0,0,23,19.82V4.18A3.184,3.184,0,0,0,19.82,1ZM18,8h3v3H18Zm-2,3H8V3h8ZM6,11H3V8H6ZM3,13H6v3H3Zm5,0h8v8H8Zm10,0h3v3H18Zm3-8.82V6H18V3h1.82A1.181,1.181,0,0,1,21,4.18ZM4.18,3H6V6H3V4.18A1.181,1.181,0,0,1,4.18,3ZM3,19.82V18H6v3H4.18A1.181,1.181,0,0,1,3,19.82ZM19.82,21H18V18h3v1.82A1.181,1.181,0,0,1,19.82,21Z" />
                    </svg>
                    <div class="menu-mobile-title">Documentário</div>
                </a>
            </section>
            <section class="menu-item">
                <a <?php echo $urlAtual == $urlSeries ? 'class="active"' : ''; ?> href="<?= get_site_url() . '/category/series' ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                        <g transform="translate(-1 -1)">
                        <path d="M12,1A11,11,0,1,0,23,12,11.013,11.013,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9.01,9.01,0,0,1,12,21Z"/>
                        <path  d="M16.555,11.168l-6-4A1,1,0,0,0,9,8v8a1,1,0,0,0,1.555.832l6-4a1,1,0,0,0,0-1.664ZM11,14.132V9.869L14.2,12Z"/></g>
                    </svg>
                    <div class="menu-mobile-title">Séries</div>
                </a>
            </section>
        </div>
    </aside>

    

    <script src="<?= get_template_directory_uri()?>./assets/js/main.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elms = document.getElementsByClassName('splide');
            for (var i = 0, len = elms.length; i < len; i++) {
                new Splide(elms[i]).mount();
            }
            new Splide('.splide', {
                'cover': true,
                'autoplay': true,
                'interval': 5000,
                'type': 'fade',
                'rewind': true,
            }).mount();
            new Splide('#thumb01', {
                'perMove': 1,
                'fixedWidth': '278px',
                'breakpoints': {
                    '500': {
                        'fixedWidth': '160px',
                    },
                }
            }).mount();
            new Splide('#thumb02', {
                'perMove': 1,
                'fixedWidth': '278px',
                'breakpoints': {
                    '500': {
                        'fixedWidth': '160px',
                    },
                }
            }).mount();

            new Splide('#thumb03', {
                'perMove': 1,
                'fixedWidth': '278px',
                'breakpoints': {
                    '500': {
                        'fixedWidth': '160px',
                    },
                }
            }).mount();
        });
    </script>

    <?php wp_footer(); ?>

</body>

</html>

