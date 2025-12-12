function validarFecha(inputName, min, max, mensaje) {
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.querySelector(`input[name="${inputName}"]`);
        if (!input) return;

        input.min = min;
        input.max = max;

        input.addEventListener("input", function () {
            if (input.value < min || input.value > max) {
                input.setCustomValidity(mensaje);
            } else {
                input.setCustomValidity(""); // limpia el error
            }
        });

        input.form.addEventListener("submit", function (e) {
            if (input.value < min || input.value > max) {
                input.setCustomValidity(mensaje);
                input.reportValidity();
                e.preventDefault();
            } else {
                input.setCustomValidity(""); // limpia el error
            }
        })
    })
}