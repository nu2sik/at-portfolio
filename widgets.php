<?php 

	class AT_Portfolio_Widget extends WP_Widget {
		public function __construct() {
	        $args = array(
	            'classname' => 'at_portfolio_widget',
	            'description' => __('Display lates portfolio items', 'at_portfolio'),
	        );

	        parent::__construct( 'at_portfolio_Widget', __('Portfolio Items', 'at_portfolio'), $args );
	    }

	    public function form($instance) {  //создает форму в админке
	    	 $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Latest Portfolios', 'at_portfolio' ); //если title не задан явно, то отображаться будет Latest Portfolios
	    	 $num_items = ! empty( $instance['num_items'] ) ? $instance['num_items'] : 3;
	    	 $sort_items = ! empty( $instance['sort_items'] ) ? $instance['sort_items'] : '';

	    	 ?>

		    <p>
		        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'at_portfolio' ); ?></label>
		        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		    </p>

		    <p>
		        <label for="<?php echo esc_attr( $this->get_field_id( 'num_items' ) ); ?>"><?php esc_attr_e( 'Number of items:', 'at-portfolio' ); ?></label>

		       <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'num_items' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'num_items' ) ); ?>" >
		          <?php for ($i = 1; $i <= 10; $i++): ?>
		            <option <?php if ($num_items == $i) echo 'selected="selected"'?> ><?=$i?></option>
		          <?php endfor; ?>
		        </select>
		    </p>

		    <p>
		    	<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'sort_items' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'sort_items' ) ); ?>">
			      <option value="sort_title" <?php if ($sort_items == 'sort_title') echo 'selected="selected"';?> >Sort by name</option>
			      <option value="sort_date" <?php if ($sort_items == 'sort_date') echo 'selected="selected"';?> >Sort by date</option>
			    </select>
		    </p>

	   		<?php
	    }

	    public function update( $new_instance, $old_instance ) {
		    $instance = array();
		    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		    $instance['num_items'] = ( ! empty( $new_instance['num_items'] ) ) ? strip_tags( $new_instance['num_items'] ) : '';
		    $instance['sort_items'] = ( ! empty( $new_instance['sort_items'] ) ) ? strip_tags( $new_instance['sort_items'] ) : '';

		    return $instance;
		}

		public function widget($args, $instance) {
		    echo $args['before_widget'];

		   $title = ! empty( $instance['title'] ) ? $instance['title'] : __('Latest portfolio', 'at-portfolio');
		    $num_items = ! empty( $instance['num_items'] ) ? $instance['num_items'] : 3;
		    $sort_items = ! empty( $instance['sort_items'] ) ? $instance['sort_items'] : '';

		   if ( ! empty( $title ) ) {
		      echo $args['before_title'] . apply_filters( 'widget_title', $title ) . $args['after_title'];
		    }

		    
	       	$params = [
		      'post_type'   => 'at_portfolio',
		      'post_status' => 'publish',
		      'orderby'     => $sort_items,
		      'order'       => 'ASC',
		      'posts_per_page' => $num_items,
		    ];

		   

		   $query = new WP_Query($params);

		   foreach ($query->posts as $portfolio) {
		      ?>
		      <p>
		        <a href="<?=get_the_permalink($portfolio->ID);?>"><?=get_the_title($portfolio->ID);?></a>
		      </p>
		      <?php
		    }

		   echo $args['after_widget'];
		  }
	}

	add_action( 'widgets_init', 'at_register_widgets');

	function at_register_widgets() {
	    register_widget( 'AT_Portfolio_Widget' );
	}

?>