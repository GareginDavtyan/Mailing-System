function mailing() {
    var obj = this;
    $("#select_all").click(function () {
        $(".ch_user").prop('checked', !$(".ch_user").prop("checked"));
    });

    $("#send_email").click(function () {
        obj.sendEmail();
    });
}

mailing.prototype.sendEmail = function () {
    var obj = this;

    if(!obj.isUserSelected()){
        alert("You must select at least one user");
        return false;
    }

    if(!obj.isTemplateSelected()){
        alert("Please select a template");
        return false;
    }

    var id_template = $("#template_list").val();
    var id_users = [];

    $('.ch_user:checked').each(function (index) {
        id_users.push($(this).val());
    });

    var data = {
        id_users : id_users,
        id_template : id_template
    };

    $.ajax({
        type: 'post',
        url: '/ajax/sendMails/',
        dataType: 'text',
        data: data,
        success: function(data){
            if(data){
                console.log("a");
                $("#added_to_queue").show();

                setTimeout(function(){
                    $("#added_to_queue").hide();
                }, 2500);
            }
            else{
                alert("ERROR! cannot add to queue");
            }
        }
    });

}

mailing.prototype.isUserSelected = function () {
    return $('.ch_user:checked').length;
}

mailing.prototype.isTemplateSelected = function () {
    return $('#template_list').val();
}


$(document).ready(function(){

    new mailing();

})
