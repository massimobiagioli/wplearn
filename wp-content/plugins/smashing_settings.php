<?php
/*
Plugin Name: Smashing Settings
Plugin URI: http://www.massimobiagioli.it/smashings_settings/
Description: A simple settings plugin
Version: 1.0
Author: Massimo Biagioli
Author URI: http://www.massimobiagioli.it
*/

// Aggiunge la funzione della pagina di impostazioni al menu
add_action('admin_menu', 'smashings_settingsdemo_add_page');

// Aggiunge al menu
function smashings_settingsdemo_add_page() {
    add_options_page('Smashing Sample Settings', 
            'Smashing Settings', 
            'manage_options',
            'smashings_settingsdemo', 
            'smashings_settingsdemo_do_page');
}

// Aggiunge la pagina di impostazioni vera e propria
function smashings_settingsdemo_do_page() {
?>
<h2>Smashing Settings</h2>
<p>This is our settings page.</p>
<form action="options.php" method="post">
    <?php settings_fields('smashings_settingsdemo'); ?>
    <?php do_settings_sections('smashings_settingsdemo'); ?>
    <?php submit_button(); ?>
</form>
<?php
}

// Esegue il whitelisting delle impostazioni
function smashings_settingsdemo_init() {
    
    // Aggiunge la sezione
    add_settings_section('smashings_settings_section', 
            'Smashing Settings', 
            'smashings_settings_section_callback', 
            'smashings_settingsdemo');
    
    // Aggiunge il campo di impostazioni
    add_settings_field('smashings_sample_input', 
            'Input Sample', 
            'smashings_sample_input_callback', 
            'smashings_settingsdemo', 
            'smashings_settings_section');
    
    // Registra le impostazioni
    register_setting('smashings_settingsdemo', 
            'smashings_sample_input', 
            'smashings_settingsdemo_validate');
}

// Inizializza smashings_settingsdemo_init() nell'interfaccia di amministrazione
add_action('admin_init', 'smashings_settingsdemo_init');

// Viene eseguito all'inizio della sezione
function smashings_settings_section_callback() {
    echo '<p>This is the section intro.</p>';
}

// Impostazione di esempio di input
function smashings_sample_input_callback() {
?>
<input type="text" name="smashings_sample_input" value="<?php echo get_option('smashings_sample_input'); ?>" />
<?php
}

// Esegue il sanitizing
function smashings_settingsdemo_validate($input) {
    return esc_attr($input);
}