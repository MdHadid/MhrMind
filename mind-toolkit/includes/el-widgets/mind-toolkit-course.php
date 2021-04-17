<?php
/**
 * Elementor Course Widget.
 *
 *
 * @since 1.0.0
 */
class Elementor_Course_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Course widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'course';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Course widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Course', 'mind-toolkit' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Course widget icon.
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
	 * Retrieve the list of categories the Course widget belongs to.
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
	 * Register Course widget controls.
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
			'show_course',
			[
				'label' => __( 'Show/Hide Course Section', 'mind-toolkit' ),
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
			'course_section',
			[
				'label' => __( 'Course Content', 'mind-toolkit' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT
			]
		);

		$this->add_control(
			'course_heading',
			[
				'label' => __( 'Course Heading', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Heading', 'mind-toolkit' ),
				'default'  => __( 'My <strong class="yellow"> Courses</strong>', 'mind-toolkit' )
			]
		);

		$this->add_control(
			'course_desc',
			[
				'label' => __( 'Course Description', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Description', 'mind-toolkit' ),
				'default' => __( "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).", 'mind-toolkit')
			]
		);

		$this->add_control(
			'course_btn_text',
			[
				'label' => __( 'Button Text', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Text', 'mind-toolkit' ),
				'default' => __( 'READ MORE', 'mind-toolkit' )
			]
		);

		$this->add_control(
			'course_btn_link',
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'course_title',
			[
				'label' => __( 'Course Title', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Title', 'mind-toolkit' ),
				'default'  => __( 'Data Structures', 'mind-toolkit' )
			]
		);

		$repeater->add_control(
			'course_content',
			[
				'label' => __( 'Course Content', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'input_type' => 'WYSIWYG',
				'placeholder' => __( 'Content', 'mind-toolkit' ),
				'default' => __( 'It is a long established fact that a reader will be distracted by the readable content o', 'mind-toolkit')
			]
		);

		$repeater->add_control(
			'course_link',
			[
				'label' => __( 'Course Link', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => __( 'Link', 'mind-toolkit' ),
				'default' => __( '#', 'mind-toolkit')
			]
		);

		$repeater->add_control(
			'course_featured_img',
			[
				'label' => __( 'Course Featured Image', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => plugin_dir_url( dirname( __FILE__ ) ) . '../public/img/my1.jpg'
				],
				'show_label' => true
			]
		);

		$this->add_control(
			'single_course',
			[
				'label' => __( 'Single Course', 'mind-toolkit' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Single Course #1', 'mind-toolkit' ),
						'list_content' => __( 'Single Course Content', 'mind-toolkit' )
					]			
				]
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render Course widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
		$target = $settings['course_btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['course_btn_link']['nofollow'] ? ' rel="nofollow"' : '';

		if( $settings['show_course'] == 'show' ) : ?>
            <!-- Courses -->
			<div id="courses" class="Courses">
			  <div class="container-fluid padding_left3">
			    <div class="row">
			      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
			        <div class="box_bg">
			          <div class="box_bg_img">
			            <div class="row">
			              <?php foreach ( $settings['single_course'] as $item ) : ?>
				              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				              	<a target="_blank" href="<?php echo esc_url( $item['course_link'] ); ?>">
				                <div class="box_my">
				                    <?php if( ! $item['course_featured_img']['url'] == '' ) : ?>
					                    <figure><img src="<?php echo esc_url( $item['course_featured_img']['url'] ); ?>" alt="image"></figure>
				                    <?php endif; ?>
				                  <div class="overlay">
				                    <h3><?php echo esc_html__( $item['course_title'] ); ?></h3>
				                    <p><?php echo wp_kses_post( $item['course_content'] ); ?></p>
				                  </div>
				                </div>
				              </div>
				              </a>
			              <?php endforeach; ?>
			            </div>
			          </div>
			        </div>
			      </div>
			      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 border_right">
			        <div class="box_text">
			          <div class="titlepage">
			            <h2><?php echo wp_kses_post( $settings['course_heading'] ); ?></h2>
			          </div>
			          <p><?php echo wp_kses_post( $settings['course_desc'] ); ?></p>
			          <?php if( ! $settings['course_btn_text'] == '' ) : ?>
                            <a href="<?php echo esc_url( $settings['course_btn_link']['url'] ); ?>" <?php echo wp_kses_post( $target ); ?> <?php echo wp_kses_post( $nofollow ); ?>>
                            	<?php echo esc_html__( $settings['course_btn_text'] ); ?>
                            </a>
                        <?php endif; ?>
			        </div>
			      </div> 
			    </div>
			  </div>
			</div>
			<!-- end Courses -->
        <?php endif;
        
    }

}
