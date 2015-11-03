<?php get_header(); ?>

	<?php if ($paged < 2) { 

		if (option::get('featured_enable') == 'on' && is_home()) { get_template_part('featured-posts'); }

		if (option::get('promoted_categories_display') == 'on' && is_home()) { get_template_part('featured-categories'); }

	} // if $paged < 2 ?>


<?php if (option::get('recent_part_enable') == 'on') { ?>

	<div id="content"<?php if ($paged > 1) {echo' class="content-archive"';} ?>">
	
		<?php get_template_part('loop', 'index'); // ?>
		<?php get_sidebar(); ?>
	
	</div><!-- end #content -->

<?php } // if recent posts enabled ?>

</div><!-- end main wrapper -->

</div><!-- end #main -->
<?php get_footer(); ?>