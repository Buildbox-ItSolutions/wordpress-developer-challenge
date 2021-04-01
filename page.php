<?php get_header();?>

    <section class="single">
      <div class="padding">
        <div class="container-fluid">
          <div class="row justify-content-md-center">
            <div class="col-sm-12 col-lg-2"></div>
            <div class="col-sm-12 col-lg-8">
              <div class="tags">
                <span class="badge bg-light text-dark me-3">Filme</span>
                <span class="badge border-light text-light mt-3">130m</span>
              </div>

              <h1 class="mt-3">Pellentesque habitant morbi</h1>
            </div>
            <div class="col-sm-12 col-lg-2"></div>

          </div>


        </div>
      </div>

      <video controls>
        <source src="<?=get_template_directory_uri()?>/assets/video/teste.mp4" type="video/mp4">
        <!-- <source src="movie.ogg" type="video/ogg"> -->
      </video>

      <div class="padding">
        <div class="container-fluid">
          <p>Praesent et risus est. Nullam nec euismod arcu. Integer massa sem, iaculis sit amet ante et, fermentum sollicitudin est. Proin egestas felis arcu, eget egestas nisi accumsan non. Donec tincidunt et ipsum nec consectetur. Fusce dapibus, urna id cursus accumsan, lacus diam sagittis enim, in facilisis lorem purus in magna. Aenean sed augue commodo, auctor purus ac, varius purus. Etiam vel congue ligula, id porttitor dui. Aenean interdum mi ante, in volutpat quam laoreet quis. Donec aliquam convallis tempus.</p>
        </div>
      </div>
    </section>

    <section class="categorias-icones">
      <ul>
        <li>
          <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="16" viewBox="0 0 24 16"><defs><style>.a{fill:#fff;}</style></defs><path class="a" d="M23.458,6.111a1,1,0,0,0-1.039.075L17,10.057V7a3,3,0,0,0-3-3H3A3,3,0,0,0,0,7V17a3,3,0,0,0,3,3H14a3,3,0,0,0,3-3V13.943l5.419,3.87A.988.988,0,0,0,23,18a1.019,1.019,0,0,0,.458-.11A1,1,0,0,0,24,17V7A1,1,0,0,0,23.458,6.111ZM15,17a1,1,0,0,1-1,1H3a1,1,0,0,1-1-1V7A1,1,0,0,1,3,6H14a1,1,0,0,1,1,1Zm7-1.943L17.721,12,22,8.943Z" transform="translate(0 -4)"/></svg>
            <span>Filmes</span>
          </a>
        </li>
        <li>
          <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"><defs><style>.a{fill:#fff;}</style></defs><path class="a" d="M19.82,1H4.18A3.184,3.184,0,0,0,1,4.18V19.82A3.184,3.184,0,0,0,4.18,23H19.82A3.184,3.184,0,0,0,23,19.82V4.18A3.184,3.184,0,0,0,19.82,1ZM18,8h3v3H18Zm-2,3H8V3h8ZM6,11H3V8H6ZM3,13H6v3H3Zm5,0h8v8H8Zm10,0h3v3H18Zm3-8.82V6H18V3h1.82A1.181,1.181,0,0,1,21,4.18ZM4.18,3H6V6H3V4.18A1.181,1.181,0,0,1,4.18,3ZM3,19.82V18H6v3H4.18A1.181,1.181,0,0,1,3,19.82ZM19.82,21H18V18h3v1.82A1.181,1.181,0,0,1,19.82,21Z" transform="translate(-1 -1)"/></svg>
            <span>DocumentÃ¡rios</span>
          </a>
        </li>
        <li>
          <a href="">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"><defs><style>.a{fill:#fff;}</style></defs><g transform="translate(-1 -1)"><path class="a" d="M12,1A11,11,0,1,0,23,12,11.013,11.013,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9.01,9.01,0,0,1,12,21Z"/><path class="a" d="M16.555,11.168l-6-4A1,1,0,0,0,9,8v8a1,1,0,0,0,1.555.832l6-4a1,1,0,0,0,0-1.664ZM11,14.132V9.869L14.2,12Z"/></g></svg>
            <span>SÃ©ries</span>
          </a>
        </li>
      </ul>
    </section>



<?php get_footer();?>
