<?php
$args = array(
    'post_type' => 'video',
    'order' => 'DESC',
    'posts_per_page' => '10',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => array('documentarios')
        )
    ),
);
$getPosts = new WP_Query($args);
$categoria = $getPosts->tax_query->queries[0]['terms'][0];
?>


<div class="container">
    <h2 class="sec-title"><?php echo $categoria; ?></h2>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            if ($getPosts->have_posts()) {
                while ($getPosts->have_posts()) {
                    $getPosts->the_post();
                    $duracao = get_field("duracao", get_the_ID());
                    $imagem = get_field("imagem", get_the_ID());
                    ?>
                    <div class="card swiper-slide bg-transparent text-white">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php echo $imagem; ?>" class="card-img-top" alt="<?php the_title(); ?>">
                        </a>    
                        <div class="card-body px-0">
                            <span class="btn btn-white-outline btn-sm"><?php echo $duracao; ?>m</span>
                            <h3 class="card-title mt-3"><?php the_title(); ?></h3>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<script>
    var swiper = new Swiper(".swiper-container", {
        slidesPerView: 6,
        spaceBetween: 40,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>