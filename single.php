<?php get_header(); 

wp_reset_query();

if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="single">
	
	<div <?php post_class(); ?>>
	

		<?php if (option::get('banner_post_top_enable') == 'on') { ?>
		<div class="sep">&nbsp;</div>
		<div class="banner">
				
			<?php if ( option::get('banner_post_top_html') <> "") { 
				echo stripslashes(option::get('banner_post_top_html'));             
			} else { ?>
				<a href="<?php echo option::get('banner_post_top_url'); ?>" rel="nofollow" title="<?php echo option::get('banner_post_top_alt'); ?>"><img src="<?php echo option::get('banner_post_top'); ?>" alt="<?php echo option::get('banner_post_top_alt'); ?>" /></a>
			<?php } ?>		   	
						
		</div><!-- end .banner -->

		<div class="cleaner">&nbsp;</div>
		<?php } ?>

		<h1><?php the_title(); ?></h1>
	
		<p class="tabs postmetadata"><?php if (option::get('post_category') == 'on') { ?><?php _e('in', 'wpzoom');?> <span class="category"><?php the_category(' '); ?></span> <?php } 
		if (option::get('post_author') == 'on') { _e('by', 'wpzoom');?> <?php the_author_posts_link(); ?> <?php } 
		if (option::get('post_date') == 'on') { ?><span class="datetime"> &mdash; <time datetime="<?php the_time("Y-m-d"); ?>" pubdate><?php printf( __('%s at %s', 'wpzoom'),  get_the_date(), get_the_time()); ?></time></span> | <?php } 
		if (option::get('post_comments') == 'on') { ?><a href="<?php the_permalink() ?>#commentspost" title="Jump to the comments"><?php comments_number(__('no comments', 'wpzoom'),__('1 comment', 'wpzoom'),__('% comments', 'wpzoom')); ?></a><?php } edit_post_link( __('Edit', 'wpzoom'), ' | ', ''); ?></p>
	
		<div class="sep">&nbsp;</div>

		<?php
		$videoEmbedCode = get_post_meta($post->ID, 'wpzoom_post_embed_code', true); // get video embed code
		if ($videoEmbedCode)
		{

			$videowidth = 630;
			$videoheight = 360;
			          
			if (strlen($videoEmbedCode) > 10){
				$videoEmbedCode = preg_replace("/(width\s*=\s*[\"\'])[0-9]+([\"\'])/i", "$1 $videowidth $2", $videoEmbedCode);
				$videoEmbedCode = preg_replace("/(height\s*=\s*[\"\'])[0-9]+([\"\'])/i", "$1 $videoheight $2", $videoEmbedCode);
				$videoEmbedCode = str_replace("<embed","<param name='wmode' value='transparent'></param><embed",$videoEmbedCode);
				$videoEmbedCode = str_replace("<embed","<embed wmode='transparent' ",$videoEmbedCode);
								
				echo "<div class=\"video\">$videoEmbedCode</div>"; ?>
			
			<?php 
			} // if strlen of video > 10
		          
		} // if video ?>

		<?php the_content(''); ?>
		<div class="cleaner">&nbsp;</div>
		<?php wp_link_pages(array('before' => '<p class="pages tabs">'.__('Pages', 'wpzoom').': ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		<?php if (option::get('post_tags') == 'on') { the_tags( '<p class="tags tabs">'.__('Tags', 'wpzoom').': ', ' ', '</p>'); } ?>

		<?php if (option::get('post_author') == 'on') { ?>
		<div class="postauthor">
			<div class="avatar"><?php echo get_avatar( get_the_author_id() , 60 ); ?></div>
			<p class="more"><?php _e('More posts by', 'wpzoom');?> <?php the_author_posts_link(); ?> &raquo;</p>
			<h6><?php _e('Author', 'wpzoom');?>: <a href="<?php the_author_url(); ?>"><?php the_author_firstname(); the_author_lastname(); ?></a></h6>
			<p><?php the_author_description(); ?></p>
			<div class="cleaner">&nbsp;</div>
		</div>
		<?php } ?>

		<div class="sep">&nbsp;</div>
		<div class="share">
			<ul>
				<li><a href="http://twitter.com/share?url=<?php echo urlencode(the_permalink()); ?>&amp;text=<?php echo urlencode(the_title()); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/ic_twitter.png" alt="Tweet This!" /></a></li>
				<li><a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink();?>&amp;title=<?php the_title_attribute();?>" rel="external,nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/ic_digg.png" alt="Digg it!" /></a></li>
				<li><a href="http://del.icio.us/post?v=4&amp;noui&amp;jump=close&amp;url=<?php the_permalink();?>&amp;title=<?php the_title_attribute();?>" rel="external,nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/ic_delicious.png" alt="Add to Delicious!" /></a></li>
				<li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/ic_facebook.png" alt="Share on Facebook!" /></a></li>
				<li><a href="http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title_attribute();?>" rel="external,nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/ic_reddit.png" alt="Share on Reddit!" /></a></li>
				<li><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/ic_stumbleupon.png" alt="Stumble it" /></a></li>
				<li><a href="http://www.technorati.com/faves?add=<?php the_permalink(); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/ic_technorati.png" alt="Add to Technorati Favorites" /></a></li>
				<li class="last"><a href="<?php ui::rss(); ?>" rel="external,nofollow"><img src="<?php bloginfo('template_directory'); ?>/images/ic_rss.png" alt="Subscribe by RSS" /></a></li>
			</ul>
			<div class="cleaner">&nbsp;</div>
		</div>
		<div class="cleaner">&nbsp;</div>

		<?php if (option::get('banner_post_bottom_enable') == 'on') { ?>
		<div class="sep">&nbsp;</div>
		<div class="banner">
				
			<?php if ( option::get('banner_post_bottom_html') <> "") { 
				echo stripslashes(option::get('banner_post_bottom_html'));             
			} else { ?>
				<a href="<?php echo option::get('banner_post_bottom_url'); ?>" rel="nofollow" title="<?php echo option::get('banner_post_bottom_alt'); ?>"><img src="<?php echo option::get('banner_post_bottom'); ?>" alt="<?php echo option::get('banner_post_bottom_alt'); ?>" /></a>
			<?php } ?>		   	
						
		</div><!-- end .banner -->
		
		<?php } ?>

		<div class="sep">&nbsp;</div>

	</div>
	
	<div class="post-comments">
		<?php comments_template(); ?>
	</div> <!-- end .post-comments -->

</div><!-- end of #single -->
<?php get_sidebar(); ?>
<?php endwhile; else: ?>

<p><?php _e('Sorry, no posts matched your criteria', 'wpzoom');?>.</p>
<?php endif; ?>
<div class="sep">&nbsp;</div>
</div><!-- end main wrapper -->
</div><!-- end #main -->
<?php get_footer(); ?>