<footer>
        <div class="container">
            <div class="logo">
                <?php 
                    if(has_custom_logo()){
                        the_custom_logo();
                    };
                    if(is_active_sidebar('footer-widget-1')){
                        dynamic_sidebar('footer-widget-1');
                    }; 
                ?>
            
            </div>
        </div>
    </footer>
</body>
</html>