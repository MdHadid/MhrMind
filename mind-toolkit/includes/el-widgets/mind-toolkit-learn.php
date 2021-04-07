<?php
/**
 * Elementor Learn Widget.
 *
 *
 * @since 1.0.0
 */
class Elementor_Learn_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Learn widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'learn';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Learn widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Learn', 'mind-toolkit' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Learn widget icon.
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
	 * Retrieve the list of categories the Learn widget belongs to.
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
	 * Register Learn widget controls.
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
			'show_learn',
			[
				'label' => __( 'Show/Hide Learn Section', 'mind-toolkit' ),
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
			'learn_section',
			[
				'label' => __( 'Learn Content', 'mind-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'learn_heading',
			[
				'label' => __( 'Learn Heading', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Heading', 'mind-toolkit' ),
				'default'  => __( 'Learn <strong class="yellow">the Practical way</strong>', 'mind-toolkit' )
			]
		);

		$this->add_control(
			'learn_desc',
			[
				'label' => __( 'Learn Description', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Description', 'mind-toolkit' ),
				'default' => __( "packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).", 'mind-toolkit')
			]
		);

		$this->add_control(
			'learn_btn_link',
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
			'learn_bg_img',
			[
				'label' => __( 'Learn Image', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => plugin_dir_url( dirname( __FILE__ ) ) . '../public/img/img.jpg'
				],
				'show_label' => true
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Learn widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$target = $settings['learn_btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['learn_btn_link']['nofollow'] ? ' rel="nofollow"' : '';

		if( $settings['show_learn'] == 'show' ) : ?>
            <!-- learn -->
			<div id="learn" class="learn">
			  <div class="container">
			    <div class="row">
			      <div class="col-md-12">
			        <div class="titlepage">
			          <h2><?php echo wp_kses_post( $settings['learn_heading'] ); ?></h2>
			          <span><?php echo wp_kses_post( $settings['learn_desc'] ); ?></span>
			        </div>
			      </div>
			    </div>
			    <div class="row">
			      <div class="col-md-12">
			        <div class="learn_box">
			          <?php if( $settings['learn_bg_img']['url'] != '' ) : ?>
			          	<a href="<?php echo esc_url( $settings['learn_btn_link']['url'] ); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?>>
				          <figure>
				          	<img src="<?php echo esc_url($settings['learn_bg_img']['url']); ?>" alt="#" />
				          </figure>
				        </a>
			          <?php endif; ?>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>
        <?php endif;
        
    }

}
