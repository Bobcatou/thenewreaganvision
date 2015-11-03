<?php 
/*-----------------------------------------------------------------------------------*/
/* Initializing Widgetized Areas (Sidebars)																			 */
/*-----------------------------------------------------------------------------------*/
 
/*----------------------------------*/
/* Sidebar							*/
/*----------------------------------*/
 
register_sidebar(array(
    'name'=>'Sidebar',
	'before_widget' => '<div class="widget %1$s" id="%2$s">',
	'after_widget' => '</div><div class="cleaner">&nbsp;</div><div class="sep">&nbsp;</div>',
	'before_title' => '<p class="header">',
	'after_title' => '</p>',
));

register_sidebar(array('name'=>'Footer: Bottom Narrow',
	'before_widget' => '<div class="widget %1$s" id="%2$s">',
	'after_widget' => '</div>',
	'before_title' => '<p class="header">',
	'after_title' => '</p>',
));

register_sidebar(array('name'=>'Footer: Bottom Wide',
	'before_widget' => '<div class="widget %1$s" id="%2$s">',
	'after_widget' => '</div>',
	'before_title' => '<p class="header">',
	'after_title' => '</p>',
));

?>