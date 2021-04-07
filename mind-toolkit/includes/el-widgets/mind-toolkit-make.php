<?php
/**
 * Elementor Make Widget.
 *
 *
 * @since 1.0.0
 */
class Elementor_Make_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Make widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'make';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Make widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Make', 'mind-toolkit' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Make widget icon.
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
	 * Retrieve the list of categories the Make widget belongs to.
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
	 * Register Make widget controls.
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
			'show_make',
			[
				'label' => __( 'Show/Hide Make Section', 'mind-toolkit' ),
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
			'make_section',
			[
				'label' => __( 'Make Content', 'mind-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'make_heading',
			[
				'label' => __( 'Make Heading', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Heading', 'mind-toolkit' ),
				'default'  => __( 'Make Your <strong class="white_colo">Courses Standout</strong>', 'mind-toolkit' )
			]
		);

		$this->add_control(
			'make_desc',
			[
				'label' => __( 'Make Description', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Description', 'mind-toolkit' ),
				'default' => __( 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', 'mind-toolkit')
			]
		);

		$this->add_control(
			'make_btn_text',
			[
				'label' => __( 'Button Text', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Text', 'mind-toolkit' ),
				'default' => __( 'START NOW', 'mind-toolkit' )
			]
		);

		$this->add_control(
			'make_btn_link',
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
			'make_bg_img',
			[
				'label' => __( 'Make Image', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => plugin_dir_url( dirname( __FILE__ ) ) . '../public/img/make_img.jpg'
				],
				'show_label' => true
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Make widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$target = $settings['make_btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['make_btn_link']['nofollow'] ? ' rel="nofollow"' : '';

		if( $settings['show_make'] == 'show' ) : ?>
            <div class="make">
			  <div class="container">
			    <div class="row">
			      <div class="col-md-12">
			        <div class="titlepage">
			          <h2><?php echo wp_kses_post( $settings['make_heading'] ); ?></h2>
			        </div>
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
			        <div class="make_text">
			          <p><?php echo wp_kses_post( $settings['make_desc'] ); ?>
			          </p>
			            <?php if( ! $settings['make_btn_text'] == '' ) : ?>
                            <a href="<?php echo esc_url( $settings['make_btn_link']['url'] ); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?>>
                            	<?php echo esc_html__( $settings['make_btn_text'] ); ?>
                            </a>
                        <?php endif; ?>
			        </div>
			      </div>
			      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
			        <div class="make_img">
			          <?php if( $settings['make_bg_img']['url'] != '' ) : ?>
				          <figure>
				          	<img src="<?php echo esc_url($settings['make_bg_img']['url']); ?>" alt="#" />
				          </figure>
			          <?php endif; ?>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
			<!-- end MAKE --> 
        <?php endif;
        
    }

}
