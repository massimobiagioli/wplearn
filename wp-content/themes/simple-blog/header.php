<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
    
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />        
    <title>
    <?php
        // Titolo
        wp_title('|', true, 'right');
        // Aggiunge il nome del blog
        bloginfo('name');
    ?>
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />

    <!-- [if lt IE 9]>
    <script scr="http://html5shim.googlecod.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php>
        // wp_head() deve sempre trovarsi appena sopra il tag di chiusura head
        wp_head();
    ?>
</head>
    
<body <?php body_class(); ?>>
    <div id="outer-wrap">
        <div id="inner-wrap">

            <header id="header-container">

                <hgroup>
                <?php if(is_home() || is_front_page()) { ?>
                    <h1 id="site-title">
                        <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <h2 id="site-description">
                        <?php bloginfo('description'); ?>
                    </h2>
                <?php } else { ?>
                    <div id="site-title">
                        <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                    </div>
                    <div id="site-description">
                        <?php bloginfo('description'); ?>
                    </div>
                <?php } ?>    
                </hgroup>

                <nav>
                <?php
                    // Menu di navigazione superiore
                    wp_nav_menu(array(
                       'theme_location' => 'top_navigation' 
                    ));
                ?>
                </nav>

            </header>   <!-- #header-container ends -->
        