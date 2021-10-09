

// モーダル機能

$(function () {
    $('.modalopen').each(function () {
      $(this).on('click', function () {
        var target = $(this).data('target');
        var modal = document.getElementById(target);
        console.log(modal);
        $(modal).fadeIn();
        return false;
      });
    });

  });


  // ハンバーガーメニュー

  $(function(){
    $(function () {

      $('.menu-trigger').click(function () { //メニューボタンタップ後の処理
        $(this).toggleClass('active'); //クリックした要素に「.active」要素を付与
        $('.menu-box').css('display', 'block');//「.gnavi」要素の非表示を表示する

        if ($(this).hasClass('active')) { //もしクリックした要素に「.active」要素があれば
          $('.menu-box').addClass('active');　 //「.active」要素を付与
        } else {                            //「.active」要素が無ければ
          $('.menu-box').removeClass('active'); //「.active」要素を外す
        }

      });
    });
  });
