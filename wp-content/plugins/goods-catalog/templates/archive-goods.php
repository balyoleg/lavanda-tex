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
 // categiries list with images
$category_id = get_query_var('cat');
$args = array(
                'type' => 'goods',
                'taxonomy' => 'goods_category',
                'hide_empty' => 1,
                'parent' => 0,
                'orderby' => 'ID',
                'child_of' => 0
            );
$category_list = get_categories($args, $category_id);
//load_template(dirname(__FILE__) . '/loop-grid.php');
include 'content-goods_category.php';

echo '</div>'; // catalog-inner
echo '</div>'; // goods-catalog

//echo '<div class="clear"></div>'; // fix for some themes
load_template ( dirname( __FILE__ ) . '/sidebar-goods.php' ) ;
echo '</div>'; // middle
echo '</div>';
get_footer();
