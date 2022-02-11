$(function () {
    // -----------------------オンライン教材の送信------------------------
    var checkbox = $('.checkbox');

    checkbox.on('click', function () {
        var $this = $(this);
        let teaching_material_id = $this.data('teaching_material_id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: '/reflection/check', //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                teaching_material_id: teaching_material_id,
                is_done: $this.prop('checked'),
            },
        })

            // Ajaxリクエストが成功した場合
            .done(function () {
                if ($this.prop('checked') == false) {
                    $this.prop('checked', true);
                } else {
                    $this.prop('checked', false);
                }
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
                //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
                //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log(err);
                console.log(xhr);
            });

        return false;
    });

    // -----------------------人格の振り返りの送信------------------------
    var personality_reflection = $('.personality_reflection');

    personality_reflection.on('change', function () {
        var $this = $(this);
        let week = $this.data('week');
        let reflection_step = $this.data('reflection_step');
        let detail = $this.val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: '/reflection/personality_reflection', //routeの記述
            type: 'POST', //受け取り方法の記述（GETもある）
            data: {
                week: week,
                reflection_step: reflection_step,
                detail: detail,
            },
        })

            // Ajaxリクエストが成功した場合
            // .done(function () {})
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
                //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
                //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log(err);
                console.log(xhr);
            });

        return false;
    });

    // --------------------------DOMのサイズ調整---------------------------------------

    function resizeSheetTitle() {
        let teaching_material_height = $('.teaching_material').height();
        $('.teaching_material').height(teaching_material_height);
        $('#teaching_material_title').height(teaching_material_height);

        let personality_reflection_step_height = $('.personality_reflection_step').height();
        $('.personality_reflection_step_title').height(personality_reflection_step_height);
    }

    $(window).resize(resizeSheetTitle());
});
