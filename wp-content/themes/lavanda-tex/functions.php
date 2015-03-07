<?php
/**
* Загружаемые скрипты и стили
*/
function load_style_script() {
	// wp_deregister_script('jquery'); // отключаем только jquery без jquery-migrate
	// wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', array(), null, true ); // регистрируем крайнюю версию из гугла
	// add_filter( 'script_loader_src', 'jquery_local_loader', 10, 2 );  // вешаем на загрузку скрипта альтернативный jquery
	// wp_enqueue_script( 'jquery' );
	//wp_enqueue_script('jquery-1.11.2.min.js', get_template_directory_uri().'/js/jquery-1.11.2.min.js');
	wp_enqueue_script('modernizr-2.8.3.min.js', get_template_directory_uri().'/js/vendor/modernizr-2.8.3.min.js');
	wp_enqueue_script('plugins.js', get_template_directory_uri().'/js/plugins.js');
	wp_enqueue_script('main.js', get_template_directory_uri().'/js/main.js');

	wp_enqueue_style('normalize.min.css', get_template_directory_uri().'/css/normalize.min.css');
	wp_enqueue_style('jquery.bxslider.css', get_template_directory_uri().'/css/jquery.bxslider.css');
	wp_enqueue_style('style', get_template_directory_uri().'/style.css');
}
/**
* Загружаем скрипты и стили
*/
add_action('wp_enqueue_scripts', 'load_style_script');
/**
*проверяем загрузилась библиотека и если нет грузим локальную из вордпресс
*/
add_action( 'wp_head', 'jquery_local_loader' );
	
function jquery_local_loader( $src, $handle = null ) {
	static $add_jquery_fallback = false;
		
	if( $add_jquery_fallback ) {
		echo '<script>window.jQuery || document.write(\'<script src="' . includes_url() . 'js/jquery/jquery.js"><\/script>\')</script>' . "\n";
		$add_jquery_fallback = false;
	}
		
	if( $handle === 'jquery-core' ) {
		$add_jquery_fallback = true;
	}
		
	return $src;
}
/**
* Поддержка миниатюр
*/
add_theme_support('post-thumbnails');
set_post_thumbnail_size(180, 180);

add_action( 'after_setup_theme', 'baw_theme_setup' );
function baw_theme_setup() {
	//add_image_size( 'category-thumb', 300 ); // 300 pixels wide (and unlimited height)
	add_image_size( 'goods-polntx', 703, 248, array('left', 'top') ); // (cropped)
}
/**
* Поддержка виджетов
*/
register_sidebar(array('name' => 'Телефон в шапке', 
					   'id' => 'phone_header', 
					   'class' => 'phone-header', 
					   'before_widget' => '',
					   'after_widget'  => ''
					));
register_sidebar(array('name' => 'Меню', 
					   'id' => 'menu_header', 
					   'class' => 'main-menu', 
					   'before_widget' => '',
					   'after_widget'  => ''
					));
register_sidebar(array('name' => 'Левый сайдбар', 
					   'id' => 'left_sidebar', 
					   'before_widget' => '<div class="widget">',
					   'after_widget'  => '</div>', 
					   'before_title' => '<h3><i></i>', 
					   'after_title' => '</h3>'
					));
register_sidebar(array('name' => 'Правый сайдбар', 
					   'id' => 'right_sidebar', 
					   'before_widget' => '<div class="widget">',
					   'after_widget'  => '</div>', 
					   'before_title' => '<h3><i></i>', 
					   'after_title' => '</h3>'
					));
register_sidebar(array('name' => 'Копирайты Футор', 
					   'id' => 'copy_footer', 
					   'before_widget' => '',
					   'after_widget'  => ''
					));
register_sidebar(array('name' => 'Меню Футор', 
					   'id' => 'menu_footer', 
					   'class' => 'foot-menu', 
					   'before_widget' => '',
					   'after_widget'  => ''
					));
