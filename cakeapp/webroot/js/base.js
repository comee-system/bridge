$(function(){

    //トップ画像の高さ
    $(this).topImageHeight();
    $(window).resize(function() {
        $(this).topImageHeight();
    });

    //パスワード表示
    $(document).on("click","#open",function(){
        var _type = $("[name='password']").attr("type");
        if(_type == "password"){
            $("[name='password']").attr("type","text");
        }else{
            $("[name='password']").attr("type","password");
        }
    });

});
$.fn.topImageHeight = function(){
    if($('video').length){
        var _videoHeight = $("video").height()+10;
        var _jumbotron_top = $(".jumbotron_top").height();
        console.log(_videoHeight+":::"+_jumbotron_top);
        //  if(_videoHeight >= 200) _videoHeight = 200;

        $(".jumbotron_top").height(_videoHeight);
        return true;
    }
}
