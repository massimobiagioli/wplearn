<?php get_header(); ?>

<div id="main-container">

    <section id="content-container">
    
    <?php
        while (have_posts()) : the_post();
        
        get_template_part('content', 'single');
        
        comments_template('', true);
        
        endwhile;
    ?>
        
    </section>  <!-- #content-container ends -->

<?php get_sidebar(); ?>
    
</div>

<?php get_footer(); ?>
