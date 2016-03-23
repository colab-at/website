<?php 
$pages = getPages('Colab');

if ( !empty($pages) ) :
?>

<nav class="main-nav" role="navigation">

    <div class="log-in">
    <?php if ( is_user_logged_in() ) : ?>
        <a class="button small transparent log-out" href="<?php echo wp_logout_url( home_url() ); ?>" rel="nofollow">Log out</a>
    <?php else : ?>
        <a class="button small transparent log-in" href="<?php echo wp_login_url( htmlspecialchars($_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ) ); ?>" rel="nofollow">Log in</a>
    <?php endif; ?>
    </div>
    
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

</nav>

<?php endif; ?>