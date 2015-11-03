<?php
$loop = new WP_Query( 
array( 
	'post__not_in' => get_option( 'sticky_posts' ),
	'posts_per_page' => option::get('featured_number'),
	'meta_key' => 'wpzoom_is_featured',
	'meta_value' => 1				
) );
?>

<div id="featPosts">
	<div id="postsBig">
		        <p style="padding-bottom:10px;font-size:11px;font-weight:bold;line-height:20px;letter-spacing:1px;font-family: Arial, Helvetica, sans-serif;">TRV FEATURED STORIES</p>

		<div class="container">
		
		<?php
		$i = 0;
		if ( $loop->have_posts() ) : ?>
		
		<ul class="posts slides_container">
			<?php while ( $loop->have_posts() ) : $loop->the_post(); $m++;
			unset($videocode);
			$videocode = get_post_meta($post->ID, 'wpzoom_post_embed_code', true);
			?>

			<li class="slide" id="post-<?php the_ID(); ?>">
				<?php if (strlen($videocode) > 1) {
					$videocode = preg_replace("/(width\s*=\s*[\"\'])[0-9]+([\"\'])/i", "$1 445 $2", $videocode);
					$videocode = preg_replace("/(height\s*=\s*[\"\'])[0-9]+([\"\'])/i", "$1 250 $2", $videocode);
					$videocode = str_replace("<embed","<param name='wmode' value='transparent'></param><embed",$videocode);
					$videocode = str_replace("<embed","<embed wmode='transparent' ",$videocode);
					?><div class="cover"><?php echo "$videocode"; ?></div>
				<?php
				} // if video is set and autoembed is disabled
				else {

					get_the_image( array( 'size' => 'homepage-slider', 'width' => 440, 'height' => 250, 'before' => '<div class="cover">', 'after' => '</div>' ) );

				} // if a video does not exist ?>
				<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<p class="postmetadata">
					<span class="timestamp"><?php the_time('F j, Y'); ?></span> | 
					<span class="category"><?php the_category(', '); ?></span> | 
					<span class="comments"><a href="<?php the_permalink() ?>#commentspost" rel="nofollow" title="Jump to the comments"><?php comments_number(__('no comments', 'wpzoom'),__('1 comment', 'wpzoom'),__('% comments', 'wpzoom')); ?></a></span>
					<?php edit_post_link( __('EDIT', 'wpzoom'), ' | ', ''); ?></p>
				<p><?php the_content_limit(240, ''); ?></p>

				<p class="more"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php _e('Read Full Story', 'wpzoom');?> &raquo;</a></p>

				<div class="cleaner">&nbsp;</div>

			</li><!-- end #post-<?php the_ID(); ?> --><?php endwhile; ?>

		</ul><?php endif; ?>
		<div class="cleaner">&nbsp;</div>
		</div><!-- end .container -->
	</div><!-- end #postsBig -->

	<div id="postsSmall">
	
		<?php 
		rewind_posts();
		$i = 0;
		if ( $loop->have_posts() ) : ?>
		
		<ul class="posts pagination">
		
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<li id="post-thumb-<?php the_ID(); ?>"><a href="#" rel="nofollow">
			<?php
			get_the_image( array( 'size' => 'homepage-slider-thumb', 'width' => 60, 'height' => 60, 'before' => '<div class="cover">', 'after' => '</div>', 'link_to_post' => false ) );
			?>
			<h2><?php the_title(); ?></h2>
			<p><?php the_content_limit(200, ''); ?></p>
			<div class="cleaner">&nbsp;</div>
			</a></li><!-- end #post-thumb-<?php the_ID(); ?> --><?php endwhile; ?>
			
		</ul><!-- end .posts .pagination --><?php endif; ?>
		
		<div class="cleaner">&nbsp;</div>
		
	</div><!-- end #postsSmall -->
	
	<div class="cleaner">&nbsp;</div>

</div><!-- end #featPosts -->
<?php wp_reset_query(); ?>

<script type="text/javascript">
	jQuery(document).ready(
	function($)
	{
		$('#featPosts').slides({
			preload: true,
			<?php if (option::get('featured_posts_autoplay') > 0) { ?>play: <?php echo option::get('featured_posts_autoplay') . ','; } ?>
			hoverPause: true,
			autoHeight: true,
			generatePagination: false,
			generateNextPrev: false
		});
	});
</script>