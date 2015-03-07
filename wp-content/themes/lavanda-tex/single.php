<?php get_header(); ?>

    <div class="middle">

        <div class="container">
            <main class="content no-sidebar">
                <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
                    <div class="wrap-polntx">
                        <h1><?php the_title(); ?></h1>
                        <hr />
                        <div class="wysiwyg">
                            <?php the_content(); ?>
                        </div><!-- .wysiwyg -->
                    </div><!-- .wrap-polntx -->
                <?php endwhile; ?>
                <?php endif; ?>
            </main><!-- .content -->
        </div><!-- .container-->

        <?php get_sidebar('left'); ?>

    </div><!-- .middle-->

</div><!-- .wrapper -->

<?php get_footer(); ?>