@yield('scriptJs')
<!-- Core -->

<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js" defer></script>
    <script type="text/javascript" defer>
        $(document).ready(function () {
            $('#ckeditor').ckeditor();
        });
    </script>
 <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
 <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
 <!-- Optional JS -->
 <script>
    $(document).ready(function() {

        $("#profils option:selected").change(function(){
            // let select = document.getElementById("profils");
        $("#getCorporate").hide();

         var select = $(this).val();

            let choice = select.selectedIndex  // Récupération de l'index du <option> choisi

            let valeur_cherchee = select.options[choice].value;

            if(valeur_cherchee == 1) {
                $("#getCorporate").show();
            }else{
                $("#getCorporate").hide();
            }
        });

            //add input
    var i = 0;
    $(".add").click(function(){
      ++i;
      $("#dynamicChamp").append('<div class="col-lg-5">' +
    '<div class="form-group">' +
        '<label for=""> Nom du document</label>'+
        '<input type="text" name="doc['+i+'][doc_name]" class="form-control  @error("doc['+i+'][doc_name]") is-invalid @enderror" value="{{ old("doc['+i+'][doc_name]") }}" placeholder="Entrez le nom de votre document">' +
       '@error("doc['+i+'][doc_name]")' +
            '<span class="invalid-feedback" role="alert">' +
                '<strong>{!! $message !!}</strong>'+
           '</span>'+
        '@enderror'+
    '</div>'+
'</div>'+
'<div class="col-lg-5">' +
    '<div class="form-group">'+
        '<label for=""> Charger votre document</label>'+
        '<input type="file" name="doc['+i+'][doc_file]" class="form-control @error("doc['+i+'][doc_file]") is-invalid @enderror" value="{{ old("doc['+i+'][doc_file]") }}">'+
        '@error("doc['+i+'][doc_file]")'+
            '<span class="invalid-feedback" role="alert">'+
                '<strong>{!! $message !!}</strong>'+
            '</span>'+
        '@enderror'+
    '</div>'+
'</div>'+
'<div class="col-lg-2">'+
    '<div class="form-group">'+
       ' <label for="">.</label>'+
        '<button class="btn btn-primary">Remove</button>'+
    '</div>'+
'</div>');



      });

      // $(this).attr('disabled', true);
    });

    //remove input
    $(document).on('click', '.remove-tr', function(){
      $(this).parents('tr').remove();
      $('#result').val('');
      $('.add').removeAttr('disabled');
    });

    //     $("#profils option:selected").each(function() {
    //         $("#getCorporate").hide();

    //     //Get option value
    //      var select = $(this).val();

    //      let choice = select.selectedIndex  // Récupération de l'index du <option> choisi

    //         let valeur_cherchee = select.options[choice].value;

    //         if(valeur_cherchee == 1) {
    //             $("#getCorporate").show();
    //         }else{
    //             $("#getCorporate").hide();
    //         }


    // });

    })
</script>

