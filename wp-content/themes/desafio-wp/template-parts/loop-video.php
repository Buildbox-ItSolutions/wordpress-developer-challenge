<div class="<?= is_front_page() ? '' : 'grid-4'; ?> video-item">
    <a href="<?= get_the_permalink(get_the_ID()); ?>">
        <div class="video-img">
            <img src="<?= get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?= get_the_title(get_the_ID()); ?>">    
        </div>
        <div class="video-conteudo"> 
            <?= get_field('duracao', get_the_ID()) ? '<span class="tempo-duracao">'. get_field('duracao', get_the_ID()) .'m</span>' : ''; ?>
            <h4><?= get_the_title(get_the_ID()); ?></h4>                                
        </div>
    </a>
</div>