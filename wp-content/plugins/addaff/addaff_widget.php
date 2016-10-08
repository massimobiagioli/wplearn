<?php
class AddAffWidget extends WP_Widget {
    
    function AddAffWidget() {
        parent::WP_Widget(false, $name = 'AddAff Widget');
    }
    
    function widget($args, $instance) {
        extract($args);
        echo $before_widget;
        echo $before_title . $instance['title'] . $after_title;
        echo "Hello World! Tutto bene?";
        echo $after_widget;
    }
    
    function update($new_instance, $old_instance) {
        return $new_instance;
    }
    
    function form($instance) {
        $title = esc_attr($instance['title']);
?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>">
        Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                      name="<?php echo $this->get_field_name('title'); ?>"
                      type="text" value="<?php echo $title; ?>" />
    </label>
</p>
<?php
    }
    
}