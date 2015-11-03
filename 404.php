<?php get_header(); ?>

<div id="single">

	<div class="post post-single">
	
		<h1><?php _e( '404 Error (page not found)', 'wpzoom' ); ?></h1>
		<p><?php _e( 'Apologies, but the requested page cannot be found. Perhaps searching will help find a related post.', 'wpzoom' ); ?></p>

		<h2 class="title"><?php _e( 'Browse Categories', 'wpzoom' ); ?></h1>
		<ul>
			<?php wp_list_categories('title_li=&hierarchical=0&show_count=1'); ?>	
		</ul>
	
		<h2 class="title"><?php _e( 'Monthly Archives', 'wpzoom' ); ?></h1>
		<ul>
			<?php wp_get_archives('type=monthly&show_post_count=1'); ?>	
		</ul>

		<div class="cleaner">&nbsp;</div>
	
	</div>
	
	<div class="post-comments">
		<?php comments_template(); ?>
	</div>

</div><!-- end of #single -->

<?php get_sidebar(); ?>

</div><!-- end main wrapper -->
</div><!-- end #main -->
<?php get_footer(); ?>