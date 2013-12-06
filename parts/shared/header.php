<header>
	<!-- <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1> -->
	<?php // bloginfo( 'description' ); ?>
	<?php // get_search_form(); ?>
</header>

<header class="row">
    <nav class="row span_12">
        <ul id="categories">
            <li><a href="/"><img src="<?php echo bloginfo('template_directory'); ?>/img/home.png"></a></li>

            <?php
            $args = array(
				'show_option_all'    => '',
				'orderby'            => 'name',
				'order'              => 'ASC',
				'style'              => 'list',
				'show_count'         => 0,
				'hide_empty'         => 0,
				'use_desc_for_title' => 1,
				'child_of'           => 0,
				'feed'               => '',
				'feed_type'          => '',
				'feed_image'         => '',
				'exclude'            => '11',
				'exclude_tree'       => '',
				'include'            => '',
				'hierarchical'       => 1,
				'title_li'           => __( '' ),
				'show_option_none'   => __('No categories'),
				'number'             => null,
				'echo'               => 1,
				'depth'              => 0,
				'current_category'   => 1,
				'pad_counts'         => 0,
				'taxonomy'           => 'category',
				'walker'             => null
			); 
			wp_list_categories( $args ); ?>
        </ul>
    </nav>
    <div class="breaking-news">
        <h4 class="breaking-icon span_2">BREAKING NEWS</h4>
        <span class="span_10">16:37 | <strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit - </strong> Vero, exercitationem placeat tempora </span> 
    </div> 
</header>