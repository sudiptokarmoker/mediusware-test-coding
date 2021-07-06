$("#checkPermissionAll").click(function() {
    if ($(this).is(":checked")) {
        $('.permission-checkbox-raw-wrapper input[type=checkbox]').prop('checked', true);
    } else {
        $('.permission-checkbox-raw-wrapper input[type=checkbox]').prop('checked', false);
    }
});

function checkPermissionByGroupName(selectedClassName, current_event) {
    let groupIdName = $('#' + current_event.id)
        , classCheckBox = $('.' + selectedClassName + ' input');

    if (groupIdName.is(':checked')) {
        classCheckBox.prop('checked', true);
    } else {
        classCheckBox.prop('checked', false);
    }
    permissionCheckBoxCheck();
}

function permissionGroupCheckUncheck(child_id, group_id, wrapper_id) {
    let current_check_items_count = $('.' + wrapper_id + ' input[type=checkbox]:checked').length
        , current_all_items_count = $('.' + wrapper_id + ' input[type=checkbox]').length;

    if (current_check_items_count === current_all_items_count) {
        $('.' + group_id).prop('checked', true);
    } else {
        $('.' + group_id).prop('checked', false);
    }
    permissionCheckBoxCheck();
}

function permissionCheckBoxCheck() {
    if ($('.checkbox-permission-checkbox-list:checked').length === $('.checkbox-permission-checkbox-list').length) {
        $('#checkPermissionAll').prop('checked', true);
    } else {
        $('#checkPermissionAll').prop('checked', false);
    }
}