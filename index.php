 
    <?php get_header(); ?>

<div class="container">
    <?php include('sort.php'); ?>
<!--index main-->
    <div class="main index_main">
        <div class="banner" id="banner">
                        
                        
                        
            <span class="dot dot1">
			<span class="default"></span>
			<span class="active"></span>
			<span class="default"></span></span>
            <span class="lChange change" style=""></span>
            <span class="rChange change" style=""></span>
            <a class="pos2" href=""><img src="http://tt.newsky365.com/wp-content/uploads/2014/04/1394783052.jpg"  alt="百度杀毒" style="display: inline-block; "></a>
			<a class="pos3" href=""><img src="http://tt.newsky365.com/wp-content/uploads/2014/04/1394783052.jpg"  alt="百度壁纸" style="display: inline-block; "></a>
			<a class="pos1" href=""><img src="http://tt.newsky365.com/wp-content/uploads/2014/04/1394783052.jpg" alt="百度卫士" style="display: inline-block; "></a>
			</div>
        <div id="mainContent">
    
            <div class="index_softHolder">
                <dl class="softSet" id="softSet1">
                    <dt><p class="topic">最新更新</p><p class="line1"></p></dt>
                    <dd>
                                <ul>

                
                 <?php query_posts( $query_string . '&orderby=date&showposts=18&ignore_sticky_posts=1' );while(have_posts()) : the_post(); ?>

                                <li>
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php the_field('icoimg');?>" alt="<?php the_title(); ?>" style="display: inline-block; "></a>
                                <a class="word" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_field('xiaobt');?></a>
                                <a href="<?php the_permalink() ?>"  class="download" title="<?php the_field('xiaobt');?>" style="visibility: hidden; "></a>
                                </li>

<?php endwhile;wp_reset_query() ?>


                                </ul>
                    </dd>
                   
                </dl>

                <dl class="softSet" id="softSet2">
                    <dt><p class="topic">你可能感兴趣</p><p class="line2"></p></dt>
                    <dd>
                        <ul>
                        
		 <?php query_posts( $query_string . '&orderby=rand&showposts=18&ignore_sticky_posts=1' );while(have_posts()) : the_post(); ?>

                                <li>
                                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><img src="<?php the_field('icoimg');?>" alt="<?php the_title(); ?>" style="display: inline-block; "></a>
                                <a class="word" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_field('xiaobt');?></a>
                                <a href="<?php the_permalink() ?>"  class="download" title="<?php the_field('xiaobt');?>" style="visibility: hidden; "></a>
                                </li>

<?php endwhile;wp_reset_query() ?>
                    </dd>
                   
                </dl>
                
                
            </div>

            <?php get_sidebar(); ?>

           
            <!--sideBar end-->
        </div>
        <!--mainContent-->
    </div>
</div>
    <!--goto top-->
    <a class="goto" href="#topBar" title="回到顶部" style="bottom: 104px;"></a>
    
<?php get_footer(); ?>