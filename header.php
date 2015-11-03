<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php ui::title(); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Maven+Pro:900" />

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
    
	<?php 
	if ($paged < 2 && option::get('featured_enable') == 'on' && is_home()) {
    	ui::js("slides.min.jquery"); 
	}
	?>

</head>

<body <?php body_class(); ?>>
<div id="container">

<div id="header">
	<div class="wrapper">
		<div id="logo">
			<?php if (!option::get('misc_logo_path')) { echo "<h1>"; } ?>

			<a href="<?php echo home_url(); ?>" title="<?php bloginfo('description'); ?>">
				<?php if (!option::get('misc_logo_path')) { bloginfo('name'); } else { ?>
					<img src="<?php echo ui::logo(); ?>" alt="<?php bloginfo('name'); ?>" />
				<?php } ?>
			</a>

			<?php if (!option::get('misc_logo_path')) { echo "</h1>"; } ?>

			<?php if (option::get('logo_desc') == 'on') {  ?><p id="tagline"><?php bloginfo('description'); ?></p><?php } ?>
			
		</div><!-- end #logo -->

		<?php if (option::get('banner_header_enable') == 'on') { ?>
		<div class="banner banner-header">
				
			<?php if ( option::get('banner_header_html') <> "") { 
				echo stripslashes(option::get('banner_header_html'));             
			} else { ?>
				<a href="<?php echo option::get('banner_header_url'); ?>" rel="nofollow" title="<?php echo option::get('banner_header_alt'); ?>"><img src="<?php echo option::get('banner_header'); ?>" alt="<?php echo option::get('banner_header_alt'); ?>" /></a>
			<?php } ?>		   	
						
		</div><!-- end .header-banner -->

		<div class="cleaner">&nbsp;</div>
		<?php } ?>
		
		<div id="headRSS">
			<p><a href="<?php ui::rss(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/icon_rss.png" alt="<?php _e('Subscribe to RSS', 'wpzoom');?>" width="16" height="16" /><?php _e('Subscribe to RSS', 'wpzoom');?></a></p>
		</div><!-- end #headRSS -->
		<div id="search">
			<form method="get" id="searchformtop" action="<?php echo get_option('home'); ?>">
				<input type="text" name="s" id="setop" onblur="if (this.value == '') {this.value = '<?php _e('search', 'wpzoom');?>';}" onfocus="if (this.value == '<?php _e('search', 'wpzoom');?>') {this.value = '';}" value="<?php _e('search', 'wpzoom');?>" class="text" />
				<input type="submit" id="searchsubmittop" class="submit" value="<?php _e('search','wpzoom');?>" />
			</form>
		</div><!-- end #search -->
		<div class="cleaner">&nbsp;</div>

	</div><!-- end .wrapper -->
</div><!-- end #header -->

<?php if (option::get('menu_top_show') == 'on') { ?>
<div id="headCats">
	<div class="wrapper">
		<nav id="main-menu">

		<?php if (has_nav_menu( 'primary' )) { 
			wp_nav_menu( array('container' => '', 'container_class' => '', 'menu_class' => 'dropdown', 'menu_id' => '', 'sort_column' => 'menu_order', 'theme_location' => 'primary' ) );
		}
		else
		{
			echo '<p style="line-height: 30px; color: #fff; font-size: 11px;">Please set your <strong>Main Menu</strong> on the <a href="'.get_admin_url().'nav-menus.php" style="color: #fff; text-decoration: underline;">Appearance > Menus</a> page. For more information please <a href="http://www.wpzoom.com/documentation/monograph/" style="color: #fff; text-decoration: underline;">read the documentation</a>.</p>';
		}
		?>

		</nav>
		<div class="cleaner">&nbsp;</div>
	</div><!-- end of .wrapper -->
</div><!-- end #headCats -->
<?php } ?>

<?php if (option::get('menu_top_secondary_show') == 'on') { ?>
<div id="headPages">
	<div class="wrapper">
		<?php
		echo"<div id=\"breadcrumb\">";
		wpzoom_breadcrumbs();
		echo"</div>";
		?>

		<?php if (has_nav_menu( 'secondary' )) { 
			wp_nav_menu( array( 'sort_column' => 'menu_order', 'container_class' => '', 'depth' => '1', 'theme_location' => 'secondary' ) );
		}
		else
		{
			echo '<p style="font-size: 11px; text-align: right; line-height: 30px;">Please set your <strong>Main Menu</strong> on the <a href="'.get_admin_url().'nav-menus.php" style="text-decoration: underline;">Appearance > Menus</a> page. For more information please <a href="http://www.wpzoom.com/documentation/monograph/" style="text-decoration: underline;">read the documentation</a>.</p>';
		}
		?>

	</div><!-- end of .wrapper -->
</div><!-- end #headPages -->
<?php } ?>

<div id="main">
<div class="wrapper">