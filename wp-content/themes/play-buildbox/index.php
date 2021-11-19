<?php get_header();?>
   
<?php get_template_part('inc/sections/header-movie'); ?>

<?php _get_template_part( 'inc/sections/list-movies', null, [
    'taxonomy' => 'genero',
    'terms' => 'filmes',
    'posts_per_page' => -1,
    'SectionTitle' =>'Filmes'
]); ?>

<?php _get_template_part( 'inc/sections/list-movies', null, [
    'taxonomy' => 'genero',
    'terms' => 'documentarios',
    'posts_per_page' => -1,
    'SectionTitle' =>'Documentários'
]); ?>

<?php _get_template_part( 'inc/sections/list-movies', null, [
    'taxonomy' => 'genero',
    'terms' => 'series',
    'posts_per_page' => -1,
    'SectionTitle' =>'Series'
]); ?>



<?php get_footer();?>
    