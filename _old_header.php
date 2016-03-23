<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Colab</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

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

        <style type="text/css">
            
//
header.main-header {

    @include clearfix;
    height: $header-height;
    position: relative;
    z-index: $z-high;
    //background-color: $blue;
    width: 100%;

    h1.logo {
        float: left;

        a {
            display: block;
            width: $col;
            line-height: $col;

            img {
                width: inherit;
                vertical-align: middle;
            }
        }
    }

    button.open-menu {
        float: right;
        margin: 3.4rem $padding-normal;
    }

}//.main-header


// Main navigation
button.open-menu {
    background-color: $blue;

    svg {
        fill: $white;
        width: 2.5em;
        height: 2.5em;
    } 

    &:hover {
        background-color: $blue-dark;

        svg {
            fill: $white;
        } 
    }
}

nav.main-nav {

    a.logo {
        display: block;
        float: left;
        width: $col;
        line-height: $col;

        img {
            width: inherit;
            vertical-align: middle;
        }
    }


    ol.menu {
        float: left;
        clear: both;
        border-top: $blue 0.5rem solid;
        padding-top: 1rem;
        width: $col;

        li {
            margin-bottom: 1em;

            a {
                opacity: 0.7;
                font-size: $font-big;
                text-decoration: none;
                color: $blue;

                &:hover, &:active, &.active {
                    opacity: 1;
                }

                &.active {
                    font-weight: $medium;
                }   
            }
        }
    }

    div.menu-box {
        float: right;
        margin: 3.4rem $padding-normal;
    }

    a.log-in,
    a.log-out {
        float: left;
        margin: 0.6rem 1rem;
    }

    button.open-menu {
        float: left;
    }
}


        </style>

        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <header class="main-header wrap">

            <div class="wrap">

                <h1 class="logo">
                    <a href="<?php bloginfo('url'); ?>">
                        <img class="svg" src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="Colab" > 
                    </a>
                </h1>

                <button class="open-menu round"><svg class="icon-menu"><use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons.svg#icon-menu"></use></svg></button>

            </div>
            
        </header>

        <?php get_template_part( 'main', 'nav' ); ?>