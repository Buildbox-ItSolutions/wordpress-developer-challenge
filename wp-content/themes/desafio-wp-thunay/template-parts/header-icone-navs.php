<style>
  @media only screen and (max-width: 768px){
    .menu-item::before {
      content: url(<?php echo get_template_directory_uri().'/assets/img/' ?>logoHeaderDocumentarios.svg) !important;
    }
    .menu-item:nth-of-type(1)::before {
      content: url(<?php echo get_template_directory_uri().'/assets/img/' ?>logoHeaderFilmes.svg) !important;
    }
    .menu-item:nth-of-type(3)::before {
      content: url(<?php echo get_template_directory_uri().'/assets/img/' ?>logoHeaderSeries.svg) !important;
    }
    .headerMobile .current-menu-item::before {
      content: url(<?php echo get_template_directory_uri().'/assets/img/' ?>logoHeaderDocumentariosVermelho.svg) !important;
    }
    .headerMobile .current-menu-item:nth-of-type(1)::before {
      content: url(<?php echo get_template_directory_uri().'/assets/img/' ?>logoHeaderFilmesVermelho.svg) !important;
    }
    .headerMobile .current-menu-item:nth-of-type(3)::before {
      content: url(<?php echo get_template_directory_uri().'/assets/img/' ?>logoHeaderSeriesVermelho.svg) !important;
    }
  }
</style>