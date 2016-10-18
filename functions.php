<?php

if (!defined('prolens')) define('prolens', '1.0');

if (!class_exists('prolens_scripts_load'))
	{
	class prolens_scripts_load {
		
		public function __construct() {
			add_action('wp_enqueue_scripts', array( $this, 'prolens_scripts' ));
			add_action('after_setup_theme', array($this, 'prolens_after_theme_setup'));
			}

		public function prolens_scripts() {
				
			/** 
			---------------------------------------------------------------
			 CSS Files 
			---------------------------------------------------------------	
			**/
			
	
			wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array() , prolens);
			
	
			wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array() , prolens);

			wp_enqueue_style('e10-viewport-bug-workaround', get_template_directory_uri() . '/css/e10-viewport-bug-workaround.css', array() , prolens);
			
			/* theme stylesheet */
		    wp_enqueue_style( 'stylesheet', get_stylesheet_uri() ); 
			
			
			/** 
			---------------------------------------------------------------
			 jQuery Files
			---------------------------------------------------------------	
			**/
			
			/* jQuery librery */
			wp_enqueue_script('jQuery');
			
				

			/* bootstrap min  js */
			wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(
				'jquery') , prolens, true);	
			

			/* ie-emulation-modes-warning min  js */
			wp_enqueue_script('ie-emulation-modes-warning', get_template_directory_uri() . '/js/ie-emulation-modes-warning.js', array(
				'jquery') , prolens, true);	

			/* ie10-viewport-bug-workaround  js */
			wp_enqueue_script('ie10-viewport-bug-workaround', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array(
				'jquery') , prolens, true);	
			
			/* scripts  js */
			wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(
				'jquery') , prolens, true);	

			/* ie10-viewport-bug-workaround  js */
			wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom-js.js', array(
				'jquery') , prolens, true);	
			
			



			
			/* wordpress comments */
			if (is_singular() && comments_open() && get_option('thread_comments'))
				{
				wp_enqueue_script('comment-reply');
				}
			}

		function prolens_after_theme_setup() {

			add_theme_support( 'html5', array(
				'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
			) );

			 add_theme_support( 'woocommerce' );
			
			/* load text domain */
			load_theme_textdomain('prolens', get_template_directory() . '/languages');
			
			/* widget shortcode support*/
			add_filter('widget_text', 'do_shortcode');
			
			/* theme supports */
			add_theme_support('post-thumbnails', array('post'));
			add_theme_support('automatic-feed-links');
			
			add_image_size('categories200x200', 200, 200);
			
			
			
			/* register nav */
			register_nav_menus(array(
				'primarymenu' => __('Primary Menu', 'prolens')
			));
			
			/* register sidebar */
			function prolens_widgets_register_func()
				{
					
				register_sidebar( array(
				        'name' => __( 'Fontpage Left Sidebar', 'prolens' ),
				        'id' => 'fontpage-left-sidebar',
				        'description' => __( 'Widgets in this area will be shown Leftside.', 'prolens' ),
				        'before_widget' => '<div class="widget">',
					'after_widget'  => '</div>',
					'before_title'  => '<h6 class="widget-title">',
					'after_title'   => '</h6>',
				    ) );
				
				}

			add_action('widgets_init', 'prolens_widgets_register_func');
			
			
			
			}
		}
	}

if (class_exists('prolens_scripts_load'))
	{
	global $prolens_scripts_load;
	$prolens_scripts_load = new prolens_scripts_load();
	}

require_once get_template_directory() .'/cs-framework/cs-framework.php';
//require_once get_template_directory() .'/inc/widgets.php';
require_once get_template_directory() .'/inc/prolens-shortcodes.php';
require_once get_template_directory() .'/inc/woocommerce-support.php';



require_once get_template_directory() .'/inc/widgets/categories-widgets.php';
require_once get_template_directory() .'/inc/widgets/quick-links.php';



function hide_frontpage_editor() {
 $post_id = isset($_GET['post']) ? $_GET['post'] : isset($_GET['post_ID']);
 if(!isset($post_id)) return;
 $template_file = get_post_meta( $post_id, '_wp_page_template', true);
 if($template_file == 'fontpage.php') {
  remove_post_type_support('page', 'editor');
 }
}
add_action('admin_init', 'hide_frontpage_editor');

 // Custom css
function prolens_custom_css() {
    echo '<style type="text/css">
	 .cs-framework .cs-header img {
	    height: 60px;
	}

  </style>';
}
add_action('admin_head', 'prolens_custom_css');


/* customize login screen */
function prolens_custom_login_page() {
    echo '<style type="text/css">
        h1 a { 
        	background-image: url(http://localhost/walltechdrywall/wp-content/themes/Prolens/img/logo.png) !important;
		    background-size: 100% 100% !important;
		    height: 90px !important;
		    margin: 0 !important;
		    width: 100% !important;
		}

        body.login { background-image:url("'. get_stylesheet_directory_uri().'/img/viz360-login-screen.jpg") !important; background-repeat: no-repeat !important; background-attachment: fixed !important; background-position: center !important; position: relative; z-index: 999;}
  		body.login:before { background-color: rgba(0,0,0,0.7); position: absolute; width: 100%; height: 100%; left: 0; top: 0; content: ""; z-index: -1; }

    </style>';
}
add_action('login_head', 'prolens_custom_login_page');

function prolens_login_logo_url() {
 return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'prolens_login_logo_url' );

function prolens_login_logo_url_title() {
 return 'Prolens-Replacement Lenses for Goggles and Sunglasses';
}
add_filter( 'login_headertitle', 'prolens_login_logo_url_title' );


