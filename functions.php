<?php


add_theme_support( 'post-thumbnails' );
function dopt($e){
    return stripslashes(get_option($e));
}
// Time Ago by Fanr
	function time_ago( $type = 'commennt', $day = 30 ) {
		$d = $type == 'post' ? 'get_post_time' : 'get_comment_time';
		$timediff = time() - $d('U');
		if ($timediff <= 60*60*24*$day){
		echo  human_time_diff($d('U'), strtotime(current_time('mysql', 0))), '前';
		}
		if ($timediff > 60*60*24*$day){
		echo  date('Y/m/d',get_comment_date('U')), ' ', get_comment_time('H:i');
		};
	}	
		

//日志与评论的相对时间显示
function zine_time_diff( $time_type ) {
    switch( $time_type ){
        case 'comment':    //如果是评论的时间
            $time_diff = current_time('timestamp') - get_comment_time('U');
            if( $time_diff <= 86400 )    //24 小时之内
                echo human_time_diff(get_comment_time('U'), current_time('timestamp')).' 之前';    //显示格式 OOXX 之前
            else
                printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time());    //显示格式 X年X月X日 OOXX 时
            break;
        case 'post';    //如果是日志的时间
            $time_diff = current_time('timestamp') - get_the_time('U');
            if( $time_diff <= 86400 )
                echo human_time_diff(get_the_time('U'), current_time('timestamp')).'前';
            else
                the_time('Y-m-d H:i');
            break;
    }
}

//控制标题字数
function customTitle($limit) {
    $title = get_the_title($post->ID);
    if(strlen($title) > $limit) {
        $title = substr($title, 0, $limit);
    }
 
    echo $title;
}




//标签
function zine_tags() {
    $posttags = get_the_tags();
    if ($posttags){
    foreach($posttags as $tag)
    echo '<a class="tag-link tag-link-' . $tag->term_id . '" href="'.get_tag_link($tag).'">'. $tag->name .'</a>,';
    }
}

function dm_strimwidth($str ,$start , $width ,$trimmarker ){$output = preg_replace('/^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$start.'}((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$width.'}).*/s','\1',$str); return $output.$trimmarker;};
if ( function_exists('register_nav_menus') ) {
    register_nav_menus(array(
         'menu' => '头部菜单',
		
    ));
}
add_filter('show_admin_bar', '__return_false');


// post thumbnail support 缩略图支持
//添加特色缩略图支持
if ( function_exists('add_theme_support') )add_theme_support('post-thumbnails');
 
//输出缩略图地址 From wpdaxue.com
function post_thumbnail_src(){
    global $post;
	if( $values = get_post_custom_values("thumb") ) {	//输出自定义域图片地址
		$values = get_post_custom_values("thumb");
		$post_thumbnail_src = $values [0];
	} elseif( has_post_thumbnail() ){    //如果有特色缩略图，则输出缩略图地址
        $thumbnail_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
		$post_thumbnail_src = $thumbnail_src [0];
    } else {
		$post_thumbnail_src = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		$post_thumbnail_src = $matches [1] [0];   //获取该图片 src
		if(empty($post_thumbnail_src)){	//如果日志中没有图片，则显示随机图片
			$random = mt_rand(1, 10);
			echo get_bloginfo('template_url');
			echo '/img/no-thum.jpg';
			//如果日志中没有图片，则显示默认图片
			//echo '/images/default_thumb.jpg';
		}
	};
	echo $post_thumbnail_src;
}


function past_date() {
	global $post;
	$suffix = ' 前';
	$day = ' 天';
	$hour = ' 小时';
	$minute = ' 分钟';
	$second = ' 秒';
	$m = 60;
	$h = 3600;
	$d = 86400;
	$post_time = get_post_time('G', true, $post);
	$past_time = time() - $post_time;
	if ($past_time < $m) {
		$past_date = $past_time . $second;
	} else if ($past_time < $h) {
		$past_date = $past_time / $m;
		$past_date = floor($past_date);
		$past_date .= $minute;
	} else if ($past_time < $d) {
		$past_date = $past_time / $h;
		$past_date = floor($past_date);
		$past_date .= $hour;
	} else if ($past_time < $d * 30) {
		$past_date = $past_time / $d;
		$past_date = floor($past_date);
		$past_date .= $day;
	} else {
		the_time('d,m,Y');
		return;
	} 
	echo $past_date . $suffix;
	}
	add_filter('past_date', 'past_date');
add_theme_support( 'post-formats', array( 'status','aside','audio') );


// enable threaded comments
	function enable_threaded_comments(){
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
		}
	}
	add_action('get_header', 'enable_threaded_comments');	
	// removes detailed login error information for security 移除wordpress登陆漏洞
	add_filter('login_errors',create_function('$a', "return null;"));
		
	//禁用半角符号自动转换为全角
	remove_filter('the_content', 'wptexturize');
		
	// 只搜索文章，排除页面
	add_filter('pre_get_posts','search_filter');
	function search_filter($query) {
	if ($query->is_search) {$query->set('post_type', 'post');}
	return $query;}	
	
	
	
