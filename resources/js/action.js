const Swal = require('sweetalert2');

/**
 * Place any jQuery/helper plugins in here.
 */
$(function () {

    /**
     * Disable all submit buttons once clicked
     */
    $('form').submit(function () {
        $(this).find('input[type="submit"]').attr('disabled', true);
        $(this).find('button[type="submit"]').attr('disabled', true);
        return true;
    });

    /**
     * Generic confirm form delete using Sweet Alert
     */
    $('body')
        .on('submit', 'form[name=delete_item]', function (e) {
            e.preventDefault();

            const form = this;
            const link = $('a[data-method="delete"]');
            const cancel = link.attr('data-trans-button-cancel') ? link.attr('data-trans-button-cancel') : 'Cancel';
            const confirm = link.attr('data-trans-button-confirm')
                ? link.attr('data-trans-button-confirm')
                : 'Yes, delete';
            const title = link.attr('data-trans-title')
                ? link.attr('data-trans-title')
                : 'Are you sure you want to delete this item?';

            Swal.fire({
                title: title,
                showCancelButton: true,
                confirmButtonText: confirm,
                cancelButtonText: cancel,
                icon: 'warning',
            }).then((result) => {
                result.value && form.submit();
            });
        })

    $('[data-toggle="tooltip"]').tooltip();
});
