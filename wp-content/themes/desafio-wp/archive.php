<?php get_header(); ?>

    <section id="page-archive">
        <div class="container">
            <div class="grid">
                <div class="content-archive">
                    <div class="content-archive-fixo">
                        <div class="taxonomy-description">
                            <h1><?php single_term_title(); ?></h1>
                            <article>
                                <p><?php echo term_description(); ?></p>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="archive-section-videos">
                    <div class="row">
                        <?php
                            if(have_posts()){
                                while(have_posts()){
                                    the_post();
                                    
                                    get_template_part('template-parts/loop', 'video');

                                }
                            }
                        ?>
                    </div>
                </div>                
            </div>
        </div>
    </section>

<?php get_footer(); ?>