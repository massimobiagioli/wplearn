        <footer id="footer-container">
            <nav>
            <?php
                // Menu di navigazione inferiore
                wp_nav_menu(array(
                   'theme_location' => 'bottom_navigation' 
                ));
            ?>
            </nav>
            <p>
                Copyright &copy; <?php echo date('Y'); ?>
                <a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </p>
        </footer>   <!-- #footer-container ends -->

        </div>  <!-- #inner-wrap ends -->
    </div>  <!-- #outer-wrap ends -->

<?php
    // Wrap up di Wordpress appena prima del tag di chiusura body
    wp_footer();
?>
</body>
</html>
