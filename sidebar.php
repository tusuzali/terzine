<aside class="col span_4">



	<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
		<label class="hidden" for="s"><?php _e(''); ?></label>
		<input type="text" placeholder="Search" value="<?php the_search_query(); ?>" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="" />
	</form>

		
    
    <?php if ( is_active_sidebar( 'left-sidebar' ) ) : ?>
	<ul id="sidebar">
		<?php dynamic_sidebar( 'left-sidebar' ); ?>
	</ul>

<?php endif; 






