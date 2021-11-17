<?php
/**
 * Homepage template

 */

?>
<?php get_header(); ?>
<section>

    <?php get_template_part('template-parts/slider'); ?>

</section>
<div class="container">


    <section>

        <h2>Filmes</h2>
        <?php get_template_part('template-parts/media-row', null, array('term' => 'filmes')); ?>

    </section>

    <section>

        <h2>Documentários</h2>

        <?php get_template_part('template-parts/media-row', null, array('term' => 'documentarios')); ?>
    </section>

    <section>

        <h2>Séries</h2>

        <?php get_template_part('template-parts/media-row', null, array('term' => 'series')); ?>
    </section>

</div>
<?php get_footer(); ?>