<aside id="sidebar-container">
    <ul id="sidebar">
    <?php
        // Se la sidebar è vuota, si genera il contenuto statico
        if (!sidebar-dinamica('colonna-destra')) : ?>
        <li>Aggiungete dei widget alla <em>colonna destra</em> con l'area del widget!</li>
    <?php endif; ?>
    </ul>
</aside>    <!-- #sidebar-container ends -->
