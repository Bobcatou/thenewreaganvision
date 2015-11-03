<div id="featuredCats">

<?php wp_reset_query(); 

$m = 0;

while ($m < 3) {
	$m++;
	
	?><div class="category<?php if (($m % 3) == 0) {echo ' last';} ?>">
	<?php

	unset($cat, $catlink, $loop);
	
	$activecat = 'promoted_category_' . $m;
	
	if (!option::get($activecat)) {
		?>
		<p class="header"><?php _e('Category not selected','wpzoom');?></p>
		
		<div class="post">
		
			<p style="font-size: 11px;">You haven't yet selected a featured category for this column.</p><br />
			<p style="font-size: 11px;">To do that, please go to: <strong><a href="<?php echo get_admin_url(); ?>admin.php?page=wpzoom_options">WPZOOM Theme Options</a></strong> &raquo; Homepage &raquo; Featured Categories.</p>
		
		</div><!-- end .post -->
		<?php
	}
	else {
	
	$cat = get_category(option::get($activecat),false);
	$catlink = get_category_link(option::get($activecat));
	          
	$loop = new WP_Query( 
	array( 
		'post__not_in' => get_option( 'sticky_posts' ),
		'posts_per_page' => option::get('promoted_number'),
		'cat' => option::get($activecat)
	) );

?>

	<p class="header"><a href="<?php echo"$catlink";?>"><?php echo"$cat->name";?></a></p>
	
	<?php
	$i = 0;
	while ($loop->have_posts()) : $loop->the_post(); update_post_caches($posts);
	$i++;
	if ($i == 1)
	{
		?>
		<div class="post">
		
			<?php
			get_the_image( array( 'size' => 'featured-categories', 'width' => 290, 'height' => 180, 'before' => '<div class="cover">', 'after' => '</div>' ) );
			?>
			
			<div class="column_count"><a href="<?php the_permalink() ?>#commentspost" rel="nofollow" title="Jump to the comments"><?php comments_number('0','1','%'); ?></a></div>
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p><?php the_content_limit(140, ''); ?></p>
			<p class="more"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e('Read Full Story', 'wpzoom');?> &raquo;</a></p>
			
		</div><!-- end .post -->

		<div class="sep">&nbsp;</div>
		<p class="header"><a href="<?php echo get_category_feed_link(option::get($activecat), $feed ); ?>"><img src="<?php bloginfo('template_url'); ?>/images/icon_rss.png" width="16" height="16" alt="" /></a>
		<a href="<?php echo"$catlink";?>"><?php _e('More in', 'wpzoom');?> <?php echo"$cat->name";?></a></p>
		
		<ul class="moreStories">

		<?php
	} // if first post ($i == 1)
	else
	{
		?><li id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		</li><!-- end #post-<?php the_ID(); ?> --><?php
	}
	endwhile;
	if ($i > 0)
	{
		echo"</ul>";
	}
	?>

<?php } // if category is set
?>
</div><!-- end div.category -->
<?php
} // while?>

<div class="cleaner">&nbsp;</div>
</div><!-- end #featuredCats -->