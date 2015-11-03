<?php get_header(); ?>

<div id="single">

	<div class="post post-single">
	
		<?php wp_reset_query();	if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h1><?php the_title(); ?></h1>
		<p class="postmetadata"><?php edit_post_link('EDIT','',''); ?></p>
		<?php the_content(''); ?>
		<div class="cleaner">&nbsp;</div>
		<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages', 'wpzoom').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		<div class="cleaner">&nbsp;</div>

		<?php endwhile; endif; ?>
	
	</div>
	
	<div class="post-comments">
		<?php comments_template(); ?>
	</div>

</div><!-- end of #single -->

<?php get_sidebar(); ?>

</div><!-- end main wrapper -->
</div><!-- end #main -->
<?php get_footer(); ?>