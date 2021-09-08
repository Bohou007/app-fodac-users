@yield('scriptJs')
<!-- Core -->

<script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
@include('flashy::message')
<script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
<!-- Optional JS -->
<script>
    $(document).ready(function() {

    $("#profils option:selected").change(function() {
        // let select = document.getElementById("profils");
        $("#getCorporate").hide();

        var select = $(this).val();

        let choice = select.selectedIndex // Récupération de l'index du <option> choisi

        let valeur_cherchee = select.options[choice].value;

        if (valeur_cherchee == 1) {
            $("#getCorporate").show();
        } else {
            $("#getCorporate").hide();
        }
    });
    });



    })
</script>

<script>
    $(document).ready(function() {
        $('#datatable-buttons_filter').toText("helloworld");
    });
</script>
<script>
    //au clic du bouton enregistrer
    $(document).ready(function() {
            $("#envoyer").click(function() {
                $('#envoyer').html('<i class="fa fa-spin spiner"></i>Envoi en cours...');
            });
            $("#enregistrer").click(function() {
                $('#enregistrer').html('<i class="fa fa-spin spiner"></i>Enregistrement...');
            });
            $("#supprimer").click(function() {
                $('#supprimer').html('<i class="fa fa-spin spiner"></i>Suppression...');
            });

            // Au clic bouton valider demande
            $(document).on('click', '.valider', function() {
                $(this).html('<span class="mx-3"><i class="fas fa-circle-notch fa-spin fa-2x"></i></span>');
            });
        )
    };
</script>
<!-- Etape2 --- actionnaire-->
<script type="text/javascript">
    $(document).ready(function() {

        var i = 0;
        $('.addDoc').click(function() {
            ++i;
            $('#dynamicTable').append('<tr>' +
                '<td>' +
                '<input type="text" id="doc_name' + i + '" name="doc[' + i +
                '][doc_name]" placeholder="Entrer le nom" class="form-control nom @error("doc['+i+'][doc_name]") is-invalid @enderror" />' +
                '</td>' +
                '<td>' +
                '<input type="file" id="doc_file' + i + '" name="doc[' + i +
                '][doc_file]" class="form-control montant @error("doc['+i+'][doc_file]") is-invalid @enderror" />' +
                '</td>' +
                '<td><button type="button" class="btn btn-danger btn-sm remove-tr">Supprimer</button></td>' +
                '</tr>');
        });

        //remove input
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
            $('#result').val('');
            $('.addDoc').removeAttr('disabled');
        });

    });
</script>
<!-- Optional JS -->
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

<script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>

<!-- Optional JS -->
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<!-- Argon JS -->
<script src="{{ asset('assets/js/argon.js?v=1.1.0') }}"></script>
<!-- Demo JS - remove this in your project -->
<script src="{{ asset('assets/js/demo.min.js') }}"></script>
<!-- JQUERY STEP -->
<script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}" defer></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" defer></script>
<script src="{{ asset('assets/vendor/nouislider/distribute/nouislider.min.js') }}" defer></script>
<script src="{{ asset('assets/vendor/quill/dist/quill.min.js') }}" defer></script>
<script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}" defer></script>
<script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone-amd-module.min.js') }}" defer></script>
<script src="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}" defer></script>


<script>

</script>
