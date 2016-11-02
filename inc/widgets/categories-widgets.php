

<?php 


/* ===================================
prolens categories widgets
=====================================*/

class Proelens_category_widgets extends WP_Widget
	{
	/**
	 * quick_links constructor.
	 */
	public function __construct()
	{
		parent::__construct(false, $name = "Prolens Product Categories", array("description" => "Prolens show all Main cagtegoires and sub Categories"));
	}

	/**
	 * @see WP_Widget::widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget($args, $instance)
	{

		// render widget in frontend
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		
		?>


		<ul id="expList" class="sidebar-link">

            <?php
                $taxonomy     = 'product_cat';
                $orderby      = 'id';  
                $show_count   = 0;      // 1 for yes, 0 for no
                $pad_counts   = 0;      // 1 for yes, 0 for no
                $hierarchical = 1;      // 1 for yes, 0 for no  
                $title        = '';  
                $empty        = 0;
                $order         = 'ASC';

                
                $cat_args = array(
                  'taxonomy'     => $taxonomy,
                  'orderby'      => $orderby,
                  'show_count'   => $show_count,
                  'pad_counts'   => $pad_counts,
                  'hierarchical' => $hierarchical,
                  'title_li'     => $title,
                  'hide_empty'   => $empty,
                  'order'        => $order
                );

                $all_categories = get_categories( $cat_args );
                //print_r($all_categories);
                foreach ($all_categories as $cat) {
                    //print_r($cat);
                    if($cat->category_parent == 0) {
                        $category_id = $cat->term_id;

                    $metaArray = get_option('product_cat' . $category_id);
					$productCaturl = $metaArray['pr_cat_url'];

                ?> 

              <li>
                <?php       

                echo '<a href="'. $productCaturl .'">'. $cat->name .'</a>'; 
                
                    $args2 = array(
                      'taxonomy'     => $taxonomy,
                      'child_of'     => 0,
                      'parent'       => $category_id,
                      'orderby'      => $orderby,
                      'show_count'   => $show_count,
                      'pad_counts'   => $pad_counts,
                      'hierarchical' => $hierarchical,
                      'title_li'     => $title,
                      'hide_empty'   => $empty
                    );
                    $sub_cats = get_categories( $args2 );

                    if($sub_cats) 
                    {
                      
                      echo ' <ul>';
                        foreach($sub_cats as $sub_category) {

		                    $submetaArray = get_option('product_cat' . $sub_category->term_id);
							$productsubCaturl = $submetaArray['pr_cat_url'];

                            echo '<li><a href="'. $productsubCaturl .'">'. $sub_category->name .'</a></li>';
                        }
                        echo '</ul>';
                    } 

                    ?>
                </li>

                <?php }  }    ?>
                
            </ul>

		<?php 

		echo $args['after_widget'];
	}


	/**
	 * @see WP_Widget::update
	 *
	 * @param array $newInstance
	 * @param array $oldInstance
	 *
	 * @return array
	 */
	public function update($newInstance, $oldInstance)
	{
		$instance = $oldInstance;
		$instance['title'] = ( ! empty( $newInstance['title'] ) ) ? strip_tags( $newInstance['title'] ) : '';
		return $instance;
	}
	
	/**
	 * @see WP_Widget::form
	 *
	 * @param array $instance
	 */
	public function form($instance)
	{
		if ( isset( $instance[ 'title' ] ) )
		{
			$title = $instance[ 'title' ];
		}
		
		
?>	
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
<?php		

	}
}

add_action('widgets_init', create_function('', 'return register_widget("Proelens_category_widgets");'));
