<div class="sideBar">
                <div class="rank" id="rank1">
                    <p class="topic">下载总排行</p>
                    <p class="line3"></p>
					<div class="tableWrap">
                    

                      
<?php $cmntCnw = 1; query_posts( $query_string . '&orderby=date&showposts=5&ignore_sticky_posts=1' );while(have_posts()) : the_post(); ?>
                                                       
                            <div class="rank_wrap" href="<?php the_permalink() ?>" title="<?php the_title(); ?>" style="height: 26px; ">
                                <div class="rank_wrap_inner" style="top: 0px; ">
                                    <div class="default">
                                        <div class="rankNum"><span class="flag<?php echo($cmntCnw++); ?>"></span></div>
                                        <div class="rankName"><?php the_field('xiaobt');?></div>
                                    </div>
                                    <div class="add_hover">
                                        <img src="<?php the_field('icoimg');?>" style="display: inline-block; ">
  
                                        <div>
                                            <p class="title"><?php the_field('xiaobt');?></p>                                            
                                        </div>

                                        <a class="rank_download" href="<?php the_permalink() ?>"></a>
                                    </div>

                                </div>
                            </div>
                            
             <?php endwhile;wp_reset_query() ?>               
                           
                                                       
                          
                            
                           
                            					</div>
                </div>
                
            </div>