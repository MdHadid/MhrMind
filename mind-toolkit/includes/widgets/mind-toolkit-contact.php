<?php
 /**
 * Contact Info Widget
 */
class Mind_contact_info extends WP_Widget{

    function __construct(){
        $widget_ops = array('description' => esc_html__('Display Contact Info', 'mind-toolkit'));
        parent::__construct( false, esc_html__('MhrMind Contact Info', 'mind-toolkit'), $widget_ops);
    }

    function widget($args, $instance){
        extract($args);
        global $mind_theme;

        $title  = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget);
        if($title) echo wp_kses_post($before_title.$title.$after_title);
        ?>
        <ul class="loca">
            <?php if( $instance['location'] != '' ): ?>
                <li>
                    <a href="<?php echo esc_url( $instance['location_link'] ); ?>" target="_blank">
                        <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'icon/loc.png'; ?>" alt="#" />
                    </a>
                    <?php echo wp_kses_post($instance['location']); ?>
                </li>
            <?php endif; ?>

            <?php if( $instance['email'] != '' ): ?>
                <li>
                    <a href="<?php echo esc_url( $instance['email_link'] ); ?>">
                        <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'icon/email.png'; ?>" alt="#" />
                    </a>
                    <?php echo wp_kses_post($instance['email']); ?>
                </li>
            <?php endif; ?>

