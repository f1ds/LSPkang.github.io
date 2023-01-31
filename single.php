    <?php get_header(); ?>


<div class="container">
   <?php include('sort.php'); ?>

<!--detail main-->
    <div class="main detail_main">
        <div id="mainContent">
            
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="softHolder">

                <p class="bread"><a href="/">首页</a> &gt; <?php the_category(', ') ?></p>
                <div class="softAbs">
                    <div class="soft_img">
                        <img src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>" style="visibility: visible; display: inline-block; width: 257px; height: 204px; ">
                    </div>
                    <div class="info">
                        <p class="title"><?php the_title(); ?></p>
                        <!--p class="download_count"></p-->
                        <p>
                            <span class="lInfo">大小：<?php the_field('MB');?>M</span>
                                                    </p>
                        <p>
                            <span class="mInfo">更新日期：<?php the_time('y-m-d'); ?></span>
                        </p>
                        
                        <p class="certify">
                                                                                                                    <span class="kb" title="卡巴斯基"></span>
                                                                                                                                                                                <span class="sd" title="百度杀毒"></span>
                                                                                    
                                                已安全认证
                                                
                        </p>
                    </div>
                                       
                 	
                                        <a class="normal_download"  href="<?php the_field('downurl');?>" rel="nofollow"></a>
                </div>

                <div>
                    <p class="infoTitle">软件简介</p>
                    <?php the_content(); ?>
				</div>
               
                <div>
				<?php comments_template( '', true ); ?>
				</div>

                <dl class="softSet" id="softSet">
                    <dt><p class="infoTitle">您可能感兴趣的分类热门</p></dt>
                    <dd>
                        <ul>

                         <?php query_posts( $query_string . '&orderby=date&showposts=5&ignore_sticky_posts=1' );while(have_posts()) : the_post(); ?>

                              <li>
                                <a href="<?php the_permalink() ?>"  title="<?php the_title(); ?>"><img src="<?php the_field('icoimg');?>" alt="<?php the_title(); ?>" style="display: inline-block; "></a>
                            
                            </li>

<?php endwhile;wp_reset_query() ?>
                                                                                                                                                                                                                                                 </ul>
                    </dd>
                   
                </dl>
            </div>
			<?php endwhile; endif;?>
            <!--softHolder-->

           <?php get_sidebar(); ?>
            <!-- sidebar end-->    

        </div>
        <!--mainContent-->
    </div>
    <!--main-->
</div>
<!--container-->
    <a class="goto" href="#topBar" title="回到顶部" style="bottom: 104px; display: none; "></a>
   
<!--footer-->
   <?php get_footer(); ?>