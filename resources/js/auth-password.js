"use strict";

$(function () {
    $(document).on('click', '.password-show-hide', function () {
        return false;
    }).on('mousedown', '.password-show-hide', function () {
        $(this).closest('.form-icon-wrapper').find('input').prop('type', 'text');
        return false;
    }).on('mouseup', '.password-show-hide', function () {
        $(this).closest('.form-icon-wrapper').find('input').prop('type', 'password');
        return false;
    });
});
