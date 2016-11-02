<?php 

//woocommerce support

function eshopper_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action('after_setup_theme','eshopper_woocommerce_support');			

//remove breadcrumb 
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);

//remove result count
remove_action('woocommerce_before_shop_loop','woocommerce_result_count', 20);

//remove catalog ordering
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering', 30);


//remove add to cart button
//remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart', 10);



//remove product archive sidebar 
remove_action('woocommerce_sidebar','woocommerce_get_sidebar', 10);

//remove single product images
//remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );

//add to curosel slider single product page

