/**
 * script for roles module
 */
$("#checkPermissionAll").click(function() {
    if ($(this).is(":checked")) {
        $('.permission-checkbox-raw-wrapper input[type=checkbox]').prop('checked', true);
    } else {
        $('.permission-checkbox-raw-wrapper input[type=checkbox]').prop('checked', false);
    }
});