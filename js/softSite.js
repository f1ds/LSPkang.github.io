
function hoverRanklist(rankElem){$(".rank_wrap").hover(function(){$(this).find(".rank_wrap_inner").css({"top":"-26px"});$(this).css({"height":"62px"});},function(){$(this).find(".rank_wrap_inner").css({"top":"0px"});$(this).css({"height":"26px"});});$(".rank_wrap").click(function(e){var href=$(this).attr("href"),statistics=$(this).attr("statistics")?$(this).attr("statistics"):"";if(statistics.length!=0){if(!$(e.target).hasClass("rank_download")){eval(statistics);}}
location.href=href;});}
function changeNumToStar(){$(".star").each(function(i,e){var value=parseInt($(e).attr("number")*10);var fullStar=parseInt(value/20);var emptyStar=value%20;var width=fullStar*14+Math.round(emptyStar*0.3)+3;$(e).find(".fullStar").css({"width":width+"px"})});}
function setMainHeight(lElem,rElem){var height=Math.max($(lElem).outerHeight(true),$(rElem).outerHeight(true));if(height<($(window).height()-134)){height=$(window).height()-134;}
if(!$(rElem).hasClass("detail_main")){height-=50;}
$(rElem).parent("div").css({"height":height+"px"});}
function gotoTop(){if($(document).scrollTop()==0){$(".goto").hide();return;}
if($.browser.version.indexOf("6.0")!=-1){var scrollTop=$(document).scrollTop()+$(window).height()-156;if(scrollTop<0){scrollTop=0;}
$(".goto").css({"top":scrollTop+"px"}).show();}else{$(".goto").css({"bottom":"104px"}).show();}}
function initPage(showNum,currP,totalP,baseURL){var pageArr=computePage(showNum,currP,totalP,baseURL);var fPage='<span>'+pageArr.splice(0,1)+'</span>',lPage='<span>'+pageArr.splice(pageArr.length-1,1)+'</span>',mPage='<span class="pageList">'+pageArr.join("")+'</span>';if(totalP==0){$(".page").html((mPage));}else if(totalP==1){$(".page").html("");}else{$(".page").html((fPage+mPage+lPage));}}
function computePage(showNum,currP,totalP,baseURL){var pageArr=new Array();if(totalP<=showNum){loopPage(1,totalP,currP,baseURL,pageArr);}else{var gap=(showNum-1)/2,lRealGap=currP-1,rRealGap=totalP-currP;if(lRealGap<=gap){loopPage(1,2+gap,currP,baseURL,pageArr);pageArr.push("...");pageArr.push('<a href="'+baseURL+totalP+'">'+totalP+'</a>');}else if(rRealGap<=gap){loopPage(totalP-gap-1,totalP,currP,baseURL,pageArr);pageArr.unshift("...");pageArr.unshift('<a href="'+baseURL+'1">1</a>');}else{pageArr.push('<a href="'+baseURL+'1">1</a>');pageArr.push('...');var tGap=(gap-1)/2;loopPage(currP-tGap,currP-tGap+gap-1,currP,baseURL,pageArr);pageArr.push('...');pageArr.push('<a href="'+baseURL+totalP+'">'+totalP+'</a>');}}
if(currP==1){pageArr.unshift('<a class="quiet" href="javascript:void(0)">上一页</a>');}else{pageArr.unshift('<a href="'+baseURL+(currP-1)+'">上一页</a>');}
if(currP==totalP){pageArr.push('<a class="quiet" href="javascript:void(0)">下一页</a>');}else{pageArr.push('<a href="'+baseURL+(currP+1)+'">下一页</a>');}
return pageArr;}
function loopPage(start,end,currP,baseURL,pageArr){for(var i=start;i<=end;i++){if(i==currP){pageArr.push('<a class="active" href="javascript:void(0)">'+i+'</a>');}else{pageArr.push('<a href="'+baseURL+i+'">'+i+'</a>');}}}
var movement,animateFlag=false;function displayImg(imgWidth,page,elems,clickElems,dotElems){if(page=="index"){movement=setInterval(autoMove(imgWidth,page,elems,dotElems),5000);}
$(clickElems).click(function(){if(animateFlag||$(this).hasClass("active")){return;}
var direct=(page=="index")?($(this).hasClass("rChange")?"left":"right"):($(this).hasClass("rChange")?"left":"right");if(page=="index"){clearInterval(movement);}
moveImg(direct,imgWidth,page,elems,dotElems);});}
function toWhichDirect(fromClassName,toElem){var fromElem=$(toElem).parent().find("."+fromClassName);if($(fromElem).prevAll().length>$(toElem).prevAll().length){return"right";}else{return"left";}}
function moveImg(direct,imgWidth,page,elems,dotElems){animateFlag=true;elems=(page=="index")?$(".banner a"):$(".imageFrame div div");var time=(page=="index")?1000:500;if(direct=="left"){sign="-=";}else{changeImg("before",imgWidth,page,elems);sign="+=";}
$(elems).each(function(i,e){$(e).animate({left:sign+imgWidth},time,(function(){return function(){if(i==(elems.length-1)){if(direct=="left"){changeImg("after",imgWidth,page,elems);}
changeTab(elems,dotElems,page);if(page=="index"){clearInterval(movement);movement=setInterval(autoMove(imgWidth,page,elems,dotElems),5000);}
animateFlag=false;}}})(i));});}
function changeImg(dur,imgWidth,page,elems){elems=(page=="index")?$(".banner a"):$(".imageFrame div div");switch(dur){case"after":$(elems[0]).parent().append(elems[0]).end().css({"left":(elems.length-1)*imgWidth+"px"});break;case"before":$(elems[elems.length-1]).parent().prepend(elems[elems.length-1]).end().css({"left":"-"+imgWidth+"px"});break;}}
function changeTab(elems,dotElems,page){elems=(page=="index")?$(".banner a"):$(".imageFrame div div");var imgPos=$(elems).eq(0);$(dotElems).removeClass("active").removeClass("default").addClass("default");for(var i=0;i<elems.length;i++){if($(imgPos).hasClass("pos"+(i+1))){$(dotElems).eq(i).removeClass("default").addClass("active");}}}
function initImg(imgWidth,elems,clickElems,dotElems,page){var spanStr="";if(elems.length>1){$(clickElems).show();}
for(var i=0;i<elems.length;i++){spanStr+="<span></span>";}
if(page=="detail"){$(".tab").html(spanStr);dotElems=$(".tab span");}else{$(".dot").html(spanStr);dotElems=$(".dot span");}
$(elems).each(function(i,e){$(e).css({"left":i*imgWidth+"px"});});changeTab(elems,dotElems,page);}
function handleImgAnimate(imgWidth,page,elems,clickElems,dotElems){initImg(imgWidth,elems,clickElems,dotElems,page);if(page=="detail"){dotElems=$(".tab span");}else{dotElems=$(".dot span")}
displayImg(imgWidth,page,elems,clickElems,dotElems);$(".banner").add(".imageFrame").hover(function(){$(".lChange").add(".rChange").addClass("hover");},function(){$(".lChange").add(".rChange").removeClass("hover");});}
function autoMove(imgWidth,page,elems,dotElems){return function(){moveImg("left",imgWidth,page,elems,dotElems);}}
function showSoftSetDownload(){$(".softSet li").hover(function(){if($(this).parents(".detail_main").length==0){$(this).find(".download").css({"visibility":"visible"});}else{$(this).find(".word").hide().end().find(".download").css({"display":"block"});}},function(){if($(this).parents(".detail_main").length==0){$(this).find(".download").css({"visibility":"hidden"});}else{$(this).find(".download").hide().end().find(".word").css({"display":"block"});}});}
function slidSoftSetPanel(){$(".more").click(function(){if($(this).parents(".softSet").find("li").length<=12){return false;}
if($(this).hasClass("slid")){$(this).removeClass("slid").html("更多&nbsp;<span class='flag'></span>");$(this).parents(".softSet").css({"height":"370px"});}else{$(this).addClass("slid").html("收起&nbsp;<span class='flag'></span>");$(this).parents(".softSet").css({"height":"auto"});}
setMainHeight($(".index_softHolder"),$(".index_sideBar"));});}
function hoverNavList(){$(".navList").find("a").parents("li").hover(function(){if($(this).find("span").hasClass("active")){return;}else{$(this).find("span").addClass("hover");}},function(){if($(this).find("span").hasClass("active")){return;}else{$(this).find("span").removeClass("hover");}});}
function focusSearchBar(){if($(".searchArea").length<1){return false;}
$(".searchArea").focus(function(){$(this).addClass("searchAreaActive");});$(".searchArea").blur(function(){$(this).removeClass("searchAreaActive");});}
function strlen(str)
{var i;var len;len=0;for(i=0;i<str.length;i++)
{if(str.charCodeAt(i)>255)len+=2;else len++;}
return len;}