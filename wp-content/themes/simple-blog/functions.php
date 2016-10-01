<?php

// Imposta la larghezza per il contenuto del tema
if (!isset($content_width)) {
    $content_width = 500;
}

// Imposta il tema
add_action('after_setup_theme', 'simpleblog_themesetup');
function simpleblog_themesetup() {
    
    // Link automatici dei feed
    add_theme_support('automatic_feed-links');
    
    // Aggiunge la funzione di navigazione dei menu all'hook init
    add_action('init', 'simpleblog_register_menus');
    
    // Aggiunge la funzione della sidebar all'hook widgets_init
    add_action('widgets_init', 'simpleblog_register_sidebars');
    
    // Carica file JavasScript sull'hook "wp_enqueue_scripts"
    add_action('wp_enqueue_scripts', 'simpleblog_load_scripts');
}

// Menu di registro
function simpleblog_register_menus() {
    register_nav_menus(array(
        'top-navigation' => 'Top Navigation',
        'bottom-navigation' => 'Bottom Navigation'
    ));
}

// Registra le aree del widget
function simpleblog_register_sidebars() {
    // Area dei widget nella colonna di destra
    register_sidebar(array(
        'name' => 'Right column',
        'id' => 'right-column',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after-title' => '</h3>'
    ));
}

// Carica JavaScripts
function simpleblog_load_scripts() {
    // Carica JavaScript per i thread dei componenti se abilitati
    if (is_singular() && get_option('thread_comments') && comments_open()) {
        wp_enqueue_script('comment-reply');
    }
}