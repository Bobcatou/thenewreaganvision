<?php
/*
Template Name: Blog Archives
*/
?>

<?php get_header(); ?>

<div id="single">
	<div class="post post-single">
	
		<?php wp_reset_query();  ?>
		<h1><?php the_title(); ?></h1>
		<div class="sep">&nbsp;</div>
		<h2 class="archive"><?php _e('The Last 20 Posts', 'wpzoom');?></h2>
		<ul>
			<?php query_posts('showposts=20'); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li>
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a> | <?php the_time(); ?> | <span class="comments"><?php _e('Comments', 'wpzoom');?> (<?php echo $post->comment_count ?>)</span></li>
			<?php endwhile; endif; ?>
		</ul>
		<div class="sep">&nbsp;</div>
		
		<h2 class="archive"><?php _e('Categories', 'wpzoom');?></h2>
		<ul>
			<?php wp_list_categories('title_li=&hierarchical=0&show_count=1'); ?>
		</ul>
		
		<div class="sep">&nbsp;</div>
		
		<h2 class="archive"><?php _e('Monthly Archives', 'wpzoom');?></h2>
		<ul>
			<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
		</ul>
		
		<div class="cleaner">&nbsp;</div>
	</div>
</div><!-- end of #single -->

<?php get_sidebar(); ?>

</div><!-- end main wrapper -->
</div><!-- end #main -->

<?php get_footer(); ?>