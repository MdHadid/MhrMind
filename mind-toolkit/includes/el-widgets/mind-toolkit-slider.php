<?php
/**
 * Elementor Slider Widget.
 *
 *
 * @since 1.0.0
 */
class Elementor_Slider_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Slider widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'slider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Slider widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Slider', 'mind-toolkit' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Slider widget icon.
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
	 * Retrieve the list of categories the Slider widget belongs to.
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
	 * Register Slider widget controls.
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
			'show_slider',
			[
				'label' => __( 'Show/Hide Slider Section', 'mind-toolkit' ),
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
			'slider_section',
			[
				'label' => __( 'Slider Content', 'mind-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'slider_bg_img',
			[
				'label' => __( 'Slider Background Image', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => plugin_dir_url( dirname( __FILE__ ) ) . '../public/img/bg.jpg'
				],
				'show_label' => true
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'slider_heading',
			[
				'label' => __( 'Slider Heading', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Heading', 'mind-toolkit' ),
				'default'  => __( 'SEARCH YOUR FAVORITE COURSE HERE', 'mind-toolkit' )
			]
		);

		$repeater->add_control(
			'slider_desc',
			[
				'label' => __( 'Slider Description', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Description', 'mind-toolkit' ),
				'default' => __( 'TOP NOTCH COURSES FROM TRAINED PROFESSIONALS', 'mind-toolkit')
			]
		);

		$repeater->add_control(
			'slider_featured_img',
			[
				'label' => __( 'Slider Featured Image', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => plugin_dir_url( dirname( __FILE__ ) ) . '../public/img/slider-1.png'
				],
				'show_label' => true
			]
		);

		$repeater->add_control(
			'slider_btn1_text',
			[
				'label' => __( 'First Button Text', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Text', 'mind-toolkit' ),
				'default' => __( 'READ MORE', 'mind-toolkit' )
			]
		);

		$repeater->add_control(
			'slider_btn1_link',
			[
				'label' => __( 'First Button Link', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::URL,
				'input_type' => 'url',
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true
				]
			]
		);

		$repeater->add_control(
			'slider_btn2_text',
			[
				'label' => __( 'Second Button Text', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Text', 'mind-toolkit' ),
				'default' => __( 'GET A QUOTE', 'mind-toolkit' )
			]
		);

		$repeater->add_control(
			'slider_btn2_link',
			[
				'label' => __( 'Second Button Link', 'mind-toolkit' ),
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
			'single_slider',
			[
				'label' => __( 'Single Slider', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Single Slider #1', 'mind-toolkit' ),
						'list_content' => __( 'Single Slider Content', 'mind-toolkit' )
					]			
				]
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Slider widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		if( $settings['show_slider'] == 'show' ) : ?>
			<!-- Start Main Slider Area -->
			<?php if( ! $settings['slider_bg_img']['url'] == '' ) : ?>
	            <section class="slider_section" style="background: url(<?php echo esc_url($settings['slider_bg_img']['url']); ?>);background-repeat: no-repeat;">
	        <?php else: ?> 
	            <section class="slider_section">
	        <?php endif; ?>
	            <div id="myCarousel" class="carousel slide" data-ride="carousel">
			        <ol class="carousel-indicators">
			          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			          <li data-target="#myCarousel" data-slide-to="1"></li>
			          <li data-target="#myCarousel" data-slide-to="2"></li>
			        </ol>
	                <div class="carousel-inner">
	                	<?php foreach ( $settings['single_slider'] as $item ) : 
	                		$target1 = $item['slider_btn1_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow1 = $item['slider_btn1_link']['nofollow'] ? ' rel="nofollow"' : '';
							$target2 = $item['slider_btn2_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow2 = $item['slider_btn2_link']['nofollow'] ? ' rel="nofollow"' : ''; 
							?>
			                <div class="carousel-item">
			                	<div class="container-fluid padding_dd">
			                		<div class="carousel-caption">
			                			<div class="row">
			                				<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
	                                            <div class="text-bg">
	                                            	<h1><?php echo esc_html__( $item['slider_heading'] ); ?></h1>
			                                         <p><?php echo wp_kses_post( $item['slider_desc'] ); ?></p>
			                                        <?php if( ! $item['slider_btn1_text'] == '' ) : ?>
						                                <a href="<?php echo esc_url( $item['slider_btn1_link']['url'] ); ?>" <?php echo wp_kses_post( $target1 ); ?> <?php echo wp_kses_post( $nofollow1 ); ?>>
						                                	<?php echo esc_html__( $item['slider_btn1_text'] ); ?>
						                                </a>
					                                <?php endif; ?>
					                                <?php if( ! $item['slider_btn2_text'] == '' ) : ?>
						                                <a href="<?php echo esc_url( $item['slider_btn2_link']['url'] ); ?>" <?php echo wp_kses_post( $target2 ); ?> <?php echo wp_kses_post( $nofollow2 ); ?>>
						                                	<?php echo esc_html__( $item['slider_btn2_text'] ); ?>
						                                </a>
			                                        <?php endif; ?>
			                                    </div>
			                                </div>
			                                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
			                                	<?php if( ! $item['slider_featured_img']['url'] == '' ) : ?>
								                    <div class="images_box">
								                        <figure><img src="<?php echo esc_url( $item['slider_featured_img']['url'] ); ?>" alt="image"></figure>
								                    </div>
							                    <?php endif; ?>
							                </div>
							            </div>
							        </div>
							    </div>
							</div>
						<?php endforeach; ?>
	                </div>
	            </div>
	        </section>
	        <!-- End Main Slider Area -->
        <?php endif;
        
    }

}
