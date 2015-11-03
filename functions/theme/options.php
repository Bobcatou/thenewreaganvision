<?php return array(


/* Theme Admin Menu */
"menu" => array(
    array("id"    => "1",
          "name"  => "General"),
    
    array("id"    => "2",
          "name"  => "Homepage"),

	array("id"   => "5",
				"name" => "Styling"),
          
	array("id"    => "7",
          "name"  => "Banners"),
),

/* Theme Admin Options */
"id1" => array(
    array("type"  => "preheader",
          "name"  => "Theme Settings"),

    array("name"  => "Color Style",
          "desc"  => "Choose the style that you would like to use.<br />",
          "id"    => "theme_style",
          "options" => array('Blue','Green','Pink','Red'),
          "std"   => "Blue",
          "type"  => "select"),

	 array("name"  => "Logo Image",
          "desc"  => "Upload a custom logo image for your site, or you can specify an image URL directly.",
          "id"    => "misc_logo_path",
          "std"   => "",
          "type"  => "upload"),

    array("name"  => "Display Site Tagline under Logo?",
          "desc"  => "Tagline can be changed in <a href='options-general.php' target='_blank'>General Settings</a>",
          "id"    => "logo_desc",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Favicon URL",
          "desc"  => "Upload a favicon image (16&times;16px).",
          "id"    => "misc_favicon",
          "std"   => "",
          "type"  => "upload"),
          
    array("name"  => "Custom Feed URL",
          "desc"  => "Example: <strong>http://feeds.feedburner.com/wpzoom</strong>",
          "id"    => "misc_feedburner",
          "std"   => "",
          "type"  => "text"),

 	array("type"  => "preheader",
          "name"  => "Global Menu Options"),

    array("name"  => "Show top menu",
          "id"    => "menu_top_show",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Show top secondary menu",
          "id"    => "menu_top_secondary_show",
          "std"   => "on",
          "type"  => "checkbox"),

 	array("type"  => "preheader",
          "name"  => "Posts Archives Options"),
          
    array("name"  => "Excerpt length",
          "desc"  => "Default: <strong>25</strong> (words)",
          "id"    => "excerpt_length",
          "std"   => "25",
          "type"  => "text"),

    array("name"  => "Show Date/time",
          "desc"  => "<strong>Date/Time format</strong> can be changed <a href='options-general.php' target='_blank'>here</a>.",
          "id"    => "display_date",
          "std"   => "on",
          "type"  => "checkbox"),  

	array("type"  => "preheader",
          "name"  => "Single Post Options"),
          
	array("name"  => "Show Date/time",
          "desc"  => "<strong>Date/Time format</strong> can be changed <a href='options-general.php' target='_blank'>here</a>.",
          "id"    => "post_date",
          "std"   => "on",
          "type"  => "checkbox"),  
          
    array("name"  => "Show Category",
          "id"    => "post_category",
          "std"   => "off",
          "type"  => "checkbox"), 
          
    array("name"  => "Show Author Profile",
          "desc"  => "You can edit your profile on this <a href='profile.php' target='_blank'>page</a>.",
          "id"    => "post_author",
          "std"   => "on",
          "type"  => "checkbox"),
          
    array("name"  => "Show Tags",
          "id"    => "post_tags",
          "std"   => "on",
          "type"  => "checkbox"),
          
	array("name"  => "Show Social Buttons",
          "id"    => "post_share",
          "std"   => "on",
          "type"  => "checkbox"),
          
    array("name"  => "Show Related Posts",
          "desc"  => "Display 5 most recent posts in the same category as the active post.",
		  "id"    => "post_related",
          "std"   => "on",
          "type"  => "checkbox"),

    array("name"  => "Show Comments",
          "id"    => "post_comments",
          "std"   => "on",
          "type"  => "checkbox"),

	array("type"  => "preheader",
          "name"  => "Single Page Options"),
          
	array("name"  => "Show Social Buttons",
          "id"    => "page_share",
          "std"   => "on",
          "type"  => "checkbox"),
          
    array("name"  => "Show Comments",
          "id"    => "page_comments",
          "std"   => "on",
          "type"  => "checkbox"),

),

"id2" => array(          

	array("type"  => "preheader",
          "name"  => "Homepage Settings"),

	array("name"  => "Display Recent Posts",
          "id"    => "recent_part_enable",
          "std"   => "on",
          "type"  => "checkbox"),
 
	array("name"  => "Exclude categories",
          "desc"  => "Exclude categories from appearing in the Recent Posts block.",
          "id"    => "recent_part_exclude",
          "std"   => "",
          "type"  => "select-category-multi"),

	array("name"  => "Exclude Featured Posts from Recent Posts?",
          "desc"  => "You can use this option if you want to hide posts which are featured on front page from the Recent Posts block, to avoid duplication.",
          "id"    => "hide_featured",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Display Featured Posts",
          "desc"  => "Display featured posts at the top of the Homepage.<br />If you have troubles displaying posts in this section, please <a href='http://www.wpzoom.com/documentation/splendid/#featured' target='_blank'>read the documentation</a>.",
          "id"    => "featured_enable",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Number of posts to display",
          "desc"  => "Choose how many featured posts should be displayed.",
          "id"    => "featured_number",
          "std"   => "4",
          "type"  => "text"),

	array("name"  => "Autoplay (auto-scroll)",
          "desc"  => "Do you want to auto-scroll the slides? If yes, set the time in miliseconds. Ex: 5000 (5 seconds). Leave 0 to disable autoplay.",
          "id"    => "featured_posts_autoplay",
          "std"   => "5",
          "type"  => "text"),

	array("type"  => "preheader",
          "name"  => "Featured Categories"),

	array("name"  => "Display Featured Categories",
          "desc"  => "Do you want to display the 3 promoted categories on the homepage?",
          "id"    => "promoted_categories_display",
          "std"   => "on",
          "type"  => "checkbox"),

	array("name"  => "Promoted Category #1",
          "desc"  => "Select the first featured category.",
          "id"    => "promoted_category_1",
          "std"   => "",
          "type"  => "select-category"),

	array("name"  => "Promoted Category #2",
          "desc"  => "Select the second featured category.",
          "id"    => "promoted_category_2",
          "std"   => "",
          "type"  => "select-category"),

	array("name"  => "Promoted Category #3",
          "desc"  => "Select the third featured category.",
          "id"    => "promoted_category_3",
          "std"   => "",
          "type"  => "select-category"),

	array("name"  => "Number of posts to display",
          "desc"  => "Choose how many posts should be displayed.",
          "id"    => "promoted_number",
          "std"   => "3",
          "type"  => "text"),
    ),

"id5" => array(
    array("type"  => "preheader",
          "name"  => "Colors"),

    array("name"  => "Logo Color",
           "id"   => "logo_color",
           "type" => "color",
           "selector" => "#logo h1 a",
           "attr" => "color"),
   
    array("name"  => "Link Color",
           "id"   => "a_css_color",
           "type" => "color",
           "selector" => "a",
           "attr" => "color"),
           
    array("name"  => "Link Hover Color",
           "id"   => "ahover_css_color",
           "type" => "color",
           "selector" => "a:hover",
           "attr" => "color"),

		array("name"  => "Header Background Color",
           "id"   => "header_bgcolor",
           "type" => "color",
           "selector" => "#header",
           "attr" => "background-color"),

		array("name"  => "Header Categories Background Color",
           "id"   => "headcats_bgcolor",
           "type" => "color",
           "selector" => "#headCats",
           "attr" => "background-color"),

		array("name"  => "Header Pages Background Color",
           "id"   => "headpages_bgcolor",
           "type" => "color",
           "selector" => "#headPages",
           "attr" => "background-color"),

		array("name"  => "Featured Posts Background Color",
           "id"   => "feats_bgcolor",
           "type" => "color",
           "selector" => "#featPosts",
           "attr" => "background"),

    array("name"  => "Widget Title Color",
           "id"   => "widget_color",
           "type" => "color",
           "selector" => ".widget .header",
           "attr" => "color"),
 

    array("type"  => "preheader",
          "name"  => "Fonts"),

    array("name" => "General Text Font Style", 
          "id" => "typo_body", 
          "type" => "typography", 
          "selector" => "body" ),

    array("name" => "Logo Text Style", 
          "id" => "typo_logo", 
          "type" => "typography", 
          "selector" => "#logo h1 a" ),

    array("name"  => "Slider Post Title Style",
           "id"   => "typo_slider_title",
           "type" => "typography",
           "selector" => "#featPosts .slides_container li h2 a"),

    array("name"  => "Recent Post Title Style",
           "id"   => "typo_post_title",
           "type" => "typography",
           "selector" => ".posts h2 a"),

    array("name"  => "Individual Post Title Style",
           "id"   => "typo_individual_title",
           "type" => "typography",
           "selector" => ".single .post h1"),
 
     array("name"  => "Widget Title Style",
           "id"   => "typo_widget",
           "type" => "typography",
           "selector" => ".widget .header"),

),

"id7" => array(

	array("type"  => "preheader",
          "name"  => "Header Ad"),
          
	array("name"  => "Enable ad in header, to the right of the site logo.",
          "id"    => "banner_header_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_header_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_header",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_header_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_header_alt",
          "type"  => "text"),

	array("type"  => "preheader",
          "name"  => "Sidebar Top Ad"),
          
	array("name"  => "Enable ad in sidebar, before menu and widgets",
          "id"    => "banner_sidebar_top_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_sidebar_top_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_sidebar_top",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_sidebar_top_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_sidebar_top_alt",
          "type"  => "text"),
          
          
	array("type"  => "preheader",
          "name"  => "Sidebar Bottom Ad"),
          
	array("name"  => "Enable ad in sidebar, after menu and widgets",
          "id"    => "banner_sidebar_bottom_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_sidebar_bottom_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_sidebar_bottom",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_sidebar_bottom_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_sidebar_bottom_alt",
          "type"  => "text"),

	array("type"  => "preheader",
          "name"  => "Posts Top Ad"),
          
	array("name"  => "Enable ad in single posts, before title and content",
          "id"    => "banner_post_top_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_post_top_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_post_top",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_post_top_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_post_top_alt",
          "type"  => "text"),

	array("type"  => "preheader",
          "name"  => "Posts Bottom Ad"),
          
	array("name"  => "Enable ad in single posts, after post content",
          "id"    => "banner_post_bottom_enable",
          "std"   => "off",
          "type"  => "checkbox"),
          
    array("name"  => "HTML Code (Adsense)",
          "desc"  => "Enter complete HTML code for your banner (or Adsense code) or upload an image below.",
          "id"    => "banner_post_bottom_html",
          "std"   => "",
          "type"  => "textarea"),
          
	array("name"  => "Upload your image",
          "desc"  => "Upload a banner image or enter the URL of an existing image.",
          "id"    => "banner_post_bottom",
          "std"   => "",
          "type"  => "upload"),
          
	array("name"  => "Destination URL",
          "desc"  => "Enter the URL where this banner ad points to.",
          "id"    => "banner_post_bottom_url",
          "type"  => "text"),
          
	array("name"  => "Banner Title",
          "desc"  => "Enter the title for this banner which will be used for ALT tag.",
          "id"    => "banner_post_bottom_alt",
          "type"  => "text"),

)

/* end return */);