<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name');?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php wp_head(); ?>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- modal content -->
            <div id="basic-modal-content">
                <div class="block_popup">
                    <h3>Перезвоните мне</h3>
                    <hr />
                    <?php insert_cform('2'); ?>
                </div>
            </div>
        <!-- end modal content -->

        <div class="wrapper">

            <header class="header">
                <div class="wrap-head">
                    <div class="logo">
                        <a href="/" title="Логотип сайта">
                            <img src="<?php bloginfo('template_url');?>/images/logo.png" height="130" width="430" alt="Логотип сайта">
                        </a>    
                    </div>
                    <div class="contact_head">
                        <div class="phone-img">
                            <img src="<?php bloginfo('template_url');?>/images/ico-tel.png" height="36" width="39">
                        </div>
                        <div class="phone-number">
                            <?php if(!dynamic_sidebar('phone_header')):?>
                            <?php endif;?>
                        </div>
                        <!-- <a class="home_head" href="/" title="Главная">Главная</a> -->
                        <div class="tel_head">
                            <a class="showpopup" href="#" title="Заказать звонок">Заказать звонок</a>    
                        </div>
                    </div>    
                </div>
                <nav class="main-menu">
                    <?php if(!dynamic_sidebar('menu_header')): ?>
                        <span class="widget-error">Тут должен быть виджет произвольного меню</span>
                    <?php endif; ?>
                </nav>
                <hr />
            </header><!-- .header-->