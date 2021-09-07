<?php
/**
 * The template for displaying Search Form.
 */
?>

<form method="get" id="searchform" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="input-group">
		<input type="search" class="form-control" name="s" id="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_attr_e( 'O que está procurando...', 'play' ); ?>" />
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default" value="<?php esc_attr_e( 'Buscar', 'play' ); ?>">
				<i class="glyphicon glyphicon-search"></i>
			</button>
		</span><!-- /input-group-btn -->
    </div><!-- /input-group -->
</form><!-- /searchform -->