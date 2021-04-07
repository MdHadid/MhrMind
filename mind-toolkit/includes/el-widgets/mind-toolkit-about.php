<?php
/**
 * Elementor About Widget.
 *
 *
 * @since 1.0.0
 */
class Elementor_About_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve About widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'about';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve About widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'About', 'mind-toolkit' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve About widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-image';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the About widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'mind-toolkit' ];
	}

	/**
	 * Register About widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'default_section',
			[    
				'label' => __( 'Settings', 'mind-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'show_about',
			[
				'label' => __( 'Show/Hide About Section', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'show' => [
						'title' => __( 'Show', 'mind-toolkit' ),
						'icon' => 'fa fa-check'
					],
					'hide' => [
						'title' => __( 'Hide', 'mind-toolkit' ),
						'icon' => 'fa fa-close'
					]
				],
				'default' => 'show',
				'toggle' => true
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'about_section',
			[
				'label' => __( 'About Content', 'mind-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'about_heading',
			[
				'label' => __( 'About Heading', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Heading', 'mind-toolkit' ),
				'default'  => __( 'About <strong class="yellow">Our Game</strong>', 'mind-toolkit' )
			]
		);

		$this->add_control(
			'about_desc',
			[
				'label' => __( 'About Description', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Description', 'mind-toolkit' ),
				'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas voluptatem maiores eaque similique non distinctio voluptates perspiciatis omnis, repellendus ipsa aperiam, laudantium voluptatum nulla?.', 'mind-toolkit')
			]
		);

		$this->add_control(
			'about_btn_text',
			[
				'label' => __( 'Button Text', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Text', 'mind-toolkit' ),
				'default' => __( 'READ MORE', 'mind-toolkit' )
			]
		);

		$this->add_control(
			'about_btn_link',
			[
				'label' => __( 'Button Link', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::URL,
				'input_type' => 'url',
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true
				]
			]
		);

		$this->add_control(
			'about_bg_img',
			[
				'label' => __( 'About Image', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => plugin_dir_url( dirname( __FILE__ ) ) . '../public/img/about.jpg'
				],
				'show_label' => true
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render About widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$target = $settings['about_btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['about_btn_link']['nofollow'] ? ' rel="nofollow"' : '';

		if( $settings['show_about'] == 'show' ) : ?>
	        <!-- about  -->
			<div id="about" class="about">
			  <div class="container">
			    <div class="row">
			      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
			        <div class="about-box">
			          <h2><?php echo wp_kses_post( $settings['about_heading'] ); ?></h2>
			          <p><?php echo wp_kses_post( $settings['about_desc'] ); ?></p>
			          <?php if( ! $settings['about_btn_text'] == '' ) : ?>
                            <a href="<?php echo esc_url( $settings['about_btn_link']['url'] ); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?>>
                            	<?php echo esc_html__( $settings['about_btn_text'] ); ?>
                            </a>
                        <?php endif; ?>
			        </div>
			      </div>
			      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
			        <div class="about-box">
			          <?php if( $settings['about_bg_img']['url'] != '' ) : ?>
				          <figure>
				          	<img src="<?php echo esc_url($settings['about_bg_img']['url']); ?>" alt="#" />
				          </figure>
			          <?php endif; ?>
			        </div>
			      </div>
			    </div>

			  </div>
			</div>
            <!-- end abouts -->
        <?php endif;
        
    }

}
