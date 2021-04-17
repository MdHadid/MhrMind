<?php
/**
 * Elementor Contact Widget.
 *
 *
 * @since 1.0.0
 */
class Elementor_Contact_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Contact widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'contact';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Contact widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Contact', 'mind-toolkit' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Contact widget icon.
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
	 * Retrieve the list of categories the Contact widget belongs to.
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
	 * Register Contact widget controls.
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
			'show_contact',
			[
				'label' => __( 'Show/Hide Contact Section', 'mind-toolkit' ),
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
			'contact_section',
			[
				'label' => __( 'Contact Content', 'mind-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'contact_heading',
			[
				'label' => __( 'Contact Heading', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Heading', 'mind-toolkit' ),
				'default'  => __( 'Contact <strong class="yellow">us</strong>', 'mind-toolkit' )
			]
		);

		$this->add_control(
			'contact_map',
			[
				'label' => __( 'Contact Form Map', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Map', 'mind-toolkit' )
			]
		);

		$this->add_control(
			'contact_form_shortcode',
			[
				'label' => __( 'Contact Form Shortcode', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Shortcode', 'mind-toolkit' )
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Contact widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if( $settings['show_contact'] == 'show' ) : ?>
	        <!-- contact -->
			<div id="contact" class="contact">
			  <div class="container-fluid padding_left2">
			    <div class="white_color">
			      <div class="row">
			        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
			          <form class="contact_bg">
			            <div class="row">
			              <div class="col-md-12">
			                <div class="titlepage">
			                  <h2><?php echo wp_kses_post( $settings['contact_heading'] ); ?></h2>
			                </div>
			                <?php echo do_shortcode( $settings['contact_form_shortcode'] ); ?>
			              </div>
			            </form>
			          </div>
			        </div>
			      </div>
			    </div>
       		    <!-- end contact -->
        <?php endif;
        
    }

}
