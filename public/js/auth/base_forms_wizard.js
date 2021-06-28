/*
 *  Document   : base_forms_wizard.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Form Wizard Page
 */

var BaseFormWizard = function() {
    // Init simple wizard, for more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard
    var initWizardSimple = function(){
        jQuery('.js-wizard-simple').bootstrapWizard({
            'tabClass': '',
            'firstSelector': '.wizard-first',
            'previousSelector': '.wizard-prev',
            'nextSelector': '.wizard-next',
            'lastSelector': '.wizard-last',
            'onTabShow': function($tab, $navigation, $index) {
		var $total      = $navigation.find('li').length;
		var $current    = $index + 1;
		var $percent    = ($current/$total) * 100;

                // Get vital wizard elements
                var $wizard     = $navigation.parents('.block');
                var $progress   = $wizard.find('.wizard-progress > .progress-bar');
                var $btnPrev    = $wizard.find('.wizard-prev');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

                // Update progress bar if there is one
		if ($progress) {
                    $progress.css({ width: $percent + '%' });
                }

		// If it's the last tab then hide the last button and show the finish instead

		if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
		} else {
                    $btnNext.show();
                    $btnFinish.hide();
		}
            }
        });
    };

    // Init wizards with validation, for more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard
    // and https://github.com/jzaefferer/jquery-validation
    var initWizardValidation = function(){
        // Get forms
        var $form1 = jQuery('.js-form1');
        var $form2 = jQuery('.js-form2');

        // Prevent forms from submitting on enter key press
        $form1.add($form2).on('keyup keypress', function (e) {
            var code = e.keyCode || e.which;

            if (code === 13) {
                e.preventDefault();
                return false;
            }
        });

        // Init form validation on classic wizard form
        var $validator1 = $form1.validate({
            errorClass: 'help-block animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'lastname': {
                    required: true,
                    minlength: 2
                },
                'firstname': {
                    required: true,
                    minlength: 3
                },
                'email': {
                    required: true,
                    email: true
                },
                'contact': {
                    required: true,
                    minlength: 8
                },
                'password': {
                    required: true,
                    minlength: 6
                },
                'password_confirmation': {
                    required: true,
                    minlength: 6,

                },
                'namecorporate': {
                    required: true,
                    minlength: 3
                },
                'emailcorporate': {
                    required: true,
                    email: true

                },
                'contactcorporate': {
                    required: true,
                    minlength: 8
                },
                'registcorporate': {
                    required: true,
                    minlength: 4
                },
                'addresscorporate': {
                    required: true,
                    minlength: 2
                },
                'profil': {
                    required: true
                },
                'terms_conditions': {
                    required: true
                }
            },
            messages: {
                'lastname': {
                    required: 'S\'il vous plait entrez votre nom de famille',
                    minlength: 'Votre nom de famille doit comporter au moins 3 caractères.'
                },
                'firstname': {
                    required: 'S\'il vous plait entrez votre prenom',
                    minlength: 'Votre prenoms doit comporter au moins 3 caractères.'
                },
                'contact': {
                    required: 'S\'il vous plait entrez votre numéro de telephone',
                    minlength: 'Votre numero de telephone doit comporter au moins 8 caractères.'
                },
                'password': {
                    required: 'S\'il vous plait entrez votre mot de passe',
                    minlength: 'Votre mot de passe doit comporter au moins 6 caractères.'
                },
                'password_confirmation': {
                    required: 'S\'il vous plait confirmez votre mot de passe',
                    minlength: 'Your Number must consist of at least 08 characters'
                },
                'email': 'S\'il vous plait entrez une adresse mail valide',

                'namecorporate': {
                    required: 'S\'il vous plait entrez votre nom de votre entreprise',
                    minlength: 'Votre nom de famille doit comporter au moins 3 caractères.'
                },
                'emailcorporate': {
                    required: 'S\'il vous plait entrez une adresse mail valide'
                },
                'contactcorporate': {
                    required: 'S\'il vous plait entrez le numéro de telephone de votre entreprise',
                    minlength: 'Le numero de telephone doit comporter au moins 8 caractères.'
                },
                'registcorporate': {
                    required: 'S\'il vous plait entrez le numéro de registre de votre entreprise',
                    minlength: 'Le champ doit comporter au moins 4 caractères.'
                },
                'addresscorporate': {
                    required: 'S\'il vous plait entrez l\'adresse de votre entreprise',
                    minlength: 'Le champ doit comporter au moins 2 caractères.'
                },
                'profil': 'S\'il vous plait selectionnez un element.',
                'terms_conditions': 'You must agree to the service terms!'
            }
        });

        // Init form validation on the other wizard form
        var $validator2 = $form2.validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents('.form-group > div').append(error);
            },
            highlight: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error').addClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            success: function(e) {
                jQuery(e).closest('.form-group').removeClass('has-error');
                jQuery(e).closest('.help-block').remove();
            },
            rules: {
                'lastname': {
                    required: true,
                    minlength: 2
                },
                'firstname': {
                    required: true,
                    minlength: 3
                },
                'email': {
                    required: true,
                    email: true
                },
                'contact': {
                    required: true,
                    minlength: 8
                },
                'password': {
                    required: true,
                    minlength: 6
                },
                'password_confirmation': {
                    required: true,
                    minlength: 6,

                },
                'namecorporate': {
                    required: true,
                    minlength: 3
                },
                'emailcorporate': {
                    required: true,
                    email: true

                },
                'contactcorporate': {
                    required: true,
                    minlength: 8
                },
                'registcorporate': {
                    required: true,
                    minlength: 4
                },
                'addresscorporate': {
                    required: true,
                    minlength: 4
                },
                'profil': {
                    required: true
                },
                'terms_conditions': {
                    required: true
                }
            },
            messages: {
                'lastname': {
                    required: 'S\'il vous plait entrez votre nom de famille',
                    minlength: 'Votre nom de famille doit comporter au moins 3 caractères.'
                },
                'firstname': {
                    required: 'S\'il vous plait entrez votre prenom',
                    minlength: 'Votre prenoms doit comporter au moins 3 caractères.'
                },
                'contact': {
                    required: 'S\'il vous plait entrez votre numéro de telephone',
                    minlength: 'Votre numero de telephone doit comporter au moins 8 caractères.'
                },
                'password': {
                    required: 'S\'il vous plait entrez votre mot de passe',
                    minlength: 'Votre mot de passe doit comporter au moins 6 caractères.'
                },
                'password_confirmation': {
                    required: 'S\'il vous plait confirmez votre mot de passe',
                    minlength: 'Your Number must consist of at least 08 characters'
                },
                'email': 'S\'il vous plait entrez une adresse mail valide',

                'namecorporate': {
                    required: 'S\'il vous plait entrez votre nom de votre entreprise',
                    minlength: 'Votre nom de famille doit comporter au moins 3 caractères.'
                },
                'emailcorporate': {
                    required: 'S\'il vous plait entrez une adresse mail valide'
                },
                'contactcorporate': {
                    required: 'S\'il vous plait entrez le numéro de telephone de votre entreprise',
                    minlength: 'Le numero de telephone doit comporter au moins 8 caractères.'
                },
                'registcorporate': {
                    required: 'S\'il vous plait entrez le numéro de registre de votre entreprise',
                    minlength: 'Le champ doit comporter au moins 4 caractères.'
                },
                'addresscorporate': {
                    required: 'S\'il vous plait entrez l\'adresse de votre entreprise',
                    minlength: 'Le champ doit comporter au moins 2 caractères.'
                },
                'profil': 'S\'il vous plait selectionnez un element.',
                'terms_conditions': 'You must agree to the service terms!'
            }
        });

        // Init classic wizard with validation
        jQuery('.js-wizard-classic-validation').bootstrapWizard({
            'tabClass': '',
            'previousSelector': '.wizard-prev',
            'nextSelector': '.wizard-next',
            'onTabShow': function($tab, $nav, $index) {
		var $total      = $nav.find('li').length;
		var $current    = $index + 1;

                // Get vital wizard elements
                var $wizard     = $nav.parents('.block');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

		// If it's the last tab then hide the last button and show the finish instead
		if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
		} else {
                    $btnNext.show();
                    $btnFinish.hide();
		}
            },
            'onNext': function($tab, $navigation, $index) {
                var $valid = $form1.valid();

                if(!$valid) {
                    $validator1.focusInvalid();

                    return false;
                }
            },
            onTabClick: function($tab, $navigation, $index) {
		return false;
            }
        });

        // Init wizard with validation
        jQuery('.js-wizard-validation').bootstrapWizard({
            'tabClass': '',
            'previousSelector': '.previous',
            'nextSelector': '.next',
            'onTabShow': function($tab, $nav, $index) {
		var $total      = $nav.find('li').length;
		var $current    = $index + 1;

                // Get vital wizard elements
                var $wizard     = $nav.parents('.block');
                var $btnNext    = $wizard.find('.wizard-next');
                var $btnFinish  = $wizard.find('.wizard-finish');

		// If it's the last tab then hide the last button and show the finish instead
		if($current >= $total) {
                    $btnNext.hide();
                    $btnFinish.show();
		} else {
                    $btnNext.show();
                    $btnFinish.hide();
		}
            },
            'onNext': function($tab, $navigation, $index) {
                var $valid = $form2.valid();

                if(!$valid) {
                    $validator2.focusInvalid();

                    return false;
                }
            },
            onTabClick: function($tab, $navigation, $index) {
		return false;
            }
        });
    };

    return {
        init: function () {
            // Init simple wizard
            initWizardSimple();

            // Init wizards with validation
            initWizardValidation();
        }
    };
}();

// Initialize when page loads
jQuery(function(){ BaseFormWizard.init(); });
