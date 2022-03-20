<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
<script>
	var url = window.location.href; <?php
	if(is_archive()){
		  $taxonomies = get_terms( array(
		    'taxonomy' => 'tipo',
		    'hide_empty' => false
		  ));
		foreach( $taxonomies as $categoria ) { ?>
			console.log('<?php echo $categoria->name; ?>');
			if("<?php echo get_term_link( $categoria ) ?>" == url){
				var menuItem = document.querySelector('.menu-item-<?php echo $categoria->term_id ?>');
				var menuItemMobile = document.querySelector('.menu-item-mobile-<?php echo $categoria->term_id ?>');
				menuItem.classList.add('current-menu-item');
				menuItemMobile.classList.add('current-menu-item');
			} <?php
		}
	}
	if(is_front_page()){ 
		$taxonomies = get_terms( array(
	    	'taxonomy' => 'tipo',
	    	'hide_empty' => true
	  	));
		foreach( $taxonomies as $categoria ) { ?>
			var <?php echo $categoria->name; ?> = tns({
				container: '.slider<?php echo $categoria->name; ?>',
				loop: false,
			    responsive: {
			      300: {
				    items: 1,
				    nav: false,
				    controls: false,
				    mouseDrag: true,
				    edgePadding: 0,
				    gutter:-100,
				    fixedWidth: false
			      },
			      360: {
				    items: 1,
				    nav: false,
				    controls: false,
				    mouseDrag: true,
				    edgePadding: 0,
				    gutter: -120,
				    fixedWidth: false
			      },
			      760: {
				    items: 4,
				    nav: false,
				    controls: false,    
				    mouseDrag: true,
				    edgePadding: 0,
				    gutter: 50,
				    fixedWidth: false
			      },
			      900: {
				    items: 6,
				    nav: false,
				    controls: false,
				    mouseDrag: true,
				    edgePadding: 0,
				    gutter: -80,
				    fixedWidth: 300
			      },
			      2000: {
				    items: 6,
				    nav: false,
				    controls: false,
				    mouseDrag: true,
				    edgePadding: 0,
				    gutter: 0,
				    fixedWidth: false
			      },
			    }
			});
		<?php } ?>
	<?php } ?>
</script>