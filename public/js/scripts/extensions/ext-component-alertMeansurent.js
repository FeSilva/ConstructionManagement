/*=========================================================================================
	File Name: ext-component-sweet-alerts.js
	Description: A beautiful replacement for javascript alerts
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: Pixinvent
	Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
$(function () {
  'use strict'

  var basicAlert = $('#basic-alert')
  var withTitle = $('#with-title')
  var withFooter = $('#footer-alert')
  var htmlAlert = $('#html-alert')

  var positionTopStart = $('#position-top-start')
  var positionTopEnd = $('#position-top-end')
  var positionBottomStart = $('#position-bottom-start')
  var positionBottomEnd = $('#position-bottom-end')

  var bounceIn = $('#bounce-in-animation')
  var fadeIn = $('#fade-in-animation')
  var flipX = $('#flip-x-animation')
  var tada = $('#tada-animation')
  var shake = $('#shake-animation')

  var success = $('#type-success')
  var error = $('#type-error')
  var warning = $('#type-warning')
  var info = $('#type-info')

  var customImage = $('#custom-image')
  var autoClose = $('#auto-close')
  var outsideClick = $('#outside-click')
  var question = $('#prompt-function')
  var ajax = $('#ajax-request')

  var confirmText = $('#confirm-text')
  var confirmColor = $('#confirm-color')

  var assetPath = '../../../app-assets/'
  if ($('body').attr('data-framework') === 'laravel') {
    assetPath = $('body').attr('data-asset-path')
  }

  // Bottom End
  if (positionBottomEnd.length) {
    positionBottomEnd.on('click', function () {
        Swal.fire({
            title: 'Ops !',
            text: 'Módulo ainda não está finalizado, desculpe o inconviente',
            icon: 'info',
            customClass: {
                confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false
        })
    })
  }


  //--------------- Types ---------------

  // Success
  if (success.length) {
    success.on('click', function () {
      Swal.fire({
        title: 'Good job!',
        text: 'You clicked the button!',
        icon: 'success',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      })
    })
  }

  // Error
  if (error.length) {
    error.on('click', function () {
      Swal.fire({
        title: 'Error!',
        text: ' You clicked the button!',
        icon: 'error',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      })
    })
  }

  // Warning
  if (warning.length) {
    warning.on('click', function () {
      Swal.fire({
        title: 'Warning!',
        text: ' You clicked the button!',
        icon: 'warning',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      })
    })
  }

  // Info
  if (info.length) {
    info.on('click', function () {
      Swal.fire({
        title: 'Info!',
        text: 'You clicked the button!',
        icon: 'info',
        customClass: {
          confirmButton: 'btn btn-primary'
        },
        buttonsStyling: false
      })
    })
  }

  //--------------- Options ---------------



})
