<?php 
/* product category list widget */

class prolens_product_category_list extends WP_Widget{
	public function __construct(){
		parent::__construct('prolens_product_category_list','Prolens Product category list Widgets', array(
			'description' => 'Add category Product list box on prolens Widgets'
		));
		
	}
	public function widget($args,$instance){
		
		$title = $instance['title'];
		$show_category_list = $instance['show_category_list'];

		echo $args['before_widget'].''.
				$args['before_title'].''.$title.''.
				$args['after_title'];	

		 if($show_category_list){
			
		
			
		echo '<ul class="sidebar-link">';
		
		$cat_value = array(
			'type'                     => 'product',
			'child_of'                 => 0,
			'parent'                   => '',
			'orderby'                  => 'name',
			'order'                    => 'ASC',
			'hide_empty'               => 1,
			'hierarchical'             => 1,
			'exclude'                  => '',
			'include'                  => '',
			'number'                   => '',
			'taxonomy'                 => 'product_cat',
			'pad_counts'               => false 

		); 
		
		$categories = get_categories( $cat_value );
		if($categories){
			foreach($categories as $cat) {
				echo '
				<li><a href="'. get_category_link( $cat->term_id ) .'">' . $cat->name . '</a></li>
				
				';
			}
		} else {
			echo '<p>'.__( 'No Product Category found!', 'prolens' ).'</p>';
		}
	
			} 

		
		
		echo '</ul>'.$args['after_widget'];
		
	}
	
	public function form($instance){
	
	


	$title = $instance['title'];
	$show_category_list = $instance['show_category_list'][0];



	
	?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'prolens'); ?></label></p>
		<p><input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>"/></p>
		
		<p><input type="checkbox" id="<?php echo $this->get_field_id('show_category_list'); ?>" <?php checked($show_category_list,1); ?> value="1" name="<?php echo $this->get_field_name('show_category_list'); ?>" class="" /><label for="<?php echo $this->get_field_id('show_category_list'); ?>"><?php _e('Show category List', 'prolens'); ?></label></p>

	<?php
	
}
	
	
	public function update($new_instence,$old_instence){
		$instance = $old_instence;
		
		$instance['title'] = $new_instence['title'];
		$instance['show_category_list'] = $new_instence['show_category_list'];
		return $instance;
		
	}
}
function product_category_prolens(){
	register_widget('prolens_product_category_list');
}
add_action('widgets_init','product_category_prolens');

