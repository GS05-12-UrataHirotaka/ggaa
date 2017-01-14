<!-- スムーズスクロール部分の記述 -->
$(function(){
   $('a[href=#]').click(function() {
      var speed = 1000; // ミリ秒
      var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top; $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});

<!-- ページトップに戻る -->
//■page topボタン
$(function(){
var topBtn=$('#pageTop');
topBtn.hide();
 
//◇ボタンの表示設定
$(window).scroll(function(){
  if($(this).scrollTop()>80){
    topBtn.fadeIn();
  }else{
    topBtn.fadeOut();
  } 
});
 
// ◇ボタンをクリックしたら、スクロールして上に戻る
topBtn.click(function(){
  $('body,html').animate({
  scrollTop: 0},500);
  return false;
});

});

$(function(){
$('.nav-tabs li').click(function() {
		var index = $('.nav-tabs li').index(this);
		$('.tab-pane').css('display','none');
		$('.tab-pane').eq(index).css('display','block');
		$('.nav-tabs li').removeClass('active');
		$(this).addClass('active')
	});
});