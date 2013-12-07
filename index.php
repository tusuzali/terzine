<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<main role="main" class="row">
    <section class="col span_8">
		<article id="main-news" class="col flexslider">
            <ul class="slides">
                <?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
			    <li> <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
    	            <div class="featured-text">
                        <h3><a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_category(); ?></a></h3>
                        <h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2> 
                        <?php the_content(); ?>
                    </div>
            		<!-- <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?> -->
		            <?php //the_content(); ?>
			    </li>
                <?php endwhile; ?>
			</ul>
		</article>

        <?php else: ?>
        <h2>No posts to display</h2>
        <?php endif; ?>

        <article id="news" class="col">
            <?php global $post; ?>
            <?php $posts = get_posts('numberposts=4&offset=1');
                    foreach ($posts as $post) : setup_postdata($post); ?>
            <?php static $count1 = 0; if ($count1 == "8") { break; } else { ?>
            <div>
    	        <?php //echo show_image('thumbnail'); ?>
    	        <div class="caption">
                    <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
    		        <p><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>

    	        </div>
    	    </div>
                <?php $count1++; } ?>
            <?php endforeach; ?>
        </article>

        <?php
            $cat_id = 7; //the certain category ID
            $category = get_category( $cat_id );
        ?>
        <article id="<?php echo $category->slug; ?>" class="cat-section col">
        <?php
            $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
            if( $latest_cat_post->have_posts() ) :
                while( $latest_cat_post->have_posts() ) :
                    $latest_cat_post->the_post(); ?>
    		
            <h4><?php echo $category->cat_name; ?></h4>
            <div class="category-home">
        		<div class="col span_6">
        	        <div class="<?php echo $category->cat_name; ?>-news news">
        	            <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
        	                <h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
        	                <div class="meta">
            	                <span class="meta-pubtime"><?php the_time('l, jS,') ?></span> | 
                                <span class="meta-comment"><?php comments_popup_link('0 Comment','1 Comment','% Comments'); ?></span>
        	                </div>
        	                <div class="<?php echo $category->cat_name; ?>-paragraph">
        	                   <p><?php the_content('Continue Reading...'); ?></p>
        	                </div> 
        	        </div>
        		</div>
                <?php endwhile; endif; ?>

                <?php $args = array(
                    'posts_per_page'   => 3,
                    'offset'           => 1,
                    'category'         => 7,
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'include'          => '',
                    'exclude'          => '',
                    'meta_key'         => '',
                    'meta_value'       => '',
                    'post_type'        => 'post',
                    'post_mime_type'   => '',
                    'post_parent'      => '',
                    'post_status'      => 'publish',
                    'suppress_filters' => true ); ?>

        		<div class="col span_6">
                    <?php $posts = get_posts($args);
                          foreach ($posts as $post) : 
                            setup_postdata($post); ?>        
                    <div class="short-news">
                        <?php //echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                        <?php the_post_thumbnail(array(100 , 100)); ?>
                        <div class="paragraph">
                            <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                            <div class="meta">
                                <span class="meta-pubtime"><?php the_time('l, jS,') ?></span> |
                                <span class="meta-comment"><?php comments_popup_link('0 Comment','1 Comment','% Comments'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
    		</div>
            <p class="view_all span_12"><a href="#">View all ? News</a></p>
        </div>
	</article>


        <?php
            $cat_id = 1; //the certain category ID
                    <?php endforeach; ?>
        		</div>
                <p class="business_all span_12"><a href="#">View all ? News</a></p>
            </div>
	   </article>

        <?php
            $cat_id = 5; //the certain category ID
            $category = get_category( $cat_id );
        ?>
        <article id="<?php echo $category->slug; ?>" class="cat-section col">
        <?php
            $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
            if( $latest_cat_post->have_posts() ) :
                while( $latest_cat_post->have_posts() ) :
                    $latest_cat_post->the_post(); ?>
            
            <h4><?php echo $category->cat_name; ?></h4>
            <div class="category-home">
                <div class="<?php echo $category->cat_name; ?>-news news">
                    <?php echo get_the_post_thumbnail($post->ID, 'medium'); ?>
                    <div class="news-split span_6">
                        <h4><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h4>
                        <div class="meta">
                            <span class="meta-pubtime"><?php the_time('l, jS,') ?></span> | 
                            <span class="meta-comment"><?php comments_popup_link('0 Comment','1 Comment','% Comments'); ?></span>
                        </div>
                        <div class="<?php echo $category->cat_name; ?>-paragraph">
                           <p><?php the_content('Continue Reading...'); ?></p>
                        </div> 
                    </div>
                </div>
                <?php endwhile; endif; ?>

            <?php $args = array(
                'posts_per_page'   => 2,
                'offset'           => 1,
                'category'         => 10,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_type'        => 'post',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'post_status'      => 'publish',
                'suppress_filters' => true ); ?>

            <div class="col">
                <?php $posts = get_posts($args);
                      foreach ($posts as $post) : 
                        setup_postdata($post); ?>        
                <div class="short-news col span_6">
                    <?php //echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                    <?php the_post_thumbnail(array(100 , 100)); ?>
                    <div class="paragraph">
                        <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                        <div class="meta">
                            <span class="meta-pubtime"><?php the_time('l, jS,') ?></span> |
                            <span class="meta-comment"><?php comments_popup_link('0 Comment','1 Comment','% Comments'); ?></span>
                <?php $args = array(
                    'posts_per_page'   => 2,
                    'offset'           => 1,
                    'category'         => 5,
                    'orderby'          => 'post_date',
                    'order'            => 'DESC',
                    'include'          => '',
                    'exclude'          => '',
                    'meta_key'         => '',
                    'meta_value'       => '',
                    'post_type'        => 'post',
                    'post_mime_type'   => '',
                    'post_parent'      => '',
                    'post_status'      => 'publish',
                    'suppress_filters' => true ); ?>

                <div class="col">
                    <?php $posts = get_posts($args);
                          foreach ($posts as $post) : 
                            setup_postdata($post); ?>        
                    <div class="short-news col span_6">
                        <?php //echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                        <?php the_post_thumbnail(array(100 , 100)); ?>
                        <div class="paragraph">
                            <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                            <div class="meta">
                                <span class="meta-pubtime"><?php the_time('l, jS,') ?></span> |
                                <span class="meta-comment"><?php comments_popup_link('0 Comment','1 Comment','% Comments'); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <p class="business_all span_12"><a href="#">View all ? News</a></p>
            </div>
            <p class="view_all span_12"><a href="#">View all ? News</a></p>
        </div>
    </article>


                   
        <article id="<?php echo $category->slug; ?>" class="cat-section col">
        <?php
            $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
            if( $latest_cat_post->have_posts() ) :
                while( $latest_cat_post->have_posts() ) :
                    $latest_cat_post->the_post(); ?>
            
            <h4><?php echo $category->cat_name; ?></h4>
            <div class="media">
                <div class="<?php echo $category->cat_name; ?>-news news">
                <?php endwhile; endif; ?>

            <?php $args = array(
                'posts_per_page'   => 4,
                'offset'           => 0,
                'category'         => 9,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'include'          => '',
                'exclude'          => '',
                'meta_key'         => '',
                'meta_value'       => '',
                'post_type'        => 'post',
                'post_mime_type'   => '',
                'post_parent'      => '',
                'post_status'      => 'publish',
                'suppress_filters' => true ); ?>

            <div class="cat-media col">
                <?php $posts = get_posts($args);
                      foreach ($posts as $post) : 
                        setup_postdata($post); ?>        
                <div class="short-news col span_3">
                    <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                    <div class="meta">
                        <span class="meta-pubtime"><?php the_time('l, jS,') ?></span><br>
                        <span class="meta-comment"><?php comments_popup_link('0 Comment','1 Comment','% Comments'); ?></span>
                    </div>
                    <div class="paragraph">
                        <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <p class="view_all span_12"><a href="#">View all ? News</a></p>
        </div>
    </article>

        </article>

        <!--Media-->
       <article id="media" class="col">            
            <h4><?php the_category( $cat_ID ); ?></h4>
            <div class="span_3 media_posts">
                <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                    <div class="meta span_12">
                        <span class="meta-pubtime"><?php the_time('l, jS,') ?></span>
                        <br>
                        <span class="meta-comment"><?php comments_popup_link('0 Comment','1 Comment','% Comments'); ?></span>
                    </div>
                <p><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>
            </div>

            <div class="span_3 media_posts">
                <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                    <div class="meta span_12">
                        <span class="meta-pubtime"><?php the_time('l, jS,') ?></span>
                        <br>
                        <span class="meta-comment"><?php comments_popup_link('0 Comment','1 Comment','% Comments'); ?></span>
                    </div>
                <p><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>
            </div>
        
            <div class="span_3 media_posts">
                <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                    <div class="meta span_12">
                        <span class="meta-pubtime"><?php the_time('l, jS,') ?></span>
                        <br>
                        <span class="meta-comment"><?php comments_popup_link('0 Comment','1 Comment','% Comments'); ?></span>
                    </div>
                <p><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>
            </div>

            <div class="span_3 media_posts">
                 <?php echo get_the_post_thumbnail($post->ID, 'thumbnail'); ?>
                    <div class="meta span_12">
                        <span class="meta-pubtime"><?php the_time('l, jS,') ?></span>
                        <br>
                        <span class="meta-comment"><?php comments_popup_link('0 Comment','1 Comment','% Comments'); ?></span>
                    </div>
                <p><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>
            </div>
            <p class="media_all span_12"><a href="">View all Business News</a></p>
        </article>
	</section>

<?php get_sidebar(); ?> 

</main>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>