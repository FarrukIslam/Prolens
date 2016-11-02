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
			
			wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), false, 'all');
			
	
			wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), false, 'all');

			wp_enqueue_style('ie10-viewport-bug-workaround', get_template_directory_uri() . '/css/ie10-viewport-bug-workaround.css', array(), false, 'all');
			
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
			wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), true);
			

			/* ie-emulation-modes-warning min  js */
			wp_enqueue_script('ie-emulation-modes-warning', get_template_directory_uri() . '/js/ie-emulation-modes-warning.js', array(), true);

			/* ie10-viewport-bug-workaround  js */
			wp_enqueue_script('ie10-viewport-bug-workaround', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array(), true);
			
			/* scripts  js */
			wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), true);
			
			
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

//require_once get_template_directory() .'/inc/widgets.php';
require_once get_template_directory() .'/inc/prolens-shortcodes.php';
require_once get_template_directory() .'/inc/woocommerce-support.php';
require_once get_template_directory() .'/inc/required_plugins.php';



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
        	background-image:url("'. get_stylesheet_directory_uri().'/img/logo.png") !important;
		    background-size: 55% !important;
		    height: 90px !important;
		    margin: 0 !important;
		    width: 100% !important;
		}
		.login h1 {
		    background-color: #FFF !important;
		}

        body.login { background-image:url("'. get_stylesheet_directory_uri().'/img/Prolens-BGround.jpg") !important; background-attachment: fixed !important; background-position: center !important; position: relative; z-index: 999;}
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



//Product Cat creation page
function product_category_taxonomy_custom_url_meta() {
    ?>
    <div class="form-field">
        <label for="term_meta[pr_cat_url]"><?php _e('Product categories URL', 'prolens'); ?></label>
        <input type="url" name="term_meta[pr_cat_url]" id="term_meta[pr_cat_url]">
        <p class="description"><?php _e('Enter your custom URL here', 'prolens'); ?></p>
    </div>
    <?php
}

add_action('product_cat_add_form_fields', 'product_category_taxonomy_custom_url_meta', 10, 2);

//Product Cat Edit page
function product_category_taxonomy_custom_url_meta_edit($term) {

    //getting term ID
    $term_id = $term->term_id;

    // retrieve the existing value(s) for this meta field. This returns an array
    $term_meta = get_option("product_cat" . $term_id);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="term_meta[pr_cat_url]"><?php _e('Product categories URL', 'prolens'); ?></label></th>
        <td>
            <input type="text" name="term_meta[pr_cat_url]" id="term_meta[pr_cat_url]" value="<?php echo esc_attr($term_meta['pr_cat_url']) ? esc_attr($term_meta['pr_cat_url']) : ''; ?>">
            <p class="description"><?php _e('Enter your custom URL here', 'prolens'); ?></p>
        </td>
    </tr>
    <?php
}

add_action('product_cat_edit_form_fields', 'product_category_taxonomy_custom_url_meta_edit', 10, 2);

// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta($term_id) {
    if (isset($_POST['term_meta'])) {
        $term_meta = get_option("product_cat" . $term_id);
        $cat_keys = array_keys($_POST['term_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['term_meta'][$key])) {
                $term_meta[$key] = $_POST['term_meta'][$key];
            }
        }
        // Save the option array.
        update_option("product_cat" . $term_id, $term_meta);
    }
}

add_action('edited_product_cat', 'save_taxonomy_custom_meta', 10, 2);
add_action('create_product_cat', 'save_taxonomy_custom_meta', 10, 2);

