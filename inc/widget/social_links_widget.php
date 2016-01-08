<?php
class sociallinkswidget extends WP_Widget {

    function sociallinkswidget() {
        $widget_ops = array('classname' => 'sociallinkswidget', 'description' => 'Displays your social profile.');

        parent::__construct(false, 'designinvento Social', $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $title = apply_filters('widget_title', strip_tags($instance['title']));
        echo wp_kses_post($before_widget);
            if ($title){echo wp_kses_post($before_title . $title . $after_title);}
            global $jw_socials;
            echo '<div class="jw-social-icon clearfix">';
            foreach ($jw_socials as $key => $social) {
                if(!empty($instance[$social['name']])){
                    echo '<a href="'.str_replace('*',$instance[$social['name']],$social['link']).'" target="_blank" title="'.$key.'" ><span class="jw-icon-'.$key.'"></span></a>';
                }
            }
            echo '</div>';
        echo wp_kses_post($after_widget);
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance = $new_instance;
        /* Strip tags (if needed) and update the widget settings. */
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }

    function form($instance) {
        global $jw_socials; ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title:</label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo isset($instance['title']) ? $instance['title'] : ''; ?>"  />
        </p> <?php
        foreach ($jw_socials as $key => $social) { ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id($social['name'])); ?>"><?php echo wp_kses_post($key); if($key==='linkedin'){echo ' URL';} ?>:</label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id($social['name'])); ?>" name="<?php echo esc_attr($this->get_field_name($social['name'])); ?>" value="<?php echo isset($instance[$social['name']]) ? $instance[$social['name']] : ''; ?>"  />
            </p><?php
        }
    }
}

add_action('widgets_init', create_function('', 'return register_widget("sociallinkswidget");'));
?>