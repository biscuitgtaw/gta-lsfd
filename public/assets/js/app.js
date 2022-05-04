/*
Application: Antelope.io
Author: Oliver (Redbully14urh@gmail.com)
NOTE: This file contains all the application-wide javascript for the entire website.
*/

/*----------------------------------------------
Index Of Script
------------------------------------------------
:: Ajax CSRF Setup
:: Toastr Setup
:: global displayErrors function
:: global clearForm function
:: global clearErrors function
------------------------------------------------
Index Of Script
----------------------------------------------*/

const base_url = window.location.origin;

/*---------------------------------------------------------------------
Ajax CSRF Setup
-----------------------------------------------------------------------*/
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

/*---------------------------------------------------------------------
Toastr Setup
-----------------------------------------------------------------------*/
toastr.options = {
  // tap to dismiss
  tapToDismiss: true,

  // toast class
  toastClass: 'toast',

  // container ID
  containerId: 'toast-container',

  // debug mode
  debug: false,

  // fadeIn, slideDown, and show are built into jQuery
  showMethod: 'fadeIn',

  // duration of animation
  showDuration: 300,

  // easing function
  showEasing: 'swing',

  // callback function
  onShown: undefined,
  onHidden: undefined,

  // hide animation
  hideMethod: 'fadeOut',

  // duration of animation
  hideDuration: 1000,

  // easing function
  hideEasing:'swing',

  // close animation
  closeMethod: false,

  // duration of animation
  closeDuration: false,

  // easing function
  closeEasing: false,

  // timeout in ms
  extendedTimeOut: 6000,

  // you can customize icons here
  iconClasses: {
    error: 'toast-error',
    info: 'toast-info',
    success: 'toast-success',
    warning: 'toast-warning'
  },

  // toast-top-center, toast-bottom-center, toast-top-full-width
  // toast-bottom-full-width, toast-top-left, toast-bottom-right
  // toast-bottom-left, toast-top-right
  positionClass: 'toast-top-right',

  // set timeOut and extendedTimeOut to 0 to make it sticky
  timeOut: 3000,

  // title class
  titleClass: 'toast-title',

  // message class
  messageClass: 'toast-message',

  // allows HTML content in the toast?
  escapeHtml: false,

  // target container
  target: 'body',

  // close button
  closeHtml: '<button type="button">&times;</button>',

  // place the newest toast on the top
  newestOnTop: true,

  // revent duplicate toasts
  preventDuplicates: false,

  // shows progress bar
  progressBar: true
};

/*---------------------------------------------------------------------
global displayErrors function
-----------------------------------------------------------------------*/
function displayErrors(data, form) {
    var errors = data['responseJSON'].errors;
    Object.keys(errors).forEach(error => {
        var input = form.find('input[name^='+error+']');
        var label = form.find('label[for^='+input.attr('id')+']');
        input.addClass('is-invalid');
        label.text(errors[error][0]);
    });
}

/*---------------------------------------------------------------------
global clearForm function
-----------------------------------------------------------------------*/
function clearForm(form) {
    form.find('.form-control').each(function() {
        switch($(this).attr('type')) {
            case 'input':
                $(this).val('');
                break;
            case 'checkbox':
                $(this).prop('checked', false);
                break;
            case 'select':
                $(this).val('');
                break;
        }
    });
}

/*---------------------------------------------------------------------
global clearErrors function
-----------------------------------------------------------------------*/
function clearErrors(form) {
    form.find('.form-control').each(function() {
        var id = $(this).attr('id');
        if($(this).hasClass('is-invalid')) {
            $(this).removeClass('is-invalid');
        }
        var label = form.find('label[for^='+id+']').text('');
    });


}

/*---------------------------------------------------------------------
global zeroFill function
-----------------------------------------------------------------------*/
function zeroFill( number, width )
{
    width -= number.toString().length;
    if ( width > 0 )
    {
        return new Array( width + (/\./.test( number ) ? 2 : 1) ).join( '0' ) + number;
    }
    return number + ""; // always return a string
}
