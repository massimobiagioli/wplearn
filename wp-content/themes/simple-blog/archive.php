<?php get_header(); ?>

<div id="main-container">

    <section id="content-container">
        <header class="page-header">
            <h1 class="page-title">
                <?php if (is_day()) : ?>
                    Archivi giornalieri per <span><?php echo get_the_date(); ?></span>
                <?php elseif (is_month()) : ?>
                    Archivi mensili per <span><?php echo get_the_date('F Y'); ?></span>
                <?php elseif (is_year()) : ?>
                    Archivi annuali per <span><?php echo get_the_date('Y'); ?></span>
                <?php elseif (is_category()) : ?>
                    <?php single_cat_title('Currently browsing '); ?>
                <?php elseif (is_tag()) : ?>
                    <?php single_tag_title('Currently browsing '); ?>
                <?php else : ?>
                    Archives
                <?php endif; ?>
            </h1>
        </header>
    
        <?php
            while (have_posts()) : the_post();

            get_template_part('content', get_post_format());

            comments_template('', true);

            endwhile;
        ?>
        
    </section>  <!-- #main-container ends -->

<?php get_sidebar(); ?>
    
</div>

<?php get_footer(); ?>
