<?php
/*
Plugin Name: AddAff
Plugin URI: http://www.massimobiagioli.it/addaff/
Description: A global affiliate link setting with post specific links.
Version: 1.0
Author: Massimo Biagioli
Author URI: http://www.massimobiagioli.it
*/

define('ADDAFF_PLUGIN_DIR', plugin_dir_path( __FILE__ ));

require_once(ADDAFF_PLUGIN_DIR . 'addaff_widget.php');

/* SETTINGS */

add_action('admin_init', 'addaff_init');

function addaff_init() {
    register_setting('addaff_options', 'addaff_option', 'addaff_validate');
}

add_action('admin_menu', 'addaff_add_page');

function addaff_add_page() {
    add_options_page('AddAff Settings', 'AddAff', 'manage_options', 'addaff', 'addaff_do_page');
}

function addaff_do_page() {
?>
<div class="wrap">
    <h2>AddAff Settings</h2>
    <p>AddAff helps you to easily manage products links and add affiliate
        parameters to them. Most affiliate programs want you to provide a string
        before and sometimes after the actual product link.</p>
    <p>Example: <strong>http://aff.com/client/1234/out?=</strong>
        <em>http://product.com/9876</em><strong>&%stringafter</strong></p>
    <p>The bold parts of the link are controlled from here, the italic part is
        the product link which you provide on a per post basis.</p>
    <form method="post" action="options.php">
        <?php settings_fields('addaff_options'); ?>
        <?php $options = get_option('addaff_option'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">URL string to go <strong>before</strong> the product link: </th>
                <td>
                    <input type="text" name="addaff_option[urlbefore]"
                           value="<?php echo $options['urlbefore']; ?>"
                           class="regular-text code" />
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">URL string to go <strong>after</strong> the product link: </th>
                <td>
                    <input type="text" name="addaff_option[urlafter]"
                           value="<?php echo $options['urlafter']; ?>"
                           class="regular-text code" />
                </td>
            </tr>
        </table>
        <p class="submit">
            <input type="submit" class="button-primary"
                   value="<?php _e('Save Changes') ?>" />
        </p>
    </form>
</div>
<?php
}

function addaff_validate($input) {
    $input['urlbefore'] = wp_filter_nohtml_kses($input['urlbefore']);
    $input['urlafter'] = wp_filter_nohtml_kses($input['urlafter']);
    
    return $input;
}

/* META BOXES */

add_action('add_meta_boxes', 'addaff_meta');

function addaff_meta() {
    add_meta_box('addaff_meta_name', 
            __('Affiliate Product Link', 'addaff'),
            'addaff_meta_box',
            'post',
            'normal',
            'core');
}

function addaff_meta_box($post) {
    
    // Ottiene i valori per compilare i campi di input, se disponibili
    $title = get_post_meta($post->ID, '_addaff_meta_box_title', true);
    $url = get_post_meta($post->ID, '_addaff_meta_box_url', true);
    
    // Verifica l'intenzione in un secondo momento
    wp_nonce_field('save_addaff_meta_box', 'addaff_meta_box_nonce');
?>
<p>
    <?php _e('The link title will be linked and appended to the bottom of
            every post when the full content is shown. This might include archive
            pages, depending on your theme. You can alter the particulars on
            <a href="options-general.php?page=addaff">The AddAff settings page</a>.',
            'addaff'); ?>
            
</p>
<p>
    <label for="event-title"><strong><?php _e('Affiliate Link Title: ', 'addaff'); ?></strong></label>
    <input type="text" class="widefat" id="event-title" name="_addaff_meta_box_title"
           value="<?php echo $title; ?>" />
</p>
<p>
    <label for="event-url"><strong><?php _e('Product URL: ', 'addaff'); ?></strong></label>
    <input type="text" class="widefat" id="event-url" name="_addaff_meta_box_url"
           value="<?php echo $url; ?>" />
</p>
<?php
}

// Esegue il salvataggio
add_action('save_post', 'addaff_meta_save');

function addaff_meta_save($id) {
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    
    if (!isset($_POST['addaff_meta_box_nonce']) || 
        !wp_verify_nonce($_POST['addaff_meta_box_nonce'], 'save_addaff_meta_box')) {
        
        return;
    }
    
    if (!current_user_can('edit_post')) return;
    
    if (isset($_POST['_addaff_meta_box_title'])) {
        update_post_meta($id, 
                '_addaff_meta_box_title',
                esc_attr(strip_tags($_POST['_addaff_meta_box_title'])));
    }

    if (isset($_POST['_addaff_meta_box_url'])) {
        update_post_meta($id, 
                '_addaff_meta_box_url',
                esc_attr(strip_tags($_POST['_addaff_meta_box_url'])));
    }
    
}

/* OUTPUT */

add_filter('the_content', 'addaff_link', 11);

function addaff_link($content) {
    
    // Recupera metadati post
    $addaff_link_title = get_post_meta(get_the_ID(), '_addaff_meta_box_title', true);
    $addaff_link_url = get_post_meta(get_the_ID(), '_addaff_meta_box_url', true);
    
    if ($addaff_link_title && $addaff_link_url !== '') {
        
        // Recupera le impostazioni
        $addaff_url = get_option('addaff_option');
        
        // Crea il markup e lo aggiunge a content
        $content .= '<ul id="addaff"><li class="addaff-item"><a href="';
        $content .= $addaff_url['urlbefore'];
        $content .= $addaff_link_url;
        $content .= $addaff_url['urlafter'];
        $content .= '">';
        $content .= $addaff_link_title;
        $content .= '</a></li></ul>';
    } 
    
    return $content;
}

function addaff_widget_init() {
    register_widget('AddAffWidget');
}

add_action('widgets_init', 'addaff_widget_init');