/**
* слайдер
*/
function slider_posts() {
	$labels = array(
		'name' => 'Слайд', // Основное название типа записи
		'singular_name' => 'Слайд', // отдельное название записи типа Book
		'add_new' => 'Добавить новый',
		'add_new_item' => 'Добавить новый слайд',
		'edit_item' => 'Редактировать слайд',
		'new_item' => 'Новый слайд',
		'view_item' => 'Посмотреть слайд',
		'search_items' => 'Найти слайд',
		'not_found' =>  'Слайды не найдены',
		'not_found_in_trash' => 'В корзине слайдов не найдено',
		'parent_item_colon' => '',
		'menu_name' => 'Слайдер'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'thumbnail')
	);
	register_post_type('slider',$args);
}
add_action('init', 'slider_posts');
/**
* блок конкурентных преимуществ компании
*/
function block_posts() {
	$labels = array(
		'name' => 'Преимущества компании', // Основное название типа записи
		'singular_name' => 'Преимущество компании', // отдельное название записи типа Book
		'add_new' => 'Добавить новое',
		'add_new_item' => 'Добавить новое преимущество компании',
		'edit_item' => 'Редактировать преимущество компании',
		'new_item' => 'Новое преимущество компании',
		'view_item' => 'Посмотреть преимущество компании',
		'search_items' => 'Найти преимущество компании',
		'not_found' =>  'Преимущество компании не найдены',
		'not_found_in_trash' => 'В корзине преимуществ компании не найдено',
		'parent_item_colon' => '',
		'menu_name' => 'Преимущества компании'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor')
	);
	register_post_type('block', $args);
}
add_action('init', 'block_posts');
/**
* текст на главной
*/
function main_page_text() {
	$labels = array(
		'name' => 'Текст на главной', // Основное название типа записи
		'singular_name' => 'Текст на главной', // отдельное название записи типа Book
		'add_new' => 'Добавить новое',
		'add_new_item' => 'Добавить текст на главной',
		'edit_item' => 'Редактировать текст на главной',
		'new_item' => 'Новый текст на главной',
		'view_item' => 'Посмотреть текст на главной',
		'search_items' => 'Найти текст на главной',
		'not_found' =>  'Тексты на главной не найдены',
		'not_found_in_trash' => 'В корзине тексты на главной не найдены',
		'parent_item_colon' => '',
		'menu_name' => 'Главная страница'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title', 'editor')
	);
	register_post_type('main_text', $args);
}
add_action('init', 'main_page_text');
/**
* Шорткод
*/
add_shortcode( 'contact', 'contact_form' );

function contact_form() {
    ob_start();

    include 'include/contact-form.php';
    $out = ob_get_contents();

    ob_end_clean();

    return $out;
};

add_shortcode( 'button_order', 'button_order' );

function button_order() {
    ob_start();

    include 'include/button_order.php';
    $out = ob_get_contents();

    ob_end_clean();

    return $out;
};
/**
* Добавление кнопки вызова шорткодов в редактор
*/
add_action('media_buttons','add_sc_select',11);
function add_sc_select(){
    global $shortcode_tags;
     /* ------------------------------------- */
     /* enter names of shortcode to exclude bellow */
     /* ------------------------------------- */
    $exclude = array("wp_caption", "embed");
    echo '&nbsp;<select id="sc_select"><option>Shortcode</option>';
    foreach ($shortcode_tags as $key => $val){
        if(!in_array($key,$exclude)){
            $shortcodes_list .= '<option value="['.$key.'][/'.$key.']">'.$key.'</option>';
            }
        }
     echo $shortcodes_list;
     echo '</select>';
}
add_action('admin_head', 'button_js');
function button_js() {
    echo '<script type="text/javascript">
    jQuery(document).ready(function(){
       jQuery("#sc_select").change(function() {
              send_to_editor(jQuery("#sc_select :selected").val());
                  return false;
        });
    });
    </script>';
}