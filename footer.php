<!--footer-->
    <div id="footer">
        <div>
        ©2014 Baidu | <a href="/" target="_blank">使用天天小软件必读</a> 

    <?php if (is_home() || is_front_page()) { ?> | <a href="http://www.newsky365.com/" target="_blank">by 天天分享</a> <?php } ?> <a href="http://www.v7v3.com/" target="_blank">wordpress主题</a>


        </div>
    </div>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/softSite.js"></script>
   
  

<script type="text/javascript">
$(document).ready(function(){
    //右侧排行下载文字效果
    hoverRanklist($(".rank"));

    //打分Star显示
    changeNumToStar();

    //返回顶部按钮的定位
    $( window).scroll(gotoTop);
    
    //显示下载
    showSoftSetDownload();
/*
    $(".rank").each(function(i, e){
        var elem = $(e).find("tr").eq(0);
        $('<tr class="ori_html" style="display:none">'+$(elem).html()+'</tr>').insertBefore(elem);
            $(elem).html($(elem).next(".hover").html()).addClass("add_hover");
    });
*/
    var imgWidth = 792,
        elems = $(".banner a"),
        clickElems = $(".banner .change"),
        dotElems = $(".dot span");
    
    handleImgAnimate(imgWidth, "index", elems, clickElems, dotElems);
});



</script>
</body></html>