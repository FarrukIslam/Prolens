<?php 
function product_category_items_fun($atts) {
	 
	 ob_start();
?>
				 <div class="content-item">

                  <ul class="items">
<?php 

                  $wcatTerms = get_terms('product_cat', array(
                    'hide_empty' => 0, 
                    'orderby'    => 'id',
                    'order'      => 'ASC',
                    'parent'     => 0
                ));

                   if($wcatTerms){

                     foreach($wcatTerms as $wcatTerm) : 

                        $category_id = $wcatTerm->term_id;

                        $metaArray = get_option('product_cat' . $category_id);
                        $productCaturl = $metaArray['pr_cat_url'];

                        $wthumbnail_id = get_woocommerce_term_meta( $wcatTerm->term_id, 'thumbnail_id', true );
                        $cat_thumb_url = wp_get_attachment_image_src( $wthumbnail_id, 'categories200x200' );

                        //$term_link = get_term_link( $wcatTerm, 'product_cat' );

                        if($cat_thumb_url[0]) :

                            echo '<li><a href="'. $productCaturl .'"><img src="'.$cat_thumb_url[0].'" class="img-responsive"></a></li>';
                          else :

                            echo ' <li class="default-img"><h4><a href="'.$productCaturl.'>">'.$prod_cat->name.' </a></h4></li>';

                            
                          endif;

                     endforeach;
                      } 

                    else {
                      echo '<p>'.__( 'No Product Category found!', 'prolens' ).'</p>';
                    }
                ?>


         
                  </ul>
                 
                   
                </div>

	<?php 

	

  $html = ob_get_contents();
   ob_end_clean();
   return $html;


}

add_shortcode('product_category_items', 'product_category_items_fun');



