<?php get_header(); ?>

    <div class="middle">

        <div class="container">
            <main class="content no-sidebar">
                <h1><?php wp_title('')?></h1>
                <hr />
                <?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

                <div class="articles">
                                
                    <div class="articles-gen-img">
                        <a href="<?php the_permalink(); ?>">
                        <?php if(has_post_thumbnail()): ?>
                            <?php the_post_thumbnail(); ?>
                        <?php else: ?>
                            <img src="<?php bloginfo('template_url'); ?>/images/no_img.jpg" alt="" />
                        <?php endif; ?>
                        </a>
                    </div>
                    <div class="article-wrap">
                        <div class="article_zag">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </div>
                        <?php the_excerpt(); ?>
                        <p>
                            <a href="<?php the_permalink(); ?>">Читать далее...</a>
                        </p>    
                    </div>
                </div>
                <hr />

                <?php endwhile; ?>
                <?php endif; ?>
            </main><!-- .content -->
        </div><!-- .container-->

        <?php get_sidebar('left'); ?>

    </div><!-- .middle-->

</div><!-- .wrapper -->

<?php get_footer(); ?>