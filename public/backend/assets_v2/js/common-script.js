/**
 * For when modal hide
 */
const statusDisplayModal = document.getElementById("statusDisplayModal");
statusDisplayModal.addEventListener("hidden.bs.modal", function (event) {
    $('.dialog-body').empty();
});
