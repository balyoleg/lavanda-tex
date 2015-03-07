        <footer class="footer">
            <div class="copy">
                <?php if(!dynamic_sidebar('copy_footer')): ?>
                    <span class="widget-error">Тут должен быть виджет произвольного текста</span>
                <?php endif; ?>
            </div>
            <nav class="foot-menu">
                <?php if(!dynamic_sidebar('menu_footer')): ?>
                    <span class="widget-error">Тут должен быть виджет произвольного меню</span>
                <?php endif; ?>
            </nav>
        </footer><!-- .footer -->

        <?php wp_footer(); ?>

    </body>
</html>