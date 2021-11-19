<div class="card--item">
    <a href="<?php the_permalink();?>">
        <div class="card--thumbnail">
            <?php the_post_thumbnail();?>
        </div>
        <div class="card--infos">
            <span class="btn btn--transparent"><?php the_field('tempo_de_duracao');?>m</span>
            <h3><?php the_title();?></h3>
        </div>
    </a>
</div>