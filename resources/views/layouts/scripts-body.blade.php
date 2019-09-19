<script>
window.canvass = window.canvass || {};

window.canvass.confirmAction = function(event, message) {
    var reply = confirm(message);

    if (! reply) {
        event.preventDefault();
    }
};

document.addEventListener("DOMContentLoaded", function() {
    var js_confirms = document.getElementsByClassName('js-confirm');

    for (var i = 0; i < js_confirms.length; i++) {
        var confirm_el = js_confirms[i];

        var message = confirm_el.dataset.confirm;

        if ('FORM' === confirm_el.tagName) {
            confirm_el.addEventListener('submit', function (event) {
                window.canvass.confirmAction(event, message);
            });
        } else {
            confirm_el.addEventListener('click', function (event) {
                window.canvass.confirmAction(event, message);
            });
        }
    }
});
</script>
