$(function () {

    $(this).getComment();
    setInterval(function(){
        $(this).getComment();
    },10000);

    $(document).on("click",".modaldata",function(){
        var _href = $(this).attr("href");
        $(this).getModalData(_href);
        return false;
    });
});


$.fn.nl2br = function(str) {
    str = str.replace(/\r\n/g, "<br />");
    str = str.replace(/(\n|\r)/g, "<br />");
    return str;
}

$.fn.h = function(str){
    return String(str).replace(/&/g,"&amp;")
      .replace(/"/g,"&quot;")
      .replace(/</g,"&lt;")
      .replace(/>/g,"&gt;")
};

$.fn.date = function(userDate){
    var date    = new Date(userDate);
    var _y = date.getFullYear();
    var _m = date.getMonth();
    var _d = date.getDate();
    var _h = date.getHours();
    var _i = date.getMinutes();
    var _s = date.getSeconds();
    return _y+"/"+_m+"/"+_d+" "+_h+":"+_i+":"+_s;
};

$.fn.getModalData = function(_id){
    $("a#modal_download").hide();
    $.ajax({
        url: '/comment/detail/'+_id,
        type: "GET",
        datatype:'JSON',
    }).done(function (response) {
        $("#modal_body").html($(this).nl2br($(this).h(response.comment)));
        if(response.file){
            $("a#modal_download").show();
            $("#modal_download").attr("href","/upload/"+response.file);
            $("#modal_download").text(response.filename);
        }
    }).fail(function (response) {
        //   $("#messagearea").html(response);
    });

};


$.fn.getComment = function(){
    var _id = $("[name='id']").val();
    if(!_id){
        return false;
    }
    var _code = $("[name='code']").val();
    var _tenant_id = $("[name='tenant_id']").val();
    $.ajax({
        url: '/comment/list/'+_code+'/'+_id+"/"+_tenant_id,
        type: "GET",
        datatype:'JSON',
     }).done(function (response) {
        $("#messagearea").html("");
         $.each(response,function(key,value){
            var _div = "";
            var _float = "";
            var _bg =  "";
            if(value.response == 1){ //adminの時
                _float = "float-right";
                _bg = "bg-light";
            }
            _div = "<div class='card mb-3 w-75 "+_float+"'>";
            _div += "<div class='card-body "+_bg+"'>";
            _div += "<div class='row'>";
            _div += "<div class='col-md-6'>";
            if( value.readflag == 1){
                _div += "<span class='badge badge-secondary'>"+value.readjp+"</span>";
            }else{
                _div += "<span class='badge badge-warning'>"+value.readjp+"</span>";
            }
            _div += "</div>";
            _div += "<div class='col-md-6 text-right'>";
            _div += "<i class='far fa-clock'></i>";
            _div += $(this).date(value.created)+"</div>";
            _div += "</div>";
            _div += "<div class='row'>";
            _div += "<div class='col-12'>";
            _div += "<a href='"+value.id+"' class='modaldata' data-toggle='modal' data-target='#exampleModalLong'>";
            _div += $(this).h(value.commentsub);
            _div += "</a>";
            _div += "</div>";
            _div += "</div>";
            _div += "</div>";
            _div += "<div class='card-footer text-muted'>";
            _div += "<div class='row'>";
            _div += "<div class='col-6'>";
            if(value.filename){
                _div += "<a href='/upload/"+value.file+"' class='btn-sm btn-warning text-white'>ダウンロード</a> ";
                _div += $(this).h(value.filenamesub);
            }else{
                _div += "";
            }
            _div += "</div>";
            _div += "<div class='col-6 text-right'>";
            _div += "<a href='#message' class='btn-sm btn-primary' >";
            _div += "<i class='far fa-paper-plane'></i> ";
            _div += "返信";
            _div += "</a>";
            _div += "</div>";
            _div += "</div>";
            _div += "</div>";
            _div += "</div>";

            $("#messagearea").append(_div);
         });
     }).fail(function (response) {
     //   $("#messagearea").html(response);
     });

};

