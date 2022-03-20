<?php 
  $taxonomies = get_terms( array(
    'taxonomy' => 'tipo',
    'hide_empty' => false
  )); 
  $linkLogo = get_template_directory_uri() . '/assets/img/logo-play.svg';
?>
<nav class="headerPrincipal">
  <div class="container">
    <div class="logo">
		<a href="<?php echo get_home_url() ?>" class="custom-logo-link" rel="home" aria-current="page"><img src="<?php echo $linkLogo; ?>" class="custom-logo" alt="Play"></a>     
    </div>
    <div class="containerMenu">
      <ul id="menu-menu-principal" class="menu"> <?php
        foreach( $taxonomies as $category ) { ?>
          <li id="menu-item-<?php echo $category->ID ?>" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-<?php echo $category->term_id ?>"><a href="<?php echo get_term_link( $category ) ?>"><?php echo $category->name ?></a></li> <?php
        } ?>
      </ul>
    </div>
  </div>
</nav>

<nav class="headerMobile">
  <div class="container">
    <div class="containerMenuMobile">
      <ul id="menu-menu-principal-1" class="menu"> <?php
        foreach( $taxonomies as $category ) { ?>
          <li id="menu-item-<?php echo $category->ID ?>" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-mobile-<?php echo $category->term_id ?> menu-item-<?php echo $category->term_id ?>"><a href="<?php echo get_term_link( $category ) ?>"><?php echo $category->name ?></a></li> <?php
        } ?>
      </ul>
    </div>
  </div>
</nav>