<!-- Etape2 --- actionnaire-->
<script type="text/javascript">
    $(document).ready(function(){
      $('#enregistrer2').attr('disabled', 'true');

      var c = $('#capital');
      var m = $('#addmore_montant0');
      var p = $('#addmore_pourcentage0');

      m.on('keyup change',function(){
        if(parseInt(c.val()) < parseInt(m.val())){
          alert('Le montant de l\'actionnaire ne peut etre superieur au capital');
          m.val('');
          p.val('');
          $('#result').val('');
        }

        if(parseInt(c.val()) >= parseInt(m.val())){
          var total=isNaN( parseInt(m.val() * c.val())) ? 0 :((m.val()*100) / c.val());
          p.val(total.toFixed(2));
        }
      });


    //add input
    var i = 0;
    $(".add").click(function(){
      ++i;
      $("#dynamicTable").append('<tr>'+
      '<td>'+
        '<input type="text" id="doc_name'+i+'" name="doc['+i+'][doc_name]" placeholder="Entrer le nom" class="form-control nom @error("doc['+i+'][doc_name]") is-invalid @enderror" />'+
        '@error("doc['+i+'][doc_name]")' +
            '<span class="invalid-feedback" role="alert">' +
                '<strong>{!! $message !!}</strong>'+
           '</span>'+
        '@enderror'+
      '</td>'+
      '<td>'+
        '<input type="file" id="doc_file'+i+'" name="doc['+i+'][doc_file]" placeholder="Enter le montant" class="form-control montant @error("doc['+i+'][doc_file]") is-invalid @enderror" />'+
        '@error("doc['+i+'][doc_file]")'+
            '<span class="invalid-feedback" role="alert">'+
                '<strong>{!! $message !!}</strong>'+
            '</span>'+
        '@enderror'+
        '</td>'+
      '<td><button type="button" class="btn btn-danger btn-sm remove-tr">Supprimer</button></td>'+
      '</tr>');

        var ca = $('#capital');
        var ma = $('#addmore_montant'+i);
        var pa = $('#addmore_pourcentage'+i);

        ma.on('keyup change', function(){
          if(parseInt(ca.val()) < parseInt(ma.val())){
            alert('Le montant de l\'actionnaire ne peut etre superieur au capital');
            ma.val('');
            pa.val('');
            $('#result').val('');
          }

          if(parseInt(ca.val()) >= parseInt(ma.val())){
          var totala=isNaN( parseInt(ma.val() * ca.val())) ? 0 :((ma.val()*100) / c.val())
          pa.val(totala.toFixed(2));
          }

      });

      // $(this).attr('disabled', true);
    });

    //remove input
    $(document).on('click', '.remove-tr', function(){
      $(this).parents('tr').remove();
      $('#result').val('');
      $('.add').removeAttr('disabled');
    });

    $('#form2').submit(function(e){
      e.preventDefault();
      var form2 = $(this).attr('action');

      $.ajax({
        url: form2,
        type:'POST',
        data: new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        beforeSend: function() {
            $('#enregistrer2').html('<span class="mx-3"><i class="fas fa-circle-notch fa-spin fa-2x"></i></span>');
        },
        success: function(data) {
          if($.isEmptyObject(data.error)){
            Swal.fire({
              title: 'Félicitations!',
              text: data.success,
              icon: 'success',
              confirmButtonColor: 'rgb(22, 115, 124)',
              confirmButtonText: 'OK'
            }).then((result) => {
              if (result.value) {
                $("#etape1, #etape2, #etape4, #etape5, #etape6, #etape7").hide();
                $("#etape3").show();
                $(location).attr('href', '#cappp');
                $('#etape_actionnaire i').removeClass('fa-check').addClass('fa-check-double');
                $('#etape_projet').removeClass('bg-light text-danger').addClass('progress-active').css('cursor', 'pointer');
                $('.etape_projet').removeClass('text-secondary').addClass('title').css('cursor', 'pointer');
              }
            })
          }else{
            printErrorMsg(data.error);
          }
        },
        complete: function() {
            $('#enregistrer2').html('<i class="fa fa-save"></i> Enregistrer et continuer');
        },
      });
    });

    function printErrorMsg (msg) {
      const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 8000,
        timerProgressBar: true,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        html: ' <div class="print-error-msg overflow-auto">'
          +'<p class="text-warning font-weight-bold">'
          +'<i class="fa fa-exclamation-circle fa-1x"></i> Champs obligatoires ou invalides'
          +'</p>'
          +'<ul class="text-left text-light"></ul>'
          +'</div>'
      })
      $('.swal2-popup').addClass('bg-dark rounded-0');
      $('.swal2-timer-progress-bar').addClass('bg-warning');
      $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
      });
    }

    // sum of input
   $('#form2').on('input', '.montant', function(){

        var totalSum = 0;
        $('#form2 .montant').each(function(){
          var inputVal = $(this).val();
          if($.isNumeric(inputVal)){
            totalSum += parseInt(inputVal);
          }
        });
        $('#result').val(totalSum);

          $('#form2 .montant').each(function(){
            if($('#result').val() < $('#capital').val()){
              $('.add').removeAttr("disabled");
            }

            if(parseInt($('#result').val()) > parseInt($('#capital').val()) ){
              var clear_act_elem = $(document.activeElement).val('');
              $(clear_act_elem).parents('tr').find('.pourcent').val('');
              // alert('Le montant des actionnaires ne peut etre superieur au capital')
           }

           if($('#result').val() == $('#capital').val()){
              $('.add').attr('disabled', 'true');
              $('#enregistrer2').removeAttr('disabled');
            }else{
              $('#enregistrer2').attr('disabled', true);
              $('.add').removeAttr("disabled");
            }
          });
    });
  });

  </script>
 <!-- Optional JS -->
 <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

 <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
 <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
 <!-- Argon JS -->
 <script src="{{ asset('assets/js/argon.js?v=1.1.0') }}"></script>
 <!-- Demo JS - remove this in your project -->
 <script src="{{ asset('assets/js/demo.min.js') }}"></script>
 <!-- JQUERY STEP -->
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/nouislider/distribute/nouislider.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/quill/dist/quill.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone-amd-module.min.js') }}" defer></script>
    <script src="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}" defer></script>

<script>

</script>
