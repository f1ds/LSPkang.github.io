 
   <?php get_header(); ?>
<div class="container">
   <?php include('sort.php'); ?>

<!--list main-->
    <div class="main list_main">
        <div id="mainContent">
            
            <div class="softHolder">

                <p class="softKind"><?php	printf( __( '为您找到: %s', '' ), '<span>相关“' . get_search_query() . '”的信息</span>' ); ?></p>

                
                <ul class="softList" id="softList">

				        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <li class="noBorder">
                        <div class="wrap">
                            <a href="<?php the_permalink(); ?>"><img src="<?php bloginfo('template_url'); ?>/images/1514c44de8919f3a814f043e463ab4ff.png" alt="<?php the_title(); ?>" style="display: inline-block; "></a>
                            <div class="softInfo">
                                <p class="title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <span class="star" number="8.1"><span class="fullStar" style="width: 59px; "></span><span class="emptyStar"></span></span>
                                </p>
                                <p class="desc" title="<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 250,"..."); ?>">
                                   <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 250,"..."); ?></p>
                                <p class="info">
                                    大小：<font class="infoVal">55.8M</font>&nbsp;&nbsp;更新日期：<font class="infoVal"><?php zine_time_diff( $time_type = 'post' ); ?></font>
                                </p>   
                            </div>
                            <div class="download">
                                <a down="1" sid="12350" href="http://dlsw.baidu.com/sw-search-sp/soft/3a/12350/QQ5.2.10446.0.1395882319.exe"></a>
                            </div>
                        </div>
                    </li>
                    	<?php endwhile; ?>
	<?php else : ?>
	<p>可是！好像什么文章都没有!~</p>
	<div class="b2"></div>
	<?php endif; ?>


                                    </ul>

                <div class="page">
				<?php pagenavi(5); ?>
				</div>
            </div>

           <?php get_sidebar(); ?>
            <!-- sidebar end-->
        </div>

    </div>
</div>
<!--container end-->
    <!--goto top-->
    <a class="goto" href="#topBar" title="回到顶部"></a>
   
<!--footer-->
   <?php get_footer(); ?>