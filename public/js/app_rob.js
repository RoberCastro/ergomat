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
  $('.delete_pro_comm').click(function(evt){
    var produit = $(evt.target).attr("data-product");
    var commande = $(evt.target).attr("data-commande");
    var quantity = $(evt.target).attr("data-quantity");
    var x = confirm("Are you sure you want to delete?");
    if(x)
    {
      $.ajax({
        type: "GET",
        headers: { 'X-XSRF-TOKEN' : $_token },
        url: '../product/remove' + '/' + commande  + '/' + produit + '/' + quantity,
        success: function (data) {
          console.log("Success");
          location.reload();
        },
      });

      return true;

    }
  });

  $('.delete_pro_loan').click(function(evt){
    //console.log("hello");
    var produit = $(evt.target).attr("data-product");
    var loan = $(evt.target).attr("data-loan");
    var quantity = $(evt.target).attr("data-quantity");
    console.log(quantity);
    var x = confirm("Are you sure you want to delete?");
    if(x)
    {
      $.ajax({
        type: "POST",
        beforeSend: function (xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');

          if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          }
        },
        url: '../product/removeproductloan/' + loan  + '/' + produit + '/' + quantity,
        success: function (data) {
          console.log("Success");
          location.reload();
        },
      });

      return true;

    }
  });

  $('.delete_pro_sale').click(function(evt){
    var produit = $(evt.target).attr("data-product");
    var sale = $(evt.target).attr("data-sale");
    var quantity = $(evt.target).attr("data-quantity");
    var x = confirm("Are you sure you want to delete?");
    if(x)
    {
      $.ajax({
        type: "POST",
        beforeSend: function (xhr) {
          var token = $('meta[name="csrf_token"]').attr('content');

          if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token);
          }
        },
        url: '../product/removeproductsale' + '/' + sale  + '/' + produit + '/' + quantity,
        success: function (data) {
          console.log("Success");
          location.reload();
        },
      });

      return true;

    }
  });

  // $('#btn-ajout-pro-commande').click(function(et){
  //
  //   console.log(et);
  //
  //   var voila =  $(et.target).attr("data-la");
  //   var quantity = $(et.target).attr("data-quantity");
  //
  //   //if(voila < quantity){
  //
  //     alert("Attention, pas assez des produits");
  //
  //   //}
  // });

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


$(document).ready(function () {

 /*   var dispo;
    var quantity;
    var available ;
    var inactive;
    var loaned ;
    var reparation ;
    var ordered;

    $('.quants').on('change', function (evt) {

        evt.preventDefault();

        dispo = event.currentTarget.selectedOptions[0].innerHTML;

        quantity = $(evt.target).attr("data-quantity");
        available = $(evt.target).attr("data-available");
        inactive = $(evt.target).attr("data-inactive");
        loaned = $(evt.target).attr("data-loaned");
        reparation = $(evt.target).attr("data-reparation");
        ordered = $(evt.target).attr("data-ordered");

        switch (dispo) {
            case "Total":
                evt.target.parentNode.nextElementSibling.innerHTML = quantity;
                break;
            case "Disponible":
                evt.target.parentNode.nextElementSibling.innerHTML = available;
                break;
            case "Inactive":
                evt.target.parentNode.nextElementSibling.innerHTML = inactive;
                break;
            case "Prêté":
                evt.target.parentNode.nextElementSibling.innerHTML = loaned;
                break;
            case "En reparation":
                evt.target.parentNode.nextElementSibling.innerHTML = reparation;
                break;
            case "Commandés":
                evt.target.parentNode.nextElementSibling.innerHTML = ordered;
                break;
            default:
                evt.target.parentNode.nextElementSibling.innerHTML = available;
                break;
        }


    });*/

    $('#quants1').on('change', function (evt) {

        evt.preventDefault();

        disponibilite = event.currentTarget.selectedOptions[0].innerHTML;


        switch (disponibilite) {
            case "Total":
                $('.quants').val("0");
                break;
            case "Disponible":
                $('.quants').val("1");
                break;
            case "Inactive":
                $('.quants').val("2");
                break;
            case "Prêté":
                $('.quants').val("3");
                break;
            case "En reparation":
                $('.quants').val("4");
                break;
            case "Commandés":
                $('.quants').val("5");
                break;
            default:
                $('.quants').val("1");
                break;
        }


    });
});
