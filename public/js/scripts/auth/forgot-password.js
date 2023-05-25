/*=========================================================================================
  File Name: auth-forgot-password.js
  Description: Auth forgot password js file.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var pageForgotPasswordForm = $('.auth-forgot-password-form');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageForgotPasswordForm.length) {
    pageForgotPasswordForm.validate({
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
        'forgot-password-email': {
          required: true,
          email: true
        }
      }

    });

    pageForgotPasswordForm.on('submit', e => {
      e.preventDefault();

      let send = {
        email: $('#forgot-password-email').val()
      }
      
      $.post('/post-email', send).then(data => {
        console.log(data)
      });
    });

    pageForgotPasswordForm.on('submit', e => {
        e.preventDefault();

        let send = {
          email: $('#forgot-password-email').val()
        }

        $.post('/post-email', send).then(data => {
          console.log(data)
        });
    });
  }
});
