document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('start').addEventListener('change', function () {
        var startDate = this.value;
        document.getElementById('end').min = startDate;
        document.getElementById('end').value = '';
    });
});
