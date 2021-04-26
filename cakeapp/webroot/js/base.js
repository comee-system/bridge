$(function () {

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

});
$.fn.buttonCheck = function () {
    //テスト用
    //$("#regist").attr("disabled", false);
    //return true;

    var _err = 0;
    var _sei = $("[name='sei']").val();
    var _mei = $("[name='mei']").val();
    var _sei_kana = $("[name='sei_kana']").val();
    var _mei_kana = $("[name='mei_kana']").val();
    var _company = $("[name='company']").val();
    // var _job = $("[name='job']").val();
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
    // if (!_job) _err += 1;
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