//访问计数
function record_visitors(){
	if (is_singular()) {global $post;
	 $post_ID = $post->ID;
	  if($post_ID) 
	  {
		  $post_views = (int)get_post_meta($post_ID, 'views', true);
		  if(!update_post_meta($post_ID, 'views', ($post_views+1))) 
		  {
			add_post_meta($post_ID, 'views', 1, true);
		  }
	  }
	}
}
add_action('wp_head', 'record_visitors');  

function post_views($before = '(点击 ', $after = ' 次)', $echo = 1)
{
  global $post;
  $post_ID = $post->ID;
  $views = (int)get_post_meta($post_ID, 'views', true);
  if ($echo) echo $before, number_format($views), $after;
  else return $views;
};

  //翻页导航
function pagenavi($range = 9){
	global $paged, $wp_query;
	if ( !$max_page ) {$max_page = $wp_query->max_num_pages;}
	if($max_page > 1){if(!$paged){$paged = 1;}
	if($paged != 1){echo "<a href='" . get_pagenum_link(1) . "' class='pageprev'><span></span></a>";}
	
    if($max_page > $range){
		if($paged < $range){for($i = 1; $i <= ($range + 1); $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='page-numbers'";echo ">$i</a>";}}
    elseif($paged >= ($max_page - ceil(($range/2)))){
		for($i = $max_page - $range; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
		if($i==$paged)echo " class='page-numbers'";echo ">$i</a>";}}
	elseif($paged >= $range && $paged < ($max_page - ceil(($range/2)))){
		for($i = ($paged - ceil($range/2)); $i <= ($paged + ceil(($range/2))); $i++){echo "<a href='" . get_pagenum_link($i) ."'";if($i==$paged) echo " class='page-numbers'";echo ">$i</a>";}}}
    else{for($i = 1; $i <= $max_page; $i++){echo "<a href='" . get_pagenum_link($i) ."'";
    if($i==$paged)echo " class='page-numbers'";echo ">$i</a>";}}
	
    if($paged != $max_page){echo "<a href='" . get_pagenum_link($max_page) . "' class='pagenext' title=''><span></span></a>";}
    }
}



//连接数量
$match_num_from = 1; //一个关键字少于多少不替换
$match_num_to = 5; //一个关键字最多替换
//连接到WordPress的模块
add_filter('the_content','tag_link',1);
//按长度排序
function tag_sort($a, $b){
if ( $a->name == $b->name ) return 0;
return ( strlen($a->name) > strlen($b->name) ) ? -1 : 1;
}
//改变标签关键字
function tag_link($content){
global $match_num_from,$match_num_to;
$posttags = get_the_tags();
if ($posttags) {
usort($posttags, "tag_sort");
foreach($posttags as $tag) {
$link = get_tag_link($tag->term_id);
$keyword = $tag->name;
//连接代码
$cleankeyword = stripslashes($keyword);
$url = "<a href=\"$link\" title=\"".str_replace('%s',addcslashes($cleankeyword, '$'),__('View all posts in %s'))."\"";
$url .= 'target="_blank"';
$url .= ">".addcslashes($cleankeyword, '$')."</a>";
$limit = rand($match_num_from,$match_num_to);
//不连接的代码
$content = preg_replace( '|(<a[^>]+>)(.*)('.$ex_word.')(.*)(</a[^>]*>)|U'.$case, '$1$2%&&&&&%$4$5', $content);
$content = preg_replace( '|(<img)(.*?)('.$ex_word.')(.*?)(>)|U'.$case, '$1$2%&&&&&%$4$5', $content);
$cleankeyword = preg_quote($cleankeyword,'\'');
$regEx = '\'(?!((<.*?)|(<a.*?)))('. $cleankeyword . ')(?!(([^<>]*?)>)|([^>]*?</a>))\'s' . $case;
$content = preg_replace($regEx,$url,$content,$limit);
$content = str_replace( '%&&&&&%', stripslashes($ex_word), $content);
}
}
return $content;
}



//移除头部多余信息
remove_action('wp_head','wp_generator');//禁止在head泄露wordpress版本号
remove_action('wp_head','rsd_link');//移除head中的rel="EditURI"
remove_action('wp_head','wlwmanifest_link');//移除head中的rel="wlwmanifest"
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );//rel=pre
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );//rel=shortlink 
remove_action('wp_head', 'rel_canonical' );


//阻止站内文章pingback
function ATheme_no_self_ping( &$links ) {
$home = get_option( 'home' );
foreach ( $links as $l => $link )
if ( 0 === strpos( $link, $home ) )
unset($links[$l]);
}
add_action( 'pre_ping', 'ATheme_no_self_ping' );

//wordpress文章里url生成超链接
add_filter('the_content', 'make_clickable');

//去除评论url超链接
remove_filter('comment_text', 'make_clickable', 9); 

//禁止自动保存和修改历史记录
add_action('wp_print_scripts', 'no_autosave');
remove_action('pre_post_update','wp_save_post_revision');
function no_autosave() {
  wp_deregister_script('autosave');
}



?>
