
$(document).ready(function(){

    var info       = $('.info');
    var infodelete = $('.info-delete');
    var $_token    = $('#token').val();

    $('.open-modal').click(function(){
        info.hide().find('ul').empty();
        var id = $(this).val();
        $.get('../patient/edit' + '/' + id, function (data) {
            $('#id').val(data.id);
            $('#user_id').val(data.user_id);
            $('#reference').val(data.reference);
            $('.save').val("update");
            $('#myModal').modal('show');
        })
    });

    $('#btn-add').click(function(){
        $('.save').val("add");
        $('#frm').trigger("reset");
        info.hide().find('ul').empty();
        $('#myModal').modal('show');
    });

    $('.delete').click(function(){
        var id = $(this).val();
        var x = confirm("Are you sure you want to delete?");
        if(x)
        {
            $.ajax({
                type: "POST",
                headers: { 'X-XSRF-TOKEN' : $_token },
                url: '../patient/delete' + '/' + id,
                success: function (data) {

                    infodelete.hide().find('ul').empty();
                    if(data.success == false)
                    {
                        infodelete.find('ul').append('<li>'+data.errors+'</li>');
                        infodelete.slideDown();
                        infodelete.fadeTo(2000, 500).slideUp(500, function(){
                           infodelete.hide().find('ul').empty();
                        });
                    }
                    else
                    {
                        $("#patient" + id).remove();
                    }
                },
            });

            return true;

        }

    });

    $(".save").click(function (e) {
        e.preventDefault();
        var state = $('.save').val();
        var id = $('#id').val();
        var url = "{{ route('../patient/store') }}";

        if (state == "update"){
            url  = '../patient/update/' + id;
        }

        var formData = {
            id: $('#id').val(),
            user_id: $('#user_id').val(),
            reference: $('#reference').val(),
        }

        $.ajax({

            type: 'POST',
            url  : url,
            data: formData,
            dataType: 'json',
            headers: { 'X-XSRF-TOKEN' : $_token },
            success: function (data) {

                info.hide().find('ul').empty();

                if(data.success == false)
                {
                    console.log(url);
                    $.each(data.errors, function(index, error) {
                        info.find('ul').append('<li>'+error+'</li>');
                    });

                    info.slideDown();
                    info.fadeTo(2000, 500).slideUp(500, function(){
                       info.hide().find('ul').empty();
                    });
                }
                else
                {
                    var patient = '<tr id="patient' + data.data.id + '"><td>' + data.data.reference + '</td>';
                    patient += '<td style="text-align:center;width:15%;"><button class="btn btn-xs btn-primary open-modal" value="' + data.id + '"> <i class="glyphicon glyphicon-edit"></i> Edit</button>';
                    patient += '&nbsp;<button class="btn btn-xs btn-danger delete" value="' + data.id + '"><i class="glyphicon glyphicon-trash"></i> Delete</button></td></tr>';

                    if (state == "add"){
                        $('#patient-list').append(patient);
                    }else{
                        $("#patient" + id).replaceWith(patient);
                    }

                    $('#frm').trigger("reset");
                    $('#myModal').modal('hide')
                }


            },
            error: function (data) {}
        });
    });
});
