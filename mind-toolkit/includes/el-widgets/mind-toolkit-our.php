<?php
/**
 * Elementor Our Widget.
 *
 *
 * @since 1.0.0
 */
class Elementor_Our_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Our widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'our';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Our widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Our', 'mind-toolkit' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Our widget icon.
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
	 * Retrieve the list of categories the Our widget belongs to.
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
	 * Register Our widget controls.
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
			'show_our',
			[
				'label' => __( 'Show/Hide Our Section', 'mind-toolkit' ),
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
			'our_section',
			[
				'label' => __( 'Our Content', 'mind-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'our_heading',
			[
				'label' => __( 'Our Heading', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Heading', 'mind-toolkit' ),
				'default'  => __( 'Some <strong class="yellow">important facts</strong>', 'mind-toolkit' )
			]
		);

		$this->add_control(
			'our_desc',
			[
				'label' => __( 'Our Description', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Description', 'mind-toolkit' ),
				'default' => __( 'luptatum. Libero eligendi molestias iure error animi totam laudantium, aspernatur similique id eos at consectetur illo culpa', 'mind-toolkit')
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'our_title',
			[
				'label' => __( 'Our Title', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Title', 'mind-toolkit' ),
				'default'  => __( '200+', 'mind-toolkit' )
			]
		);

		$repeater->add_control(
			'our_subtitle',
			[
				'label' => __( 'Our Subtitle', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Subtitle', 'mind-toolkit' ),
				'default' => __( 'Teachers', 'mind-toolkit')
			]
		);

		$this->add_control(
			'single_our',
			[
				'label' => __( 'Single Our', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Single Our #1', 'mind-toolkit' ),
						'list_content' => __( 'Single Our Content', 'mind-toolkit' )
					]			
				]
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Our widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if( $settings['show_our'] == 'show' ) : ?>
	        <!-- our -->
			<div id="important" class="important">
			  <div class="container">
			    <div class="row">
			      <div class="col-md-12">
			        <div class="titlepage">
			          <h2><?php echo wp_kses_post( $settings['our_heading'] ); ?></h2>
			          <span><?php echo wp_kses_post( $settings['our_desc'] ); ?></span>
			        </div>
			      </div>
			    </div>
			  </div>
			  <div class="important_bg">
			    <div class="container">
			      <div class="row">
			      	<?php foreach ( $settings['single_our'] as $item ) : ?>
				        <div class="col col-xs-12">
				          <div class="important_box">
				            <h3><?php echo esc_html__( $item['our_title'] ); ?></h3>
				            <span><?php echo esc_html__( $item['our_subtitle'] ); ?></span>
				          </div>
				        </div>
			        <?php endforeach; ?>
			      </div>
			    </div>
			  </div>
			</div>
			</div>

			<!-- end our -->
        <?php endif;
        
    }

}
