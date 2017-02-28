
<div class="form-group">
  {!! Form::label('patient', 'N° du patient', []) !!}
  {!! Form::text('patient', null, ['id' => 'nopatient', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('date_start', 'Date de début', []) !!}
  {!! Form::date('date_start', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('date_end', 'Date de fin', []) !!}
  {!! Form::date('date_end', null, ['class'=>'form-control']) !!}

</div>

<div class="form-group">
  {!! Form::label('created_by', Auth::user()->name) !!}
</div>

{{-- <script>

// document.addEventListener("DOMContentLoaded", (event) =>{
//
//   $(window).load(function () {
//     $.get('/loan/ajax', function(){
//       console.log('response');
//     });
//   });
//   
// });



// $(function () {
//    var minlength = 1;
//
//    $("#nopatient").keyup(function () {
//
//        var that = this, value = $(this).val();
//
//        if (value.length >= minlength ) {
//            $.ajax({
//                  type: "GET",
//                  url: "/loginRoberto/ServletUtilisateurInsert",
//                  data: {
//                    txtEmail:$("#txtEmail").val()
//                  },
//                  dataType: "text",
//                  success: function(responseText){
//                      //we need to check if the value is the same
//                      if (value==$(that).val()) {
//                      //Receiving the result of search here
//                        $('#txtEmail2').text(responseText);
//                      }
//                  }
//              });
//          }
//        else{
//                    $('#txtEmail2').text('');
//                }
//      });
//  });

</script> --}}

{!! Form::submit('Enregistrer', ['class'=>'btn btn-info']) !!}
