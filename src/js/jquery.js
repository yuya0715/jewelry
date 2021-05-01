// ローディング画面
$(function () {
  const h = $(window).height();
  $("#loader-bg ,#loader").height(h).css("display", "block"); //ローディング画像を表示
});
$(window).on("load", function () {
  // 読み込み完了したら実行する
  $("#loader").delay(600).fadeOut(300); // ローディングをフェードアウト
  $("#loader-bg").delay(900).fadeOut(800); // 背景色をフェードアウト
});
// フェードインアニメーション
$(function() {
	$('body').fadeIn(1000); //1秒かけてフェードイン！
});
// トップに戻るボタンをスクロール後にフェードイン
var topBtn = $('#page-top');
topBtn.hide();
$(window).scroll(function () {
	if ($(this).scrollTop() > 100) {
		topBtn.fadeIn();
	} else {
		topBtn.fadeOut();
	}
});

// スムーズスクロール
$('a[href^="#"]').click(function() {
	var adjust = 0; // オフセット量
	var speed = 400; // ミリ秒
	var href= $(this).attr("href");
	var target = $(href == "#" || href == "" ? 'html' : href);
	var position = target.offset().top - adjust;
	$('body,html').animate({scrollTop:position}, speed, 'swing');
	return false;
});

// function slideSwitch() {
// 	var $active = $('.slideshow img.active');
// 	if ( $active.length == 0 ) $active = $('.slideshow img:last');
// 	var $next =  $active.next().length ? $active.next() : $('.slideshow img:first');
// 	$active.addClass('last-active');
// 	$next.css({opacity: 0.0})
// 	.addClass('active')
// 	.animate({opacity: 1.0}, 1000, function() {
// 	$active.removeClass('active last-active');
// 	});
// }

// $(function() {
// 	setInterval( "slideSwitch()", 2000 );
// });

//変数定義
var navigationOpenFlag = false;
var navButtonFlag = true;
var focusFlag = false;

//ハンバーガーメニュー
    $(function(){

      $(document).on('click','.el_humburger',function(){
        if(navButtonFlag){
          spNavInOut.switch();
          //一時的にボタンを押せなくする
          setTimeout(function(){
            navButtonFlag = true;
          },200);
          navButtonFlag = false;
        }
      });
      $(document).on('click touchend', function(event) {
        if (!$(event.target).closest('.navi,.el_humburger').length && $('body').hasClass('js_humburgerOpen') && focusFlag) {
          focusFlag = false;
          //scrollBlocker(false);
          spNavInOut.switch();
        }
      });
    });


//ナビ開く処理
function spNavIn(){
  $('body').removeClass('js_humburgerClose');
  $('body').addClass('js_humburgerOpen');
  setTimeout(function(){
    focusFlag = true;
  },200);
  setTimeout(function(){
    navigationOpenFlag = true;
  },200);
}

//ナビ閉じる処理
function spNavOut(){
  $('body').removeClass('js_humburgerOpen');
  $('body').addClass('js_humburgerClose');
  setTimeout(function(){
    $(".uq_spNavi").removeClass("js_appear");
    focusFlag = false;
  },200);
  navigationOpenFlag = false;
}

//ナビ開閉コントロール
var spNavInOut = {
  switch:function(){
    if($('body.spNavFreez').length){
      return false;
    }
    if($('body').hasClass('js_humburgerOpen')){
    spNavOut();
    } else {
    spNavIn();
    }
  }
};
//EC画像切り替え
$(function(){
  $('.thumb li').click(function(){
      var class_name = $(this).attr("class"); //クリックしたサムネイルのclass名を取得
      var num = class_name.slice(5); //class名の末尾の数字を取得
      $('.main li').hide(); //メインの画像を全て隠す
      $('.item' + num).fadeIn(); //クリックしたサムネイルに対応するメイン画像を表示
  });
});
//スクロールフェードインアニメーション
$(window).on('load scroll', function() {
  $(".show").each(function() {
    var winScroll = $(window).scrollTop();
    var winHeight = $(window).height();
    var scrollPos = winScroll + (winHeight * 0.8);
    if($(this).offset().top < scrollPos) {
        $(this).css({opacity: 1, transform: 'translate(0, 0)'});
    }
  });
});