            <?php if( $instance['phone_link'] != '' ): ?>
                <li>
                    <a href="<?php echo esc_url( $instance['phone_link'] ); ?>">
                        <img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'icon/call.png'; ?>" alt="#" />
                    </a>
                    <?php echo wp_kses_post($instance['phone']); ?>
                </li>
            <?php endif; ?>
        </ul>
        <ul class="social_link">
            <?php if( $instance['fb_link'] != '' ): ?>
                <li><a href="<?php echo esc_url( $instance['fb_link'] ); ?>" class="facebook"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'icon/fb.png'; ?>" alt="#" /></a></li>
            <?php endif;
            if( $instance['tw_link'] != '' ): ?>
                <li><a href="<?php echo esc_url( $instance['tw_link'] ); ?>" class="twitter"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'icon/tw.png'; ?>" alt="#" /></a></li>
            <?php endif; 
            if( $instance['lin_link'] != '' ): ?>
                <li><a href="<?php echo esc_url( $instance['lin_link'] ); ?>" class="linkedin"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'icon/lin.png'; ?>" alt="#" /></a></li>
            <?php endif;
            if( $instance['in_link'] != '' ): ?>
                <li><a href="<?php echo esc_url( $instance['in_link'] ); ?>" class="instagram"><img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'icon/in.png'; ?>" alt="#" /></a></li>
            <?php endif; ?>
        </ul>                   
        <?php
        echo wp_kses_post($after_widget);
    }

    function update($new_instance, $old_instance){
        $instance                    = $old_instance;
        $instance['title']           = strip_tags($new_instance['title']);
        $instance['location']        = $new_instance['location'];
        $instance['location_link']   = $new_instance['location_link'];
        $instance['phone']           = $new_instance['phone'];
        $instance['phone_link']      = $new_instance['phone_link'];
        $instance['email']           = $new_instance['email'];
        $instance['email_link']      = $new_instance['email_link'];
        $instance['phone_link']      = $new_instance['phone_link'];
        $instance['fb_link']         = $new_instance['fb_link'];
        $instance['tw_link']         = $new_instance['tw_link'];
        $instance['lin_link']        = $new_instance['lin_link'];
        $instance['in_link']         = $new_instance['in_link'];
        return $instance;
    }

    function form($instance){
        $defaults = array(
            'title'             => esc_html__('Contact Us', 'mind-toolkit'),
            'location'          => esc_html__('London 145, United Kingdom'),
            'location_link'     => '#',
            'phone'             => esc_html__('+1 (123) 456 7890', 'mind-toolkit'),
            'phone_link'        => esc_html__('tel:+11234567890', 'mind-toolkit'),
            'email'             => esc_html__('demo@gmail.com', 'mind-toolkit'),
            'email_link'        => esc_html__('mailto:demo@gmail.com', 'mind-toolkit'),
            'fb_link'           => esc_html__('#', 'mind-toolkit'),
            'tw_link'           => esc_html__('#', 'mind-toolkit'),
            'lin_link'          => esc_html__('#', 'mind-toolkit'),
            'in_link'           => esc_html__('#', 'mind-toolkit'),
        );
        $instance = wp_parse_args((array)$instance, $defaults);
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_html_e('Title:', 'mind-toolkit'); ?>
                <input class="widget" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo wp_kses_post($instance['title']); ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('location')); ?>">
                <?php esc_html_e('Location:', 'mind-toolkit'); ?>
                <input class="widget" id="<?php echo esc_attr($this->get_field_id('location')); ?>" name="<?php echo esc_attr($this->get_field_name('location')); ?>" type="text" value="<?php echo wp_kses_post($instance['location']); ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('location_link')); ?>">
                <?php esc_html_e('Location Link:', 'mind-toolkit'); ?>
                <input class="widget" id="<?php echo esc_attr($this->get_field_id('location_link')); ?>" name="<?php echo esc_attr($this->get_field_name('location_link')); ?>" type="text" value="<?php echo wp_kses_post($instance['location_link']); ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>">
                <?php esc_html_e('Email:', 'mind-toolkit'); ?>
                <input class="widget" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo wp_kses_post($instance['email']); ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_link')); ?>">
                <?php esc_html_e('Email Link:', 'mind-toolkit'); ?>
                <input class="widget" id="<?php echo esc_attr($this->get_field_id('email_link')); ?>" name="<?php echo esc_attr($this->get_field_name('email_link')); ?>" type="text" value="<?php echo wp_kses_post($instance['email_link']); ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>">
                <?php esc_html_e('Phone Number:', 'mind-toolkit'); ?>
                <input class="widget" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo wp_kses_post($instance['phone']); ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_link')); ?>">
                <?php esc_html_e('Number Link:', 'mind-toolkit'); ?>
                <input class="widget" id="<?php echo esc_attr($this->get_field_id('phone_link')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_link')); ?>" type="text" value="<?php echo wp_kses_post($instance['phone_link']); ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('fb_link')); ?>">
                <?php esc_html_e('Facebook Link:', 'mind-toolkit'); ?>
                <input class="widget" id="<?php echo esc_attr($this->get_field_id('fb_link')); ?>" name="<?php echo esc_attr($this->get_field_name('fb_link')); ?>" type="text" value="<?php echo wp_kses_post($instance['fb_link']); ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('tw_link')); ?>">
                <?php esc_html_e('Twitter Link:', 'mind-toolkit'); ?>
                <input class="widget" id="<?php echo esc_attr($this->get_field_id('tw_link')); ?>" name="<?php echo esc_attr($this->get_field_name('tw_link')); ?>" type="text" value="<?php echo wp_kses_post($instance['tw_link']); ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lin_link')); ?>">
                <?php esc_html_e('Linkedin Link:', 'mind-toolkit'); ?>
                <input class="widget" id="<?php echo esc_attr($this->get_field_id('lin_link')); ?>" name="<?php echo esc_attr($this->get_field_name('lin_link')); ?>" type="text" value="<?php echo wp_kses_post($instance['lin_link']); ?>" />
            </label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('in_link')); ?>">
                <?php esc_html_e('Google Plus Link:', 'mind-toolkit'); ?>
                <input class="widget" id="<?php echo esc_attr($this->get_field_id('in_link')); ?>" name="<?php echo esc_attr($this->get_field_name('in_link')); ?>" type="text" value="<?php echo wp_kses_post($instance['in_link']); ?>" />
            </label>
        </p>

        <?php
    }

}

function mind_register_contact_info() {
    register_widget('Mind_contact_info');
}

add_action('widgets_init', 'mind_register_contact_info');