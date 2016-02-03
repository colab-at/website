<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Colab</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300,400italic">
    <?php if ( is_front_page() ) : ?>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/frontpage.css">
    <?php else : ?>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/page.css">
    <?php endif; ?>
        

        <?php wp_head(); ?>

    </head>
    <body <?php body_class( $class ); ?> >

        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <header class="main-header wrap" role="banner">

            <h1 class="logo">
                <a href="<?php bloginfo('url'); ?>">
                    <img class="svg" src="<?php bloginfo('stylesheet_directory'); ?>/img/logo.svg" alt="Colab" > 
                </a>
            </h1>
            
        </header>
