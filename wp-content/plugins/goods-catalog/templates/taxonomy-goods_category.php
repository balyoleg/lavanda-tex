<?php
/*
 * Template: Category page
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
        <?php
        global $posts;
        if (have_posts()) { // fix 'undefined offset 0'
            $post = $posts[0];
        }
        ob_start();

        echo '<h1>' . single_cat_title('', false) . '</h1>';
        if (isset($catalog_option['show_category_descr_page'])) {
            echo '<p>' . category_description() . '</p>';
        }

        // show sub-categories only in first page, if paged
        if (!is_paged()) {

            // show sub-categories list
            $current_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            
            $args = array(
                'parent' => $current_term->term_id,
                'taxonomy' => $current_term->taxonomy,
                'hide_empty' => 0,
                'hierarchical' => true,
                'depth' => 0,
            );

            $category_list = get_categories($args);
            // include
            include 'content-goods_category.php';

            echo "<hr>";
        }
        load_template(dirname(__FILE__) . '/loop-grid.php');
        ?>
        <div class="navigation">
            <?php
            // Display navigation to next/previous pages when applicable
            if (function_exists('goods_pagination'))
                goods_pagination();
            else
                posts_nav_link();
            ?>
        </div>
<?php
echo '</main>'; // content no-sidebar
echo '</div>'; // container
load_template(dirname(__FILE__) . '/sidebar-goods.php');
echo '</div>'; // middle
echo '</div>';
get_footer();
