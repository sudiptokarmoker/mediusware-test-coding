/**
 * functions for toggle the password field at frontend
 * used in admin panel : /admin/users/{id}/edit 
 */
function toggle_password() {
    /**
     * check if this text field is active or not. if active then hide otherwise show this
     */
    if ($(".change-password").length && $(".change-password").is(":visible")) {
        $(".change-password, .change-password-confirmation").remove();
        $('.btn-toggle-password').text('Remove password chnage option');
    } else {
        let inputHtml = '<div class="form-row change-password"><label for="password">Change password</label><input autocomplete="off" type="password" class="form-control" id="password" name="password" placeholder="Enter Password"></div><div class="form-row change-password-confirmation"><label for="password_confirmation">Confirm new Password</label><input autocomplete="off" type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="type password"/></div>';
        $('.wrap-password-change').html(inputHtml);
        $('#password, #password_confirmation').val('');
        $('.btn-toggle-password').text('Open change password field');
    }
}
/**
 * Approve user
 */
function isCounsellorApprovedConfirmed(url) {
    let redirct_text = confirm("Do you want to approve this user");
    if (redirct_text === true) {
        window.location = decodeURIComponent(url);
    }
}
/**
 * Reject user
 */
function isCounsellorRejectConfirmed(url) {
    let redirct_text = confirm("Do you want to reject this user");
    if (redirct_text === true) {
        window.location = decodeURIComponent(url);
    }
}