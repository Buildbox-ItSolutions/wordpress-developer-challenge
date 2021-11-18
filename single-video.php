<?php get_header(); ?>

    <section id="mainSingle">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <!-- title -->
        <div class="grid-container">

            <div class="grid-x grid-margin-x">

                <div class="cell small-12 large-8 large-offset-2">

                    <span class="label"><?php echo get_the_term_list( $post->ID, 'tipo', '', '', '' ) ?></span> <span class="label alt"><?php the_field('tempo_de_duracao'); ?>m</span>

                    <h2><?php the_title(); ?></h2>

                </div>

                <div class="cell small-12 large-12">
                    <div class="responsive-embed">
                        <?php
                        // Load value.
                        $iframe = get_field('video');

                        // Use preg_match to find iframe src.
                        preg_match('/src="(.+?)"/', $iframe, $matches);
                        $src = $matches[1];

                        // Add extra parameters to src and replcae HTML.
                        $params = array(
                            'controls'  => 0,
                            'hd'        => 1,
                            'autohide'  => 1
                        );
                        $new_src = add_query_arg($params, $src);
                        $iframe = str_replace($src, $new_src, $iframe);

                        // Add extra attributes to iframe HTML.
                        $attributes = 'frameborder="0"';
                        $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

                        // Display customized HTML.
                        echo $iframe;
                        ?>
                    </div>
                </div>

                <div class="cell small-12 large-8 large-offset-2">
                    <?php the_field('sinopse'); ?>
                </div>

            </div>

        </div>

        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>


    </section>

<?php get_footer(); ?>