

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
    $('.modalClose,.modal-main,.modal-bg').on('click', function () {
      $('.js-modal').fadeOut();
    //   ここで編集ボタンを押したらアップデートされるようにする
      return false;
    });
  });



