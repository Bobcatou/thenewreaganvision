	<div id="footer">
	
		<div class="wrapper">
			<div id="sidebar-narrow">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Bottom Narrow') ) : ?> <?php endif; ?>
			</div>
			<div class="cleaner">&nbsp;</div>
			<div id="sidebar-wide">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer: Bottom Wide') ) : ?> <?php endif; ?>
			</div><!-- sidebar wide -->
		</div>
		<div class="cleaner">&nbsp;</div>
	</div><!-- end #footer -->
	
	<div id="copyright">
		<div class="wrapper">
			<p class="copy"><a href="http://www.wpzoom.com/themes/monograph/" rel="external">Monograph Theme</a> by <a href="http://www.wpzoom.com" rel="external">WPZOOM</a></p>
			<p>Copyright &copy; <?php echo date("Y",time()); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
		</div>
	</div><!-- end #copyright -->

</div><!-- end #container -->

<?php wp_footer(); ?>

</body>
</html>