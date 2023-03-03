<?php
    $banner = new WP_Query(array(
        'post_type' => 'video',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'ASC',
        'meta_query' => array(
            array(
            'key' => 'adicionar_banner',
            'value' => true,
            'type' => 'boolean',
            ),
        ) 

    ));

    if($banner->have_posts()){ ?>
        <div class="banner">
            <?php
                while($banner->have_posts()){
                    $banner->the_post();

                    $taxName = '';
                    $terms = get_the_terms( get_the_ID(), 'tipo-de-video' );
                    foreach ( $terms as $term ) {
                        $taxName .= '<span class="tax-name">'. $term->name .'</span>';
                    }
                    $tempoDuracao = get_field('duracao', get_the_ID()) ? '<span class="tempo-duracao">'. get_field('duracao', get_the_ID()) .'m</span>' : '';

                    ?>
                    <div class="banner-item" style="color: red; background-image: url(<?= get_field('imagem_do_banner', get_the_ID()); ?>);">
                        <div class="banner-conteudo">
                            <div class="container banner-caption">
                                <div class="terms">                                
                                    <?=
                                        $taxName . $tempoDuracao;
                                    ?>
                                </div>
                                <h2><?= get_the_title(); ?></h2>
                                <a href="<?= get_the_permalink(get_the_ID()); ?>" class="btn-info">Mais informações</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }                
                wp_reset_postdata(); 
            ?>
        </div>
    <?php 
    }
?>