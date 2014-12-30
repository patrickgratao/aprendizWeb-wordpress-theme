<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title><?php  { wp_title( ' - ', true, 'right');  bloginfo('name'); echo " - "; bloginfo('description');  }  ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/icons.css">
    <!--  Bootstrap -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js">

    <!-- CSS do Tema Aprendiz Web-->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" >
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="http://fonts.googleapis.com/css?family=Fjalla+One|Cantarell:400,400italic,700italic,700" rel="stylesheet" type="text/css" />
    <!-- Biblioteca Jquery -->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
</head>

<body>
    <div id="topo">
        <header id="logomarca">
            <div class="content">
                <h1 id="site_title">
                    <!-- Catinho do Logotipo -->
                    <a href="/">
                        <img src="<?php bloginfo('template_directory'); ?>/img/logotipo-modelo.jpg" alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
                    </a>
                    <!--  Cantinho da Publicidade-->
                    <a href="/" class="pull-right">
                        <img src="<?php bloginfo('template_directory'); ?>/img/publicidade-modelo.jpg" alt="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>" title="<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>">
                    </a>

                </h1>
            </div>

         <nav role="navigation" id="menu_principal">
            <?php wp_nav_menu( $args ); ?>
        </nav>

        <!-- Inserindo Breadcrumbs -->
        <section id="crumbs">
                    <?php if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        } ?>
</section>
        </header>
    </div>

