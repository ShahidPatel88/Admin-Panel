$(function() {
  'use strict';

  $.validator.setDefaults({
    submitHandler: function(form) {
      form.submit();
    }
  });
  $(function() {
    // validate signup form on keyup and submit
    $("#password-form").validate({
      rules: {
        oldpassword: {
          required: true,
        },
        newpassword: {
          required: true,
        }
      },
      messages: {
        
        oldpassword: {
          required: "Please provide a old password",
        },
        newpassword: {
          required: "Please provide a new password",
        },
      },
      errorPlacement: function(label, element) {
        label.addClass('mt-2 text-danger');
        label.insertAfter(element);
      },
      highlight: function(element, errorClass) {
        $(element).parent().addClass('has-danger')
        $(element).addClass('form-control-danger')
      }
    });
  });
});