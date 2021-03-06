<?php
	function test_resouces(){
		wp_enqueue_style('style', get_stylesheet_uri());
	}
	add_action('wp_enqueue_scripts','test_resouces');	
	//Get to ancestor
	function get_top_ancestor_id(){
		global $post;
		if($post->post_parent){
			$ancestors = array_reverse(get_post_ancestors($post->ID));
			return $ancestors[0];
		}
		return $post->ID;
	}
	//Does page have children?
	function has_children(){
		global $post;
		$pages = get_pages('child_of='.$post->ID);
		return count($pages);
	}
	//Customize excerpt word length
	function custom_excerpt_length(){
		return 25;
	}
	add_filter('excerpt_length','custom_excerpt_length');
	//Hide excerpt point
	function new_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	//Theme setup support
	function theme_setup(){
		//Nav menu
		register_nav_menus(array(
			'primary' => __('Primary Menu'),
			'footer' => __('Footer Menu'),
		));
		//Add image support
		add_theme_support('post-thumbnails');
		add_image_size('small-thumbnail', 180, 120, true);
		add_image_size('banner-image', 920, 210, array('left', 'top'));
		//post format
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link' ) );
	}
	add_action('after_setup_theme','theme_setup');

	//Add our widget location
	function ourWidgetsInit(){
		register_sidebar(array(
			'name' => 'Sidebar',
			'id' => 'sidebar1',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="my-special-class">',
			'after_title' => '</h4>'
		));
		register_sidebar(array(
			'name' => 'Footer Area 1',
			'id' => 'footer1'
		));
		register_sidebar(array(
			'name' => 'Footer Area 2',
			'id' => 'footer2'
		));
		register_sidebar(array(
			'name' => 'Footer Area 3',
			'id' => 'footer3'
		));
		register_sidebar(array(
			'name' => 'Footer Area 4',
			'id' => 'footer4'
		));
	}
	add_action('widgets_init','ourWidgetsInit');

	//Custom color theme
	function test_customize_register($wp_customize){
		$wp_customize->add_setting('lwp_link_color',array(
			'default' => '#006ec3',
			'transport' => 'refresh',
		));
		$wp_customize->add_section('lwp_standard_colors',array(
			'title' => __('Standard Colors','LearningWordpress'),
			'priority' => 30,
		));
		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'lwp_link_color_control', array(
				'label' => __('Link Color', 'LearningWordpress'),
				'section' => 'lwp_standard_colors',
				'settings' => 'lwp_link_color',
			)));
	}
	add_action('customize_register','test_customize_register');

	//Output customize css
	function custom_css(){ ?>
		<style>
			a:link,
			a:visited{
				color: <?php echo get_theme_mod('lwp_link_color') ?>;
			}
			.site-header nav ul li.current-menu-item a:link,
			.site-header nav ul li.current-menu-item a:visited,
			.site-header nav ul li.current-page-ancestor a:link,
			.site-header nav ul li.current-page-ancestor a:visited,
			.site-footer nav ul li.current-menu-item a:link,
			.site-footer nav ul li.current-menu-item a:visited,
			div.hd-search #searchsubmit{	
				background-color: <?php echo get_theme_mod('lwp_link_color') ?>;			
			}
		</style>
	<?php }
	add_action('wp_head','custom_css');