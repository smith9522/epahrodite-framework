(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('validerinfos');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

AOS.init({ duration: 1200, });


function FunctionHaut() {
    window.scrollTo({ top: 0, left: 0, behavior: 'smooth' });
}