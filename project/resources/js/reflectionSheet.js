$(function () {
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
});
