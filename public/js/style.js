

// モーダル機能

$(function () {
  $('.modalopen').each(function () {  // ①オブジェクト（modalopen）に対してeachメソッド（繰り返し{}内の処理実行）
    $(this).on('click', function () {    // ②$(this)でeachの前に指定したオブジェクト（modalopen）の中でユーザーが選択した要素が代入されます。
      var target = $(this).data('target');  //③var変数の宣言、変数target＝dataメソッドを用いて、「.modalopen」要素が持つdata属性（data-target）を取得します。ボタン取得
      var modal = document.getElementById(target);  //④クリックした編集ボタンが持つdata-target属性の値と同じモーダルウィンドウのid名が含まれるドキュメント要素を取得。ID取得、ウィンドウ
      console.log(modal);  //表示
      $(modal).fadeIn();  //ゆっくり表示
      return false;  //ここまで、イベント伝達を無効処理
    });
  });

  $('.modalClose').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });

});

// getElementByIdメソッド:::任意のHTML要素に指定したID名にマッチするドキュメント要素を取得するメソッド


// ハンバーガーメニュー

$(function () {

  $('.menu-trigger').click(function () { //メニューボタンをクリックしたら
    $(this).toggleClass('active'); //指定したCSSクラスが要素に無ければ追加する、ボタンを回すため。※toggleClass、もう一度押すと削除される（elseがきく）
    $('.menu-box').css('display', 'block');//「.menu-box」にdisplay blockが付与され表示される
    // ifを使って条件分岐、active要素があれば、if
    if ($(this).hasClass('active')) { //もしクリックしたら、クリックした要素(menu-trigger)に「.active」要素があれば（hasClass）
      // $('.menu-box').addClass('active');　 //「.active」要素を付与する、 いらない？
    } else {
      // $('.menu-box').removeClass('active'); //「.active」要素を外す
      $('.menu-box').css('display', 'none'); //display noneを付与。メニューを非表示にする
    }
    return false;
  });
});


