<?php

/*
 * Template: Main catalog page
 */

get_header();
echo '<div class="middle">';
echo '<div class="container">';
echo '<main class="content no-sidebar">';
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));

?>
	<div class="breadcrumbs">
        <ul>
        	<?php
                    if (!is_search() || !is_404()) {
                        global $post;
                        if ($post != null) {
                            gc_breadcrumbs($post->post_parent);
                        } else {
                            gc_breadcrumbs();
                        }
                    } else {
                        print ' ';
                    }
        	?>
        </ul>
	</div>
    <hr />
    <div class="catalog-wrap">

<?php
$category_id = get_query_var('cat');
$args = array(
                'type'                     => 'goods',
                'taxonomy'                 => 'goods_category',
                'hide_empty'               => 1,
                'parent'                   => 0,
                'orderby'                  => 'ID',
                'child_of'                 => 0,
                'hierarchical'             => 1,
            );
$cats = get_categories($args, $category_id); // Получаем список всех категорий
    foreach ($cats as $cat) {
        echo "<h3>".$cat->cat_name."</h3>"; // Получаем название одной категории
        echo "<ul class='uldotted'>";
            $post_goods = new WP_Query( array('goods_category' => $cat->category_nicename) ); ?>
            <?php if($post_goods->have_posts()) : ?>
                <div class="aaa">
                    <?php if($post_goods->have_posts()) : while ($post_goods->have_posts()) : $post_goods->the_post(); ?>
                        <a href="#"><?php the_title(); ?></a><br />
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            <?php endif;
            wp_reset_postdata();
        echo "</ul>";
    }
include 'content-goods_category.php';

echo '</div>'; // catalog-inner
echo '</div>'; // goods-catalog

load_template ( dirname( __FILE__ ) . '/sidebar-goods.php' ) ;
echo '</div>'; // middle
echo '</div>';
get_footer();
