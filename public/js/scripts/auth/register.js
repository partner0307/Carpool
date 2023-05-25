/*=========================================================================================
  File Name: auth-register.js
  Description: Auth register js file.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  ('use strict');

  var assetsPath = '../../../app-assets/',
    registerMultiStepsWizard = document.querySelector('.register-multi-steps-wizard'),
    pageResetForm = $('.auth-register-form'),
    select = $('.select2'),
    creditCard = $('.credit-card-mask'),
    expiryDateMask = $('.expiry-date-mask'),
    cvvMask = $('.cvv-code-mask'),
    mobileNumberMask = $('.mobile-number-mask'),
    pinCodeMask = $('.pin-code-mask');

<<<<<<< HEAD
    var adminRegister = $('#admin-register'),
=======
  var adminRegister = $('#admin-register'),
>>>>>>> 70e0a31e3c9292ec60b09016e2c2fc3068638002
    companyRegister = $('#company-register');

  if ($('body').attr('data-framework') === 'laravel') {
    assetsPath = $('body').attr('data-asset-path');
  }

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageResetForm.length) {
    pageResetForm.validate({
      /*
      * ? To enable validation onkeyup
      onkeyup: function (element) {
        $(element).valid();
      },*/
      /*
      * ? To enable validation on focusout
      onfocusout: function (element) {
        $(element).valid();
      }, */
      rules: {
        'register-firstname': {
<<<<<<< HEAD
            required: true
=======
          required: true
>>>>>>> 70e0a31e3c9292ec60b09016e2c2fc3068638002
        },
        'register-lastname': {
          required: true
        },
        'register-email': {
          required: true,
          email: true
        },
        'register-password': {
          required: true
        }
      }
    });
  }

  
  // multi-steps registration
  // --------------------------------------------------------------------
  
  // Form Wizard
  adminRegister.on('submit', e => {
    e.preventDefault();

    let send = {
      firstname:  $('#register-firstname').val(),
      lastname:   $('#register-lastname').val(),
      email:      $('#register-email').val(),
      password:   $('#register-password').val(),
    }

    $.post('/admin/signup/action', send).then(data => {
      if (parseInt(data)) {
        toastr['success']('The user has been registered', 'Success', {
          closeButton: true,
          tapToDismiss: false,
        });
      } else {
        toastr['warning']('The user already exists', 'Failure', {
          closeButton: true,
          tapToDismiss: false,
        });
      }
    });    
  });

  companyRegister.on('submit', e => {
    e.preventDefault();

    let send = {
      firstname:  $('#register-firstname').val(),
      lastname:   $('#register-lastname').val(),
      email:      $('#register-email').val(),
      password:   $('#register-password').val(),
      company:    $('#company-name').val(),
    }

    $.post('/company/signup/action', send).then(data => {
      if (parseInt(data)) {
        toastr['success']('The user has been registered', 'Success', {
          closeButton: true,
          tapToDismiss: false,
        });
      } else {
        toastr['warning']('The user already exists', 'Failure', {
          closeButton: true,
          tapToDismiss: false,
        });
      }
    });    
  });

  adminRegister.on('submit', e => {
    e.preventDefault();

    let send = {
      firstname:  $('#register-firstname').val(),
      lastname:   $('#register-lastname').val(),
      email:      $('#register-email').val(),
      password:   $('#register-password').val(),
    }

    $.post('/admin/signup/action', send).then(data => {
      if (parseInt(data)) {
        toastr['success']('The user has been registered', 'Success', {
          closeButton: true,
          tapToDismiss: false,
        });
      } else {
        toastr['warning']('The user already exists', 'Failure', {
          closeButton: true,
          tapToDismiss: false,
        });
      }
    });
  });

  companyRegister.on('submit', e => {
    e.preventDefault();

    let send = {
      firstname:  $('#register-firstname').val(),
      lastname:   $('#register-lastname').val(),
      email:      $('#register-email').val(),
      password:   $('#register-password').val(),
      company:    $('#company-name').val(),
    }

    $.post('/company/signup/action', send).then(data => {
      if (parseInt(data)) {
        toastr['success']('The user has been registered', 'Success', {
          closeButton: true,
          tapToDismiss: false,
        });
      } else {
        toastr['warning']('The user already exists', 'Failure', {
          closeButton: true,
          tapToDismiss: false,
        });
      }
    });
  });

  // Horizontal Wizard
  if (typeof registerMultiStepsWizard !== undefined && registerMultiStepsWizard !== null) {
    var numberedStepper = new Stepper(registerMultiStepsWizard),
      $form = $(registerMultiStepsWizard).find('form');
    $form.each(function () {
      var $this = $(this);
      $this.validate({
        rules: {
          firstname: {
            required: true
          },
          lastname: {
            required: true
          },
          email: {
            required: true
          },
          password: {
            required: true,
            minlength: 8
          },
          'confirm-password': {
            required: true,
            minlength: 8,
            equalTo: '#password'
          },
          'first-name': {
            required: true
          },
          'home-address': {
            required: true
          },
          addCard: {
            required: true
          }
        },
        messages: {
          password: {
            required: 'Enter new password',
            minlength: 'Enter at least 8 characters'
          },
          'confirm-password': {
            required: 'Please confirm new password',
            minlength: 'Enter at least 8 characters',
            equalTo: 'The password and its confirm are not the same'
          }
        }
      });
    });

    $(registerMultiStepsWizard)
      .find('.btn-next')
      .each(function () {
        $(this).on('click', function (e) {
          var isValid = $(this).parent().siblings('form').valid();
          if (isValid) {
            numberedStepper.next();
          } else {
            e.preventDefault();
          }
        });
      });

    $(registerMultiStepsWizard)
      .find('.btn-prev')
      .on('click', function () {
        numberedStepper.previous();
      });

    $(registerMultiStepsWizard)
      .find('.btn-submit')
      .on('click', function () {
        var isValid = $(this).parent().siblings('form').valid();
        if (isValid) {
          alert('Submitted..!!');
        }
      });
  }

  // select2
  select.each(function () {
    var $this = $(this);
    $this.wrap('<div class="position-relative"></div>');
    $this.select2({
      // the following code is used to disable x-scrollbar when click in select input and
      // take 100% width in responsive also
      dropdownAutoWidth: true,
      width: '100%',
      dropdownParent: $this.parent()
    });
  });

  // credit card

  // Credit Card
  if (creditCard.length) {
    creditCard.each(function () {
      new Cleave($(this), {
        creditCard: true,
        onCreditCardTypeChanged: function (type) {
          const elementNodeList = document.querySelectorAll('.card-type');
          if (type != '' && type != 'unknown') {
            //! we accept this approach for multiple credit card masking
            for (let i = 0; i < elementNodeList.length; i++) {
              elementNodeList[i].innerHTML =
                '<img src="' + assetsPath + 'images/icons/payments/' + type + '-cc.png" height="24"/>';
            }
          } else {
            for (let i = 0; i < elementNodeList.length; i++) {
              elementNodeList[i].innerHTML = '';
            }
          }
        }
      });
    });
  }

  // Expiry Date Mask
  if (expiryDateMask.length) {
    new Cleave(expiryDateMask, {
      date: true,
      delimiter: '/',
      datePattern: ['m', 'y']
    });
  }

  // CVV
  if (cvvMask.length) {
    new Cleave(cvvMask, {
      numeral: true,
      numeralPositiveOnly: true
    });
  }

  // phone number mask
  if (mobileNumberMask.length) {
    new Cleave(mobileNumberMask, {
      phone: true,
      phoneRegionCode: 'US'
    });
  }

  // Pincode
  if (pinCodeMask.length) {
    new Cleave(pinCodeMask, {
      delimiter: '',
      numeral: true
    });
  }

  // multi-steps registration
  // --------------------------------------------------------------------
});
