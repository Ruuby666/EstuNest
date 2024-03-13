document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('start').addEventListener('change', function () {
        // Obtener el valor del campo de fecha de inicio
        var startDate = this.value;
        // Establecer el valor mínimo del campo de fecha de salida
        document.getElementById('end').min = startDate;
        document.getElementById('end').value = '';
    });
});
