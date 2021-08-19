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
        onFinished: function (event, currentIndex) {
            event.preventDefault();

            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                accepts: {'enctype': "multipart/form-data"}
            })

            document.getElementById("formDemande").submit();

        },
        labels: {
            finish: "Enregistrer",
            next: "Suivant",
            previous: "Précédent"
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
