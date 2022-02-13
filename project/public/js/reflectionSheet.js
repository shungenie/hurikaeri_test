/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/reflectionSheet.js ***!
  \*****************************************/
$(function () {
  // -----------------------チェックボックスの送信------------------------
  var checkbox = $('.checkbox');
  checkbox.on('click', function () {
    var $this = $(this);
    var assignment_id = $this.data('assignment_id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/reflection/check',
      //routeの記述
      type: 'POST',
      //受け取り方法の記述（GETもある）
      data: {
        assignment_id: assignment_id,
        is_done: $this.prop('checked')
      }
    }) // Ajaxリクエストが成功した場合
    .done(function () {
      if ($this.prop('checked') == false) {
        $this.prop('checked', true);
      } else {
        $this.prop('checked', false);
      }
    }) // Ajaxリクエストが失敗した場合
    .fail(function (data, xhr, err) {
      //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
      //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
      console.log(err);
      console.log(xhr);
    });
    return false;
  }); // -----------------------人格の振り返りの送信------------------------

  var reflection = $('.reflection');
  reflection.on('change', function () {
    var $this = $(this);
    var week_id = $this.data('week_id');
    var reflection_step = $this.data('reflection_step');
    var reflection_type = $this.data('reflection_type');
    var detail = $this.val();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/reflection/reflection_post',
      //routeの記述
      type: 'POST',
      //受け取り方法の記述（GETもある）
      data: {
        week_id: week_id,
        reflection_step: reflection_step,
        reflection_type: reflection_type,
        detail: detail
      }
    }) // Ajaxリクエストが成功した場合
    // .done(function () {})
    // Ajaxリクエストが失敗した場合
    .fail(function (data, xhr, err) {
      //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
      //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
      console.log(err);
      console.log(xhr);
    });
    return false;
  }); // -----------------------学習時間の送信------------------------

  var study_time = $('.study_time_input');
  study_time.on('change', function () {
    var $this = $(this);
    var week_id = $this.data('week_id');
    var study_time_type = $this.data('study_time_type');
    var study_time = $this.val();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: '/reflection/study_time',
      //routeの記述
      type: 'POST',
      //受け取り方法の記述（GETもある）
      data: {
        week_id: week_id,
        study_time_type: study_time_type,
        study_time: study_time
      }
    }) // Ajaxリクエストが成功した場合
    .done(function () {
      var total_study_time = $('#total_study_time_week' + week_id);
      var assignment_time = parseInt($('#assignment_time_week' + week_id).val());
      var review_time = parseInt($('#review_time_week' + week_id).val());
      total_study_time.text(assignment_time + review_time);
    }) // Ajaxリクエストが失敗した場合
    .fail(function (data, xhr, err) {
      //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
      //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
      console.log(err);
      console.log(xhr);
    });
    return false;
  }); // --------------------------DOMのサイズ調整---------------------------------------

  function resizeSheetTitle() {
    var teaching_material_height = 0;
    $('.teaching_material').each(function () {
      if ($(this).height() > teaching_material_height) {
        teaching_material_height = $(this).height();
      }
    });
    $('.teaching_material').height(teaching_material_height);
    $('#teaching_material_title').height(teaching_material_height);
    var posse_assignment_height = 0;
    $('.posse_assignment').each(function () {
      if ($(this).height() > posse_assignment_height) {
        posse_assignment_height = $(this).height();
      }
    });
    $('.posse_assignment').height(posse_assignment_height);
    $('#posse_assignment_title').height(posse_assignment_height);
    var personality_reflection_step_height = $('.personality_reflection_step').height();
    $('.personality_reflection_step_title').height(personality_reflection_step_height);
    var learning_reflection_step_height = $('.learning_reflection_step').height();
    $('.learning_reflection_step_title').height(learning_reflection_step_height);
    var review_time_height = $('.review_time').height();
    $('.review_time_title').height(review_time_height);
    var assignment_time_height = $('.assignment_time').height();
    $('.assignment_time_title').height(assignment_time_height);
  }

  $(window).resize(resizeSheetTitle());
});
/******/ })()
;