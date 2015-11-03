<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // gets current page number
global $query_string; // required

/* Exclude categories from Recent Posts */
if (option::get('recent_part_exclude') != 'off') {
	if (count(option::get('recent_part_exclude'))){
		$exclude_cats = implode(",-",(array)option::get('recent_part_exclude'));
		$exclude_cats = '-' . $exclude_cats;
		$args['cat'] = $exclude_cats;
	}
}

/* Exclude featured posts from Recent Posts */
if (option::get('hide_featured') == 'on') {
	
	$featured_posts = new WP_Query( 
		array( 
			'post__not_in' => get_option( 'sticky_posts' ),
			'posts_per_page' => option::get('featured_number'),
			'meta_key' => 'wpzoom_is_featured',
			'meta_value' => 1				
			) );
		
	while ($featured_posts->have_posts()) {
		$featured_posts->the_post();
		global $post;
		$postIDs[] = $post->ID;
	}
	$args['post__not_in'] = $postIDs;
}

$args['paged'] = $paged;
if (count($args) >= 1) {
	query_posts($args);
}
?>

<div id="posts">

	<p class="pagetitle"><?php _e('Recent Posts','wpzoom');?></p>
	<?php  
	$i = 0; 
	while (have_posts()) : the_post(); unset($prev, $image); $m++;
	  
	?>   
	<div class="post post-normal">
	
		<?php
		get_the_image( array( 'size' => 'loop-main', 'width' => 120, 'height' => 90, 'before' => '<div class="cover">', 'after' => '</div>' ) );
		?>
		
		<div class="content">
			<div class="column_count"><a href="<?php the_permalink() ?>#commentspost" rel="nofollow" title="Jump to the comments"><?php comments_number('0','1','%'); ?></a></div>
			<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p class="postmetadata"><span class="category"><?php the_category(', '); ?></span> | <span class="timestamp"><?php the_time('F j, Y'); ?></span><?php edit_post_link( __('EDIT', 'wpzoom'), ' | ', ''); ?></p>
			<p><?php the_content_limit(160, ''); ?></p>
			<p class="more"><a href="<?php the_permalink(); ?>" title="Permanent Link to <?php the_title_attribute(); ?>" rel="nofollow"><?php _e('Read Full Story', 'wpzoom');?> &raquo;</a></p>   
		</div>   
	</div>
	<div class="sep">&nbsp;</div>	  
	<?php endwhile; ?>
	    
	<div class="cleaner">&nbsp;</div>
	<div class="sep">&nbsp;</div>		
	<?php get_template_part( 'pagination'); ?>
	
</div><!-- end #posts -->