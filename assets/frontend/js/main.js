/*-----------------------------------------------------------------------------------

    Theme Name: Amava - Startup Agency and SasS Business Template
    Description: Startup Agency and SasS Business Template
    Author: Chitrakoot Web
    Version: 3.0

    ---------------------------------- */    

!function(i){"use strict";var n=i(window);function t(){var e,t,s,a,o;e=i(".full-screen"),t=n.height(),e.css("min-height",t),s=i("header").height(),a=i(".screen-height"),o=n.height()-s,a.css("height",o)}i.scrollIt({upKey:38,downKey:40,easing:"swing",scrollTime:600,activeClass:"active",onPageChange:null,topOffset:-70}),i("#preloader").fadeOut("normall",function(){i(this).remove()}),n.on("scroll",function(){var e=n.scrollTop(),t=i(".navbar-brand.inner-logo img"),s=i(".navbar-brand.blue-logo img"),a=i(".navbar-brand.dark-logo img");e<=50?(i("header").removeClass("scrollHeader").addClass("fixedHeader"),s.attr("src","img/logos/logo-white.png"),a.attr("src","img/logos/logo-dark.png"),t.attr("src","img/logos/logo-white.png")):(i("header").removeClass("fixedHeader").addClass("scrollHeader"),a.attr("src","img/logos/logo-white.png"),992<=n.width()&&(s.attr("src","img/logos/logo-blue.png"),t.attr("src","img/logos/logo.png")))}),n.width()<=991&&i(".onepage-header .navbar-nav .nav-link").on("click",function(){i(".navbar-nav").css("display","none"),i(".navbar .navbar-toggler").removeClass("menu-opened")}),n.on("scroll",function(){500<i(this).scrollTop()?i(".scroll-to-top").fadeIn(400):i(".scroll-to-top").fadeOut(400)}),i(".scroll-to-top").on("click",function(e){e.preventDefault(),i("html, body").animate({scrollTop:0},600)}),new WOW({boxClass:"wow",animateClass:"animated",offset:0,mobile:!1,live:!0}).init(),i(".parallax,.bg-img").each(function(e){i(this).attr("data-background")&&i(this).css("background-image","url("+i(this).data("background")+")")}),i(".story-video").magnificPopup({delegate:".video",type:"iframe"}),i(".popup-youtube").magnificPopup({disableOn:700,type:"iframe",mainClass:"mfp-fade",removalDelay:160,preloader:!1,fixedContentPos:!1}),i(".tab1").click(function(){i(".second, .third, .four").fadeOut(),i(".first").fadeIn(1e3)}),i(".tab2").click(function(){i(".first, .third, .four").fadeOut(),i(".second").fadeIn(1e3)}),i(".tab3").click(function(){i(".second, .first, .four").fadeOut(),i(".third").fadeIn(1e3)}),i(".tab4").click(function(){i(".first, .second, .third").fadeOut(),i(".four").fadeIn(1e3)}),n.resize(function(e){setTimeout(function(){t()},500),e.preventDefault()}),t(),i(document).ready(function(){i("#testmonials-carousel").owlCarousel({loop:!0,responsiveClass:!0,autoplay:!0,smartSpeed:800,nav:!1,dots:!0,center:!0,margin:0,responsive:{0:{items:1},768:{items:1},992:{items:1}}}),i(".app_screenshots_slides").owlCarousel({items:1,loop:!0,autoplay:!0,smartSpeed:800,margin:30,center:!0,dots:!0,responsive:{0:{items:1},576:{items:2},768:{items:3},992:{items:4},1200:{items:5}}}),i(".testmonial-carousel").owlCarousel({loop:!0,responsiveClass:!0,autoplay:!0,smartSpeed:800,nav:!0,dots:!1,center:!0,margin:0,navText:["<span>&#10229;</span>","<span>&#10230;</span>"],responsive:{0:{items:1},768:{items:1},992:{items:1}}}),i(".testmonial-style02").owlCarousel({loop:!0,responsiveClass:!0,autoplay:!0,smartSpeed:800,nav:!0,dots:!1,center:!1,margin:0,navText:["<i class='ti-arrow-left'></i>","<i class='ti-arrow-right'></i>"],responsive:{0:{items:1,dots:!1},768:{items:1},992:{items:1}}}),i(".testmonial-style03").owlCarousel({loop:!0,responsiveClass:!0,autoplay:!0,smartSpeed:800,nav:!1,dots:!1,center:!1,margin:0,responsive:{0:{items:1},768:{items:2},992:{items:3}}}),i(".testmonial-style05").owlCarousel({loop:!0,responsiveClass:!0,autoplay:!0,smartSpeed:800,nav:!1,dots:!0,center:!0,margin:0,responsive:{0:{items:1},768:{items:2},992:{items:3}}}),i(".testmonial-style07").owlCarousel({loop:!0,responsiveClass:!0,autoplay:!0,smartSpeed:900,nav:!1,dots:!0,margin:0,responsive:{0:{items:1},768:{items:1},992:{items:1}}}),i(".testmonial-style08 .owl-carousel").owlCarousel({loop:!0,responsiveClass:!0,autoplay:!1,smartSpeed:800,nav:!1,dots:!0,center:!1,margin:40,responsive:{0:{items:1},768:{items:2},992:{items:3}}}),i("#clients").owlCarousel({loop:!0,nav:!1,dots:!1,autoplay:!0,autoplayTimeout:3e3,responsiveClass:!0,autoplayHoverPause:!1,responsive:{0:{items:2,margin:20},768:{items:3,margin:40},992:{items:4,margin:60},1200:{items:5,margin:80}}}),i(".clients-style2").owlCarousel({loop:!0,nav:!1,dots:!1,autoplay:!0,smartSpeed:800,autoplayTimeout:3e3,responsiveClass:!0,autoplayHoverPause:!1,responsive:{0:{items:2,margin:30},576:{items:3,margin:40},768:{items:4,margin:40},992:{items:5,margin:60},1200:{items:6,margin:80}}}),i("#carousel-style2").owlCarousel({loop:!0,responsiveClass:!0,autoplay:!0,autoplayTimeout:3e3,smartSpeed:800,nav:!1,dots:!1,center:!1,margin:0,responsive:{0:{items:1},768:{items:2},992:{items:2},1200:{items:3},1600:{items:4}}}),i(".service-carousel").owlCarousel({loop:!0,responsiveClass:!0,autoplay:!1,autoplayTimeout:3e3,smartSpeed:800,nav:!1,dots:!1,center:!1,margin:30,responsive:{0:{items:1},576:{items:2},768:{items:2},992:{items:3},1200:{items:3},1400:{items:4},1600:{items:5}}}),i(".case-studies").owlCarousel({loop:!0,responsiveClass:!0,autoplay:!0,smartSpeed:800,nav:!1,dots:!0,center:!1,margin:0,responsive:{0:{items:1},768:{items:2},992:{items:3}}}),i(".owl-carousel").owlCarousel({items:1,loop:!0,dots:!1,margin:0,autoplayTimeout:3e3,autoplay:!0,smartSpeed:900}),0!==i(".horizontaltab").length&&i(".horizontaltab").easyResponsiveTabs({type:"default",width:"auto",fit:!0,tabidentify:"hor_1",activate:function(e){var t=i(this),s=i("#nested-tabInfo");i("span",s).text(t.text()),s.show()}}),0!==i(".childverticaltab").length&&i(".childverticaltab").easyResponsiveTabs({type:"vertical",width:"auto",fit:!0,tabidentify:"ver_1",activetab_bg:"#fff",inactive_bg:"#F5F5F5",active_border_color:"#c1c1c1",active_content_border_color:"#c1c1c1"}),0!==i(".verticaltab").length&&i(".verticaltab").easyResponsiveTabs({type:"vertical",width:"auto",fit:!0,closed:"accordion",tabidentify:"hor_1",activate:function(e){var t=i(this),s=i("#nested-tabInfo2");i("span",s).text(t.text()),s.show()}}),i(".countup").counterUp({delay:25,time:2e3}),i(".countdown").countdown({date:"01 Jan 2023 00:01:00",format:"on"}),i(".slow-redirect a[href^='#']").click(function(e){e.preventDefault();var t=i(i(this).attr("href")).offset().top-85;i("body, html").animate({scrollTop:t},1e3)})}),n.on("load",function(){i(".gallery").magnificPopup({delegate:".popimg",type:"image",gallery:{enabled:!0}});var t=i(".gallery").isotope({});i(".filtering").on("click","span",function(){var e=i(this).attr("data-filter");t.isotope({filter:e})}),i(".filtering").on("click","span",function(){i(this).addClass("active").siblings().removeClass("active")}),n.stellar(),i(".tabs_div").toggleClass("tabs_div_visible")})}(jQuery);