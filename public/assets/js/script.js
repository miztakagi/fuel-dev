$(function(){
  // main部のマージンをnaviの高さに応じて設定する
  var hh = $("#navi-height").height(); // header 高さ
  $("#navi-height").on("change", function(){
    hh = $(this).height();
  });
  var mh = 30;　// main部の最小topマージン
  var sh = hh + mh;
  //$("#main").css("margin", sh+"px auto");
  // header/footer エレメント指定
	var navi = $("#navi-block");
	var hborder = $("#header-border");
	var foot = $("#foot");
	var fborder = $("#footer-border");
  var fh = foot.height(); // footer 高さ

  // イベントハンドラの設定
  // load や resize も入れておかないと android でうまく動作しないことがあるかも。問題なさそうなら外したほうが吉。
  $(window).on("load orientationchange resize", function() {
     // 現在の回転角度を取得して縦横の判定を行う 90 と -90 の場合は横向きであると判断できる
    if(Math.abs(window.orientation) === 90) {
        //console.log("横で見ている"); 
    } else {
        //console.log("縦で見ている"); 
    }
    var winWidth = $(window).width();
    //var imgNum = Math.ceil( Math.random()*4); // ロゴrandom表示の場合
    // @media分岐
    if(winWidth < 480){ // スマホ縦
      $("#logo").attr({ "src":"/assets/img/logo/logo_bell.png", "width":"40", "height":"40"});
    } else if(winWidth <= 600){ // スマホ横 
      $("#logo").attr({"src":"/assets/img/logo/logo_bell.png", "width":"40", "height":"40"});
    } else if(winWidth <= 768){ // タブレット 
      $("#logo").attr({"src":"/assets/img/logo/logo_190_40.png", "width":"190", "height":"40"});
    } else { // PC
      //$("#logo").attr({"src":"./assets/img/logo/logo_190_40.svg", "width":"190", "height":"40"});
    }
    if( $("#navi-height").height() > 64 ){
      $("#main").css("margin", "122px 20px 25px 10px");
      $(".uk-navbar-flip").css("margin-top", "5px");
    }else{
      $("#main").css("margin", "77px 20px 25px 10px");
      $(".uk-navbar-flip").css("margin-top", "-5px");
    }
  });

	// スクロールイベントを監視
  $(window).on("scroll", function() {
    var d = 676;
    var s = $(this).scrollTop(); // スクロール量
    var scrollHeight = $(document).height(); // ページ長さ
    var scrollPosition = $(window).height() + $(window).scrollTop();
    var winWidth = $(window).width();
    var r = document.body.scrollHeight - document.body.clientHeight - document.body.scrollTop;
    //$("#dd").html("bottomまで="+r+"/ ページ長="+scrollHeight+"/ scroll地点="+scrollPosition+"/ スクロール量="+s);
    // スクロール量によってヘッダ部の自動出し分け
    if (s < mh) {
      dispOn(hborder, navi);
    } else if(s > mh) {
      dispOn(navi, hborder);
      //dispOn(foot, fborder);
    }
  });

  // HEADER NAVI の出し入れ
  $(hborder).on("click", function(){
  	//$("html,body").slideUp('first');
  	dispOn(hborder, navi);
  });
  // FOOTER 出し入れ
	$(fborder).on("click", function(){
		dispOn(fborder, foot);
    $('html, body').animate({scrollTop:$(document).height()+fh}, 'slow'); // bottomへスクロールして表示
	});
	$("#footer-close").on("click", function(){
		dispOn(foot, fborder);
    //$('html, body').animate({scrollTop:$(document).height()-fh}, 'slow'); // bottomへスクロールして表示
	});

  // オーバーレイの表示非表示
  $(".uk-overlay").on("click", function(){
    if($(this).hasClass("uk-overlay-active")){
      $(this).removeClass("uk-overlay-active");
    }else{
      $(this).addClass("uk-overlay-active");
    }
  });

  // 試し読み
  $(".readtry").on("click", function(){
    var data = $(this).data("item-id");
    alert(data);
  });

  // メール送信時にスピンアイコンを表示
  $(".registsubmit").on("click", function(){
    $(this).html('<i class="uk-icon-spinner uk-icon-spin"></i> メール送信中');
  });

  // メッセージしばらくしたら消す
  $("#message, #err_message").delay(5000).slideUp(200);

  $("button").on("click", function(){
    //alert($(this).data('href'));
    if($(this).data('href') !== undefined){
      location.href = $(this).data('href');
    }
  });

});

////////////// 関数 ///////////////////

// header/footer 表示非表示
function dispOn(target1, target2){
  target1.slideUp(200);
  target2.show();
  return false;
}
// Modalを強制的に開く
function modalOpen(id){
  var modal = UIkit.modal(id);
  modal.show();
}

// もっと見る 10件追加
function load_more() {
  $('#loading').show();
  $.ajax({
    url: "add.php",
    cache: false,
    success: function(data) { 
      $("#dd").append(data); 
      $('#loading').hide(); 
    } 
  });
}