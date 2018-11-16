<?php
/**
 * Created by PhpStorm.
 * User: yangzhiwei
 * Date: 2018/8/25
 * Time: 14:56
 */

?>
<link rel="stylesheet" type="text/css" href="<?= $this->res('libs/webuploader/webuploader.css') ?>">
<script type="text/javascript" src="<?= $this->res('libs/webuploader/webuploader.js'); ?>"></script>
<form class="form-horizontal" role="form" id="ad_form" method="post">
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">名称</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="ad_name" placeholder="请输入广告名字" required>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">位置</label>
        <div class="col-sm-10">
            <select name="position" class="form-control">
                <option value="1">首页</option>
                <option value="2">资讯</option>
                <option value="3">分类</option>
                <option value="4">日志</option>
                <option value="5">分享</option>
                <option value="6">关注</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">排序</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" name="sort" id="lastname" placeholder="请输入排序" required>
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">显示</label>
        <div class="col-sm-10">
            <input type="radio" name="status" value=1>显示
            <input type="radio" name="status" value=0>隐藏
        </div>
    </div>
    <div class="form-group">
        <label for="lastname" class="col-sm-2 control-label">图片</label>
        <div id="uploader" class="col-sm-10">
            <!--用来存放item-->
            <div id="fileList" class="uploader-list"></div>
            <div id="filePicker">选择图片</div>
        </div>
    </div>
    <input type="hidden" name="image" value="" required>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">保存</button>
        </div>
    </div>
</form>

<script href="<?= $this->res('libs/jquery/1.11.3/jquery.min.js') ?>"></script>
<script>
    var swf = "<?=$this->res('libs/webuploader/Uploader.swf');?>";
    var uploader = WebUploader.create({
        // 选完文件后，是否自动上传。
        auto: true,
        // swf文件路径
        swf: swf,
        // 文件接收服务端。
        server: "<?=$this->link('Uploader:uploaderImage')?>",
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: {
            id: '#filePicker',
            multiple: false,
            label: '点击选择图片'
        },
        // 只允许选择图片文件。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        },
        // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
        resize: false
    });

    // 当有文件添加进来的时候
    uploader.on('fileQueued', function (file) {
        var thumbnailWidth = 900;
        var thumbnailHeight = 300;
        var $li = $(
            '<div id="' + file.id + '" class="file-item thumbnail">' +
            '<img>' +
            '</div>'
            ),
            $img = $li.find('img');


        // $list为容器jQuery实例
        $("#fileList").html($li);

        // 创建缩略图
        // 如果为非图片文件，可以不用调用此方法。
        // thumbnailWidth x thumbnailHeight 为 100 x 100
        uploader.makeThumb(file, function (error, src) {
            if (error) {
                $img.replaceWith('<span>不能预览</span>');
                return;
            }

            $img.attr('src', src);
        }, thumbnailWidth, thumbnailHeight);
        $("#filePicker").addClass("pull-right")
    });

    // 文件上传过程中创建进度条实时显示。
    uploader.on('uploadProgress', function (file, percentage) {
        var $li = $('#' + file.id),
            $percent = $li.find('.progress span');

        // 避免重复创建
        if (!$percent.length) {
            $percent = $('<p class="progress"><span></span></p>')
                .appendTo($li)
                .find('span');
        }

        $percent.css('width', percentage * 100 + '%');
    });

    // 文件上传成功，给item添加成功class, 用样式标记上传成功。
    uploader.on('uploadSuccess', function (file, response) {
        console.log(file);
        console.log(response);
        $('#' + file.id).addClass('upload-state-done');
        $("input[name='image']").val(response.message.url);
    });

    // 文件上传失败，显示上传出错。
    uploader.on('uploadError', function (file) {
        var $li = $('#' + file.id),
            $error = $li.find('div.error');

        // 避免重复创建
        if (!$error.length) {
            $error = $('<div class="error"></div>').appendTo($li);
        }

        $error.text('上传失败');
    });

    // 完成上传完了，成功或者失败，先删除进度条。
    uploader.on('uploadComplete', function (file) {
        $('#' + file.id).find('.progress').remove();
    });


    // $("#ad_form").on('submit', function () {
    //     var f = $('#ad_form')[0];
    //     var data = new FormData(f);
    //
    //     $.ajax({
    //         type: 'post',
    //         url: '/ad/save/',
    //         data: data,
    //         dataType:'json',
    //         success: function (d) {
    //             return false;
    //         },
    //         error:function(e){
    //             alert(1);return false;
    //         }
    //     });
    // });

</script>