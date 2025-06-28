<?php
/**
 * Template part for displaying the header content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package karya_anugrah
 */

?>

<header id="masthead" class="relative z-50 flex items-center justify-between gap-6 px-6 lg:px-10 2xl:px-20 py-2 border-b border-gray-300">
	<div>
		<?php if(has_custom_logo(  )): ?> 
			<div class="flex items-center gap-2">
				<?php the_custom_logo(); ?>
				<?php echo '<h4 class="hidden md:block text-xl text-brand"><a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name', 'display' ) . '</a></h4>'; ?>
			</div>
		
		<?php else: ?>
		<?php echo '<h4><a href="' . esc_url( home_url( '/' ) ) . '">' . get_bloginfo( 'name', 'display' ) . '</a></h4>';
	 endif; ?>
	</div>

	<nav id="site-navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'karya_anugrah' ); ?>">
		<button id="btn-menu"  type="button" class="lg:hidden text-2xl"  aria-controls="menu-wrap" aria-expanded="false">
			<i class="bi bi-list"></i>
		</button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'menu_class'     => 'lg:flex items-center gap-4 font-semibold ',
				'items_wrap'     => '<ul id="%1$s" class="%2$s" aria-label="submenu">%3$s</ul>',
			)
		);
		?>
	
	</nav><!-- #site-navigation -->

</header><!-- #masthead -->
