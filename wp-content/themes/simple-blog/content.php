<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h2 class="entry-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
        <p class="entry-meta">
            Postato il <time datetime="<?php echo get_the_date(); ?>"><?php the_time(); ?></time>
            by <?php the_author_link(); ?>
        <?php
            // I commenti sono aperti?
            if (comments_open()) : ?>
            &bull; <?php comments_popup_link('No comments', '1 comment', '% comments'); ?>
        <?php endif; ?>
        </p>
    </header>
    <?php
        // Il contenuto
        the_content();
    ?>
</article>