<?php
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>

<div id="posts">

	<h1 class="pagetitle"><?php /* category archive */ if (is_category()) { single_cat_title(); ?>
	<?php /* tag archive */ } elseif( is_tag() ) { ?><?php _e('Post Tagged with:', 'wpzoom'); ?> "<?php single_tag_title(); ?>"
	<?php /* daily archive */ } elseif (is_day()) { ?><?php _e('Archive for', 'wpzoom'); ?> <?php the_time('F jS, Y'); ?>
	<?php /* search archive */ } elseif (is_search()) { ?><?php _e('Search Results for', 'wpzoom');?>: <strong><em><?php the_search_query(); ?></em></strong>
	<?php /* monthly archive */ } elseif (is_month()) { ?><?php _e('Archive for', 'wpzoom'); ?> <?php the_time('F, Y'); ?>
	<?php /* yearly archive */ } elseif (is_year()) { ?><?php _e('Archive for', 'wpzoom'); ?> <?php the_time('Y'); ?>
	<?php /* author archive */ } elseif (is_author()) { ?><?php _e('Author Archive','wpzoom');?>: <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->display_name; ?></a>  
	<?php /* paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?><?php _e('Archives', 'wpzoom'); ?>
	<?php /* home page */ } elseif (is_front_page()) { ?><?php _e('Recent Posts','wpzoom');?> <?php } ?></h1>
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
			<h2>THIS IS A TEST</h2>

</div><!-- end #posts -->