<?php get_header(); ?>

<div id="main-container">

    <section id="content-container">
    
    <?php
        // Se è il risultato di una ricerca
        if (is_search()) :
    ?>
        <header class="page-header">
            <h1 class="page-title">
                Avete cercato<br />
                <span><?php the_search_query(); ?></span>
            </h1>
        </header>
    <?php endif; ?>
        
    <?php
        // Avvia il loop
        if (have_posts()) : while (have_posts()) : the_post();
        // Mostra la data una volta per pagina
        the_date('', '<h3 class="the_date">', '</h3>');
        // Ottiene il tipo di contenuto corretto
        get_template_part('content', get_post_format());
        // Carica i commenti se ce n'è solo uno
        if (is_singular()) {
            comments_template('', true);
        }
        // Fine del loop
        endwhile;
        // Non c'è niente nel loop
        else:
    ?>
        <article id="post-0" class="post no-results not-found">
            <header>
                <h2 class="entry-title">Non è stato trovato niente</h2>
            </header>
            <p>Spiacenti, ma non abbiamo trovato niente per voi. 
                Provate con una nuova ricerca</p>
            <?php get_search_form(); ?>
        </article>
    <?php
        endif;
    ?>
        
    </section>  <!-- #content-container ends -->

<?php get_sidebar(); ?>
    
</div>

<?php get_footer(); ?>
