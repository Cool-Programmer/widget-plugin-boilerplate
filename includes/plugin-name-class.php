<?php
class Foo_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
				'widget_id',
				__('My Widget Title', 'my_domain'),
				[
					'description' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit', 'my_domain')
				]
			);
	}


	public function widget($args, $instance) {
		$links = [
			'facebook'  => esc_attr($instance['facebook_link'])
			// Do for all, then pass as vars
		];

		echo $args['before_widget'];
			echo $this->displaySocialWidget($links);
		echo $args['after_widget'];
	}


	private function displaySocialWidget($links){
		?>
		<div class="social-links">
			<a href="<?php echo esc_attr($links['facebook']); ?>">LINK</a>
		</div>
		<?php
	}
	

	public function form($instance) {
		$this->getAdminForm($instance);
	}


	private function getAdminForm($instance){
		/* 
		*  Get facebook link via the db instance
		*  If it's there, escape and assign
		*  Else - assign a default value
		*/ 
		if (isset($instance['facebook_link'])) {
			$facebook_link = esc_attr($instance['facebook_link']);
		}else{
			$facebook_link = 'https://www.facebook.com';
		}
		// And so on
		// Then display the backend form
		?>
			
			<p>
				<label for="<?php echo $this->get_field_id('facebook_link'); ?>"><?php _e('Facebook URL', 'my_domain'); ?></label>
				<input type="text" class="widefat" value="<?php echo esc_attr($facebook_link); ?>" name="<?php echo $this->get_field_name('facebook_link'); ?>" id="<?php echo $this->get_field_id('facebook_link'); ?>">
			</p>

		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = [
			'facebook_link' => (!empty($new_instance['facebook_link'])) ? strip_tags($new_instance['facebook_link']) : ''
			// Do for all
		]
		return $instance;
	}

}