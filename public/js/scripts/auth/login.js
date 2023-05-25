/*=========================================================================================
  File Name: auth-login.js
  Description: Auth login js file.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
  'use strict';

  var pageLoginForm = $('.auth-login-form');

  var adminLogin = $('#admin-login'),
    companyLogin = $('#company-login');

  // jQuery Validation
  // --------------------------------------------------------------------
  if (pageLoginForm.length) {
    pageLoginForm.validate({
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
        'login-email': {
          required: true,
          email: true
        },
        'login-password': {
          required: true
        }
      }
    });

    adminLogin.on('submit', e => {
<<<<<<< HEAD
        e.preventDefault();

        let send = {
          email: $('#login-email').val(),
          password: $('#login-password').val(),
        }

        $.post('/admin/signin/action', send).then(data => {
          if (data === '0') {
            toastr['warning']('The user doesn\'t exist', 'Failure', {
              closeButton: true,
              tapToDismiss: false,
            });
          }
          else if (data === '1') {
            toastr['warning']('Password incrrect', 'Failure', {
              closeButton: true,
              tapToDismiss: false,
            });
          }
          else if (data === '2') {
            window.location.assign('/');
          }
        })
      })

      companyLogin.on('submit', e => {
        e.preventDefault();

        let send = {
          email: $('#login-email').val(),
          password: $('#login-password').val(),
        }

        $.post('/company/signin/action', send).then(data => {
          if (data === '0') {
            toastr['warning']('The user doesn\'t exist', 'Failure', {
              closeButton: true,
              tapToDismiss: false,
            });
          }
          else if (data === '1') {
            toastr['warning']('Password incrrect', 'Failure', {
              closeButton: true,
              tapToDismiss: false,
            });
          }
          else if (data === '2') {
            window.location.assign('/');
          }
        })
      })
=======
      e.preventDefault();

      let send = {
        email: $('#login-email').val(),
        password: $('#login-password').val(),
      }

      $.post('/admin/signin/action', send).then(data => {
        if (data === '0') {
          toastr['warning']('The user doesn\'t exist', 'Failure', {
            closeButton: true,
            tapToDismiss: false,
          });
        }
        else if (data === '1') {
          toastr['warning']('Password incrrect', 'Failure', {
            closeButton: true,
            tapToDismiss: false,
          });
        }
        else if (data === '2') {
          window.location.assign('/admin');
        }
      })
    })

    companyLogin.on('submit', e => {
      e.preventDefault();

      let send = {
        email: $('#login-email').val(),
        password: $('#login-password').val(),
      }

      $.post('/company/signin/action', send).then(data => {
        if (data === '0') {
          toastr['warning']('The user doesn\'t exist', 'Failure', {
            closeButton: true,
            tapToDismiss: false,
          });
        }
        else if (data === '1') {
          toastr['warning']('Password incrrect', 'Failure', {
            closeButton: true,
            tapToDismiss: false,
          });
        }
        else if (data === '2') {
          window.location.assign('/company');
        }
      })
    })
>>>>>>> 70e0a31e3c9292ec60b09016e2c2fc3068638002
  }
});
