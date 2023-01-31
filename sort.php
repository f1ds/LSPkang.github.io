  <div class="sort">
        <span class="sortTitle">软件分类</span>

        <?php
 
$defaults = array(
	'theme_location'  => '',
	'menu'            => '',
	'container'       => 'div',
	'container_class' => 'sortDetail',
	'container_id'    => '',
	'menu_class'      => 'nav ',
	'menu_id'         => 'nav',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
	'walker'          => ''
);
 
wp_nav_menu( $defaults );
 
?>


     
        <p>和我们合作！</p>
        <a class="upload_soft" href="/" target="_blank"></a>
    </div>