	<footer>
		<div class="menu-mobile">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu_principal',
						'container' => false,
					)
				);
            ?>
		</div>
		<div class="wrapper">
			<div class="logo-footer">
				<?php echo logo_play();?>
				<?php echo footer_copy();?>
			</div>
		</div>
	</footer>
	<?php wp_footer();?>
	</body>
</html>

