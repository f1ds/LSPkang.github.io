<title><?php if ( is_home() ) { ?><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?><?php } ?>
<?php if ( is_search() ) { ?>搜索结果 | <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_single() ) { ?><?php echo trim(wp_title('',0)); ?> | <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php echo trim(wp_title('',0)); ?> | <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_category() ) { ?><?php single_cat_title(); ?> | <?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?><?php the_time('F'); ?> | <?php bloginfo('name'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php  single_tag_title("", true); ?> | <?php bloginfo('name'); ?><?php } ?> <?php } ?></title>
<?php if (is_home() || is_front_page())
	{
	$description = '天天软件,绿色软件,绿色软件下载,好玩的软件下载';
	$keywords = '天天小软件：分享绿色软件下载 好玩又实用的小软件';
	}
	elseif (is_category())
	{
	$description = strip_tags(trim(category_description()));
	$keywords = single_cat_title('', false);
	}
	elseif (is_tag())
	{
	$description = sprintf( __( '与标签 %s 相关联的文章列表'), single_tag_title('', false));
    $keywords = single_tag_title('', false);
	}
	elseif (is_single())
	{
     if ($post->post_excerpt) {$description = $post->post_excerpt;} 
	 else {$description = mb_strimwidth(strip_tags($post->post_content),0,110,"");}
    $keywords = "";
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {$keywords = $keywords . $tag->name . ", ";}
	}
	elseif (is_page())
	{
	$keywords = get_post_meta($post->ID, "keywords", true);
	$description = get_post_meta($post->ID, "description", true);
	}
	?>

<meta name="keywords" content="<?php echo $keywords ?>" />
<meta name="description" content="<?php echo $description?>" />