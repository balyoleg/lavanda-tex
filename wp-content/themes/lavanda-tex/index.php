<?php get_header(); ?>

    <div class="middle">

        <div class="container">
            <main class="content no-sidebar ">
                <div class="wrap-slider">
                    <?php $slider = new WP_Query( array('post_type' => 'slider', 'order' => 'ASC') ); ?>
                    <?php if($slider->have_posts()) : ?>
                        <ul class="bxslider">
                            <?php if($slider->have_posts()) : while ($slider->have_posts()) : $slider->the_post(); ?>
                                <li><?php the_post_thumbnail('full'); ?></li>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="frame-slider"></div>                
                <div class="wrap-left">
                    <h1>«Почему выгодно работать с нами»</h1>
                    <hr />
                    <?php $block = new WP_Query( array('post_type' => 'block', 'order' => 'ASC') ); ?>
                    <?php if($block->have_posts()) : ?>
                        <?php if($block->have_posts()) : while ($block->have_posts()) : $block->the_post(); ?>
                            <div class="wrap-text">
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    <? else: ?>
                        <?php $main_text = new WP_Query( array('post_type' => 'main_text', 'order' => 'ASC') ); ?>
                        <?php if($main_text->have_posts()) : ?>
                            <?php if($main_text->have_posts()) : while ($main_text->have_posts()) : $main_text->the_post(); ?>
                                <div class="wysiwyg">
                                    <?php the_content(); ?>
                                </div>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="wrap-right">
                    <?php $name = 8; //'Для стартовой';
                    $posts_about = new WP_Query(array('cat' => $name, 'posts_per_page' => 3));
                    if($posts_about->have_posts()): ?>
                        <h3><i></i>Новости</h3>
                        <div class="news_side">
                            <?php while($posts_about->have_posts()):$posts_about->the_post(); ?>
                                <div class="news-wrap">
                                    <a href="<?php the_permalink(); ?>">
                                            <?php if(has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail(array(100, 100)); ?>
                                             <?php else: ?>
                                                <img src="<?php bloginfo('template_url'); ?>/images/no_img.jpg" width="100" height="100" alt="" />
                                            <?php endif; ?>
                                    </a>
                                    <span><?php the_time('j F Y') ?></span>
                                    <a class="news_title_main" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            <?php endwhile; ?>
                            <a href="<?php bloginfo('url'); ?>/category/news/">Все новости</a>
                        </div><!-- .news_side -->
                    <?php endif;?>
                </div>
            </main><!-- .content -->
        </div><!-- .container-->

        <?php get_sidebar('left'); ?>

    </div><!-- .middle-->

</div><!-- .wrapper -->

<?php get_footer(); ?>
