document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('calculadora-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevenir el envío del formulario para realizar el cálculo en el cliente

        const num1 = parseFloat(document.getElementById('num1').value);
        const num2 = parseFloat(document.getElementById('num2').value);
        const operacion = document.getElementById('operacion').value;
        const res = document.getElementById('res');

        if (isNaN(num1) || isNaN(num2)) {
            res.innerHTML = "Por favor ingrese números válidos.";
            if (isNaN(num1)) {
                document.getElementById('num1').focus();
            } else {
                document.getElementById('num2').focus();
            }
            return;
        }

        const formData = new FormData(form);

        fetch('process.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            res.innerHTML = data;
        })
        .catch(error => {
            res.innerHTML = "Error en la solicitud: " + error;
        });
    });
});
