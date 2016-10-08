<?php
/*
Plugin Name: Smashing Post Type
Plugin URI: http://www.massimobiagioli.it/smashing_post_type/
Description: Test post personalizzati
Version: 1.0
Author: Massimo Biagioli
Author URI: http://www.massimobiagioli.it
*/

// Aggiunge all'hook init
add_action('init', 'smashing_post_types');

// Aggiunge questi tipi di post personalizzati
function smashing_post_types() {
    
    // Registra Smashing Post Type
    register_post_type('smashing_post_type',
        array(
            'labels' => array(
                'name' => 'Smashing Post Type',
                'menu_name' => 'Smashing Posts'
            ),
            'singular_label' => 'Smashing Post Type',
            'public' => true,
            'show_ui' => true,
            'menu_position' => 5,
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchal' => false,
            'show_in_menu' => true,
            'supports' => array('title', 'editor', 'author', 'revisions', 'comments')
        )
    );
    
}
