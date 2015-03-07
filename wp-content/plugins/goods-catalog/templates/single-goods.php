<?php
/*
 * Template: Single product page
 */

get_header();
echo '<div class="middle">';
echo '<div class="container">';
echo '<main class="content no-sidebar">';
if (have_posts()) {
    while (have_posts()) {
        the_post();
        // Display navigation next/previous
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
        <div class="wrap-polntx">
            <?php
            if (has_post_thumbnail()) {
                echo '<div class="wrap-img">';
                    $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                    echo '<a href="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" >';
                        the_post_thumbnail('goods-polntx', array('class' => 'goods-single-thumb'));
                    echo '</a>';
                echo '</div>';
                echo '<div class="frame-goods"></div>';
            } 
            ?>
                <h1><?php the_title(); ?></h1>
                <hr/>
                <?php
                // show product
                echo show_the_product_price();
                
                if (isset($catalog_option['show_product_sku_page'])) {
                    show_the_product_sku();
                }
                if (isset($catalog_option['show_product_descr_page'])) {
                    show_the_product_desrc();
                }

                // show category
                //echo get_the_term_list ($post->ID, 'goods_category', '<p>' . __("Categories", "gcat") . ':&nbsp;', ', ', '</p>');

                // show tags
                //echo get_the_term_list ($post->ID, 'goods_tag', '<p>' . __("Tags", "gcat") . ':&nbsp;', ', ', '</p>');
                ?>
            <div class="wysiwyg">
                <?php the_content(); ?>
            </div>
            
            
            <div class="goods-order-wrap">
                <?php insert_cform('3'); ?>
            </div>
        </div>
        <?php
    }

    // Display navigation to next/previous
    ?>
    <div class="navigation"><?php posts_nav_link(); ?></div>
    <?php
    //echo '</div>';
} else {
    get_404_template();
}
echo '</div>';
//echo '<div class="clear"></div>'; // fix for some themes
load_template(dirname(__FILE__) . '/sidebar-goods.php');
echo '</div>'; // middle
echo '</div>'; // wrapper
get_footer();
