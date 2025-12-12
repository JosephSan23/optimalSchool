function validarFecha(inputName, min, max, mensaje) {
    document.addEventListener("DOMContentLoaded", function () {
        const input = document.querySelector(`input[name="${inputName}"]`);
        if (!input) return;

        input.min = min;
        input.max = max;

        input.form.addEventListener("submit", function (e) {
            if (input.value < min || input.value > max) {
                e.preventDefault();
                alert(mensaje);
            }
        })
    })
}