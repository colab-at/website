<?php 
$pages = getPages('Colab');

if ( !empty($pages) ) :
?>

<nav class="main-nav" role="navigation">
    <div class="wrap">

        <button class="open-menu round"><svg class="icon-menu"><use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons.svg#icon-menu"></use></svg></button>

        <a class="logo" href="<?php bloginfo('url'); ?>">
            <img class="svg" src="<?php echo get_template_directory_uri() ?>/img/logo_blue.svg" alt="Colab" > 
        </a>                
        
        <ol class="menu">
            <?php 
            foreach ( $pages as $page ) : 
                $page_title = $page['title'];
                $page_name = $page['name'];
                $page_url = $page['url'];
                
                if ( is_page( $page_title ) ) :
                    $a_active = true;
                endif;
            ?>
        
            <li>
                <a <?php echo checkActive($a_active); $a_active = false; ?> href="<?php echo $page_url; ?>"><?php echo $page_title; ?></a>
            </li> 

            <?php endforeach; ?>

            <li>
                <a href="https://blog.colab.at/latest/">Blog</a>
            </li> 
        </ol>

    </div>
</nav>

<?php endif; ?>