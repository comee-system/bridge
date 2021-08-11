$(function () {
    $(".sp-menu-icon a").click(function(){
        var _sts = $(".menu-style").css("display");
        if(_sts == "none"){
            $(".menu-style").animate({ height: 'show' }, 'fast');
        }else{
            $(".menu-style").animate({ height: 'hide' }, 'fast');
        }
        return false;
    });
    $("#sample2check").click(function(){
        var _chk = $("#sample2check").prop("checked");
        if(_chk){
            $("#openText").text("公開中");
        }else{
            $("#openText").text("非公開");
        }
        return true;
    });
    $(".confirm").click(function(){
        if(confirm("削除しますよろしいですか？")){
            return true;
        }
        return false;
    });
    //トップ画像の高さ
    $(this).topImageHeight();
    $(window).resize(function () {
        $(this).topImageHeight();
    });

    //パスワード表示
    $(document).on("click", "#open", function () {
        var _type = $("[name='password']").attr("type");
        if (_type == "password") {
            $("[name='password']").attr("type", "text");
        } else {
            $("[name='password']").attr("type", "password");
        }
    });

    //ボタンチェック
    $(this).buttonCheck();
    $(document).on("blur", ".buttoncheck", function () {
        $(this).buttonCheck();
    });
    $(document).on("click", "[name='agree']", function () {
        $(this).buttonCheck();
    });

    //ファイルアップロードファイル名表示
    $(document).on('change', ':file', function() {
        var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.parent().parent().next(':text').val(label);
    });
    try{
    $(".calendar").datepicker();
    }catch(e){}
    //ステータスの変更
    //下書き、非公開、公開中は変更不可
/*
    if($('[name="build_status"]').length){
        $(this).changeBuildStatus();
    }
*/


    $(document).on("change",'[name="build_status"]',function(){
        if(!confirm("ステータスの変更を行います。")){
            return false;
        }else{
            var _sel = $(this).val();
            var _url = location.href+"/"+_sel;
            $.ajax({
                url: _url,
                type: "GET",
                datatype:'JSON',
            }).done(function (response) {
                alert("変更を行いました。");
                console.log(response);
            });
        }
        return true;
    });
    //テナントのステータス更新
    $("button[name='tenant_status']").on("click",function(){
        if(!confirm("ステータスの変更を行います。")){
            return false;
        }

        $("#comment_status_text").hide();
        var _sel = $("#select_tenant_status").val();
        var _url = location.href;
        var _comment_id = $("#comment_id").val();
        var _data ={
            "comment_status":_sel,
            "comment_id":_comment_id
        };

        $.ajax({
            url: _url,
            type: "POST",
            data:_data
         }).done(function (response) {
             $("p#comment_status_text").show();
             //console.log(response);
             alert("ステータスの変更を行いました。");
          //  $(this).changeBuildStatus();

         });

        return true;

    });


});
/*
$.fn.changeBuildStatus = function(){
    var _build_status = $('[name="build_status"]').val();
    if(_build_status === "0" || _build_status === "2" || _build_status === "4") $('[name="build_status"]').prop("disabled",true);

    //交渉中と交渉中止、交渉成立の３つのみ選べる
    $('[name="build_status"]').find('option').each(function(_k,_v){
       // console.log(_v);
       // console.log($(this).val());
        if($(this).val() == "3" || $(this).val() == "5" || $(this).val() == "6" ){
            $(this).prop("disabled",false);
        }else{
            $(this).prop("disabled",true);
        }
    });
   // return true;
};
*/
$.fn.buttonCheck = function () {
    $("#regist").attr("disabled", false);
    return true;
    var _err = 0;
    var _sei = $("[name='sei']").val();
    var _mei = $("[name='mei']").val();
    var _sei_kana = $("[name='sei_kana']").val();
    var _mei_kana = $("[name='mei_kana']").val();
    var _company = $("[name='company']").val();
    var _job = $("[name='job']").val();
    var _post1 = $("[name='post1']").val();
    var _post2 = $("[name='post2']").val();
    var _prefecture = $("[name='prefecture']").val();
    var _city = $("[name='city']").val();
    var _space = $("[name='space']").val();
    var _build = $("[name='build']").val();
    var _busyo = $("[name='busyo']").val();
    var _tel1 = $("[name='tel1']").val();
    var _tel2 = $("[name='tel2']").val();
    var _tel3 = $("[name='tel3']").val();
    var _email = $("[name='email']").val();
    var _password = $("[name='password']").val();

    //check to checkbox
    var _agree = $("[name='agree']").prop("checked");

    //when values entered btn "disabled"
    if (!_sei) _err += 1;
    if (!_mei) _err += 1;
    if (!_sei_kana) _err += 1;
    if (!_mei_kana) _err += 1;
    if (!_company) _err += 1;
    if (!_job) _err += 1;
    if (!_post1) _err += 1;
    if (!_post2) _err += 1;
    if (!_prefecture) _err += 1;
    if (!_city) _err += 1;
    if (!_space) _err += 1;
    if (!_build) _err += 1;
    if (!_busyo) _err += 1;
    if (!_tel1) _err += 1;
    if (!_tel2) _err += 1;
    if (!_tel3) _err += 1;
    if (!_email) _err += 1;
    if (!_password) _err += 1;
    if (!_agree) _err += 1;

    if (_err == 0) {
        $("#regist").attr("disabled", false);
    } else {
        //can't click btn
        $("#regist").attr("disabled", true);
    }
};

$.fn.topImageHeight = function () {
    if ($('video').length) {
        var _videoHeight = $("video").height() + 10;
        var _jumbotron_top = $(".jumbotron_top").height();
        console.log(_videoHeight + ":::" + _jumbotron_top);
        //  if(_videoHeight >= 200) _videoHeight = 200;

        $(".jumbotron_top").height(_videoHeight);
        return true;
    }
}
