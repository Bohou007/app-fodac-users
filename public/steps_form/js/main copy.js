$(function () {
    $("#wizard").steps({
        headerTag: "h4",
        bodyTag: "section",
        enableFinishButton: true,
        transitionEffect: "fade",
        enableAllSteps: true,
        transitionEffectSpeed: 500,
        onStepChanging: function (event, currentIndex, newIndex) {
            if (newIndex === 1) {
                $('.steps ul').addClass('step-2');
            } else {
                $('.steps ul').removeClass('step-2');
            }
            if (newIndex === 2) {
                $('.steps ul').addClass('step-3');
            } else {
                $('.steps ul').removeClass('step-3');
            }

            if (newIndex === 3) {
                $('.steps ul').addClass('step-4');
                $('.actions ul').addClass('step-last');

            } else {
                $('.steps ul').removeClass('step-4');
                $('.actions ul').removeClass('step-last');
            }

            if (currentIndex == 3) {
                var $input = $('<input type="submit" class="btn btn-success btn-lg" value="Submit Data"/>');
                $input.appendTo($('ul[aria-label=Pagination]'));
            } else {
                $('ul[aria-label=Pagination] input[value="Submit"]').remove();
            }
            return true;
        },
        onFinishing: function (event, currentIndex) {
            var form = $(this);

            // Disable validation on fields that are disabled.
            // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
            form.validate().settings.ignore = ":disabled";

            // Start validation; Prevent form submission if false
        },
        onFinished: function (event, currentIndex) {
            event.preventDefault();

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            })

            var postForm = { //Fetch form data
                'name': $('input[name=name_project]').val(),
                'description': $('textarea[name=description_project]').val(),
                'budget_oc': $('input[name=budget_oc]').val(),
                'capitale_oc': $('input[name=capitale_oc]').val(),
                'capitale_demander': $('input[name=capitale_demander]').val()//Store name fields value
            };
            alert('Bonjour comment tu vas');
            console.log(postForm);

            console.log($("formDemande").serialize());
            $.ajax({
                url: $("formDemande").attr("action"),
                type: 'POST',
                // data: {"data": formData, "doc_file":doc_file, "_token": "{{ csrf_token() }}"},
                data: $("formDemande").serialize(),
                success: function (data, status) {
                    swal({
                        title: "Félicitations!",
                        text: 'Le dossier de votre projet a bien été enregistrer. Nous vous recontacterons.',
                        type: 'success',
                        showCancelButton: false,
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                    }).then(function (isConfirm) {
                        if (isConfirm) {
                            window.location.replace("consultation-dossier");
                            return false;
                        }
                    });

                },
                error: function (xhr, desc, err) {

                    swal({
                        title: "Erreur !",
                        text: 'Merci de ressayer plustard.',
                        type: 'danger',
                        showCancelButton: false,
                        showConfirmButton: true,
                        confirmButtonText: "Okay",
                    }).then(function (isConfirm) {
                        if (isConfirm) {
                            return desc;
                        }
                    });
                }
            });

            // Submit form input
            // form.submit();

            // Submit form input
            // form.submit();
        },
        labels: {
            finish: "Enregistrer",
            next: "Suivant",
            previous: "Précédent"
        }
    }).validate({
        errorPlacement: function (error, element) {
            element.before(error);
        },
        rules: {
            'name_project': {
                required: true,
                minlength: 2
            },
        }
    });
    // Custom Steps Jquery Steps
    $('.wizard > .steps li a').click(function () {
        $(this).parent().addClass('checked');
        $(this).parent().prevAll().addClass('checked');
        $(this).parent().nextAll().removeClass('checked');
    });
    // Custom Button Jquery Steps
    $('.forward').click(function () {
        $("#wizard").steps('next');
    })
    $('.backward').click(function () {
        $("#wizard").steps('previous');
    })
    // Checkbox
    $('.checkbox-circle label').click(function () {
        $('.checkbox-circle label').removeClass('active');
        $(this).addClass('active');
    })

})
