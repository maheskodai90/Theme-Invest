jQuery(document).ready(function(t){t('#submit, .wpcf7-submit, .comment-reply-link, input[type="submit"]').addClass("btn btn-default"),t(".wp-caption").addClass("thumbnail"),t(".widget_rss ul").addClass("media-list"),t("table#wp-calendar").addClass("table table-striped"),t(window).scroll(function(){t(this).scrollTop()>100?t(".scroll-to-top").fadeIn():t(".scroll-to-top").fadeOut()}),t(".scroll-to-top").click(function(){return t("html, body").animate({scrollTop:0},800),!1}),function(){var t=navigator.userAgent.toLowerCase().indexOf("webkit")>-1,e=navigator.userAgent.toLowerCase().indexOf("opera")>-1,n=navigator.userAgent.toLowerCase().indexOf("msie")>-1;(t||e||n)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e),t&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus()))},!1)}()});jQuery(window).load(function(){jQuery(".flexslider").length&&jQuery(".flexslider").flexslider({animation:"slide",controlNav:!0,prevText:"",nextText:"",smoothHeight:!0})});
    
jQuery("li#menu-item-14 a").addClass("site_btn");


jQuery(window).load(function(){jQuery(".flexslider").length&&jQuery(".flexslider").flexslider({animation:"slide",controlNav:!0,directionNav:false,prevText:"",nextText:"",smoothHeight:!0})});


jQuery('.fundssliderop').slick({
  dots: false,
  infinite: false,
  speed: 100,
		autoplay: false,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1025,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
