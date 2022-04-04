$(function() {
  'use strict';
    $.validate({
        modules: 'file'
    });
    if ($('.wysiwyg_editor').length > 0){
        $('.wysiwyg_editor').summernote({
            tabsize: 4,
            height: 250
        });
    }
    if ($(".js-example-basic-single").length) {
        $('.js-example-basic-single').select2({
            placeholder: "--SELECT--",
        });
    }
});
function confirmDelete(delete_url) {
    bootbox.confirm({
        size: 'large',
        message: "Are you sure you want to delete ?",
        buttons: {
            confirm: {
                label: "Yes",
                className: 'btn-success btn-sm'
            },
            cancel: {
                label: "No",
                className: 'btn-danger btn-sm'
            }
        },
        callback: function (result) {
            if (result === true) {
                window.location = delete_url;
            }
        }
    });
}
