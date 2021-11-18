<?php get_header(); ?>

    <section id="mainContent">

        <div class="grid-container">
            <div class="grid-x">

                <div class="cell small-12 large-6">

                    <h2><?php single_term_title(); ?></h2>

                    <p><?php term_description(); ?></p>

                </div>

                <div class="cell small-12 large-6">

                    <div class="grid-x grid-padding-x">

                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <div class="cell small-6 large-4">

                            <a href="<?php the_permalink(); ?>">

                                <?php the_post_thumbnail( 'thumbnail-home' );  ?>

                                <span class="label"><?php the_field('tempo_de_duracao'); ?>m</span>

                                <h3><?php the_title(); ?></h3>

                            </a>

                        </div>
                        <?php endwhile; else : ?>
                        <?php endif; ?>

                    </div>

                </div>

            </div>
        </div>

    </section>

<?php get_footer(); ?>