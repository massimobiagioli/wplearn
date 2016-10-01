<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h1 class="entry-title">
            <?php the_title(); ?>
        </h1>
    <?php if (is_single()) : ?>
        <p class="entry-meta">
            Postato il <time datetime="<?php echo get_the_date(); ?>"><?php the_time(); ?></time>
            by <?php the_author_link(); ?>
        <?php
            // I commenti sono aperti?
            if (comments_open()) : ?>
            &bull; <?php comments_popup_link('No comments', '1 comment', '% comments'); ?>
        <?php endif; 
            // Mostra le categorie e i tag sui post singoli
            if (is_singular('post')) :
        ?>
            <br />Filed in <?php the_category(', '); ?>
            <?php the_tags(' and tagged with ', ', ', ''); ?>
        </p>
    <?php
        endif;
    endif; ?>
    </header>
    <?php
        // Il contenuto
        the_content();
    ?>
</article>