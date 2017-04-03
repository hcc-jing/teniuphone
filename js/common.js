
    $(".search_logo").click(function(){
            if($(".nav-down").is(":hidden"))
            {
                $(".nav-down").slideDown("slow");
                
            }else{
                $(".nav-down").slideUp("slow");
            }
        });

    $(function () {
    var ie6 = document.all;
    var dv = $('#nav-top'), st;
    dv.attr('otop', dv.offset().top); //存储原来的距离顶部的距离
    $(window).scroll(function () {
    st = Math.max(document.body.scrollTop || document.documentElement.scrollTop);
    if (st > parseInt(dv.attr('otop'))) {
    if (ie6) {//IE6不支持fixed属性，所以只能靠设置position为absolute和top实现此效果
    dv.css({ position: 'absolute', top: st });
    }

    else if (
	dv.css('position') != 'fixed') dv.css({ 'position': 'fixed', top: 0 });
	$(".nav-down").addClass("top-show");
	$(".nav-down-list").addClass("nav-down-list-show");
    }
	 else if (dv.css('position') != 'static') dv.css({ 'position': 'static' });
	 else { $(".nav-down").removeClass("top-show"); $(".nav-down-list").removeClass("nav-down-list-show");}
    });
    });
