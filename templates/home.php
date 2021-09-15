<?php /* Template Name: Home Template */ ?>
<?php get_header(); ?>
<?php include 'parts/hero.php';?>
<?php 


$filmes = new WP_Query( array(
    'post_type' => 'Video',
    'posts_per_page' => 7,
    'tax_query' => array(
        array (
            'taxonomy' => 'tipo_de_video',
            'field' => 'slug',
            'terms' => 'filme',
        )
    ),
) );
$documentarios = new WP_Query( array(
    'post_type' => 'Video',
    'posts_per_page' => 7,
    'tax_query' => array(
        array (
            'taxonomy' => 'tipo_de_video',
            'field' => 'slug',
            'terms' => 'documentario',
        )
    ),
) );
$series = new WP_Query( array(
    'post_type' => 'Video',
    'posts_per_page' => 7,
    'tax_query' => array(
        array (
            'taxonomy' => 'tipo_de_video',
            'field' => 'slug',
            'terms' => 'serie',
        )
    ),
) );
while ( $filmes->have_posts() ) :
    $filmes->the_post();
    // Show Posts ...
endwhile;
wp_reset_postdata();
?>
</head>

<body>
    <!-- Swiper -->
    <section class="filmes">
        <h2 class="section__titles">Filmes</h2>
        
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php while ( $filmes->have_posts() ) : $filmes->the_post();?>  
                    <div class="swiper-slide">   
                        <a href="<?php echo get_permalink();?>">                   
                            <img src='<?php the_field('imagem_de_capa'); ?>'>
                        </a>
                        <a href="<?php echo get_permalink();?>">
                            <div class="slider__description">
                                <div class="slider__box ">
                                    <p><?php the_field('tempo_de_duracao'); ?> m</p>
                                </div>
                                <h2><?php the_title(); ?></h2>
                            </div>
                        </a>
                    </div>                    
                <?php endwhile; ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section class="documentarios">
        <h2 class="section__titles">Documentários</h2>
        <div class="swiper mySwiper2">
            <div class="swiper-wrapper">
            <?php while ( $documentarios->have_posts() ) : $documentarios->the_post();?>  
                <div class="swiper-slide">   
                    <a href="<?php echo get_permalink();?>">                   
                        <img src='<?php the_field('imagem_de_capa'); ?>'>
                    </a>
                    <a href="<?php echo get_permalink();?>">
                        <div class="slider__description">
                            <div class="slider__box ">
                                <p><?php the_field('tempo_de_duracao'); ?> m</p>
                            </div>
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </a>
                </div>                    
            <?php endwhile;?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section class="series">
        <h2 class="section__titles">Séries</h2>
        <div class="swiper mySwiper3">
            <div class="swiper-wrapper">
            <?php while ( $series->have_posts() ) : $series->the_post(); ?>  
                <div class="swiper-slide">   
                    <a href="<?php echo get_permalink();?>">                   
                        <img src='<?php the_field('imagem_de_capa'); ?>'>
                    </a>
                    <a href="<?php echo get_permalink();?>">
                        <div class="slider__description">
                            <div class="slider__box ">
                                <p><?php the_field('tempo_de_duracao'); ?> m</p>
                            </div>
                            <h2><?php the_title(); ?></h2>
                        </div>
                    </a>
                </div>                    
                <?php endwhile;?>
            </div>
        <div class="swiper-pagination"></div>
        </div>
    </section>


<?php get_footer(); ?>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 'auto',
        spaceBetween: 30,
        breakpoints: {
            // when window width is >= 320px
         320: {
          spaceBetween: 20
            }
        }

    });
    var swiper2 = new Swiper(".mySwiper2", {
        slidesPerView: 'auto',
        spaceBetween: 30,
        breakpoints: {
            // when window width is >= 320px
         320: {
          spaceBetween: 20
            }
        }
    });
    var swiper3 = new Swiper(".mySwiper3", {
            // Default parameters
            slidesPerView: 'auto',
            spaceBetween: 30,
            breakpoints: {
            // when window width is >= 320px
         320: {
          spaceBetween: 20
            }
        }
    });

    </script>
