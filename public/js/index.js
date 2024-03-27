
document.addEventListener('DOMContentLoaded', function () {
    var container = document.getElementById('propertyCreationContainer');
    var h2 = document.getElementById('toggleForm')

    var h2Form = document.getElementById('uploadDocumentTitle');
    var form = document.getElementById('uploadDocumentContainer');

    h2.addEventListener('click', function () {
        if (container.style.height === '150px') {
            container.style.height = '750px';
            if (form.style.height === '450px') {
                form.style.height = '170px';
            }
        }
        else {
            container.style.height = '150px';
        }
        
    });

    h2Form.addEventListener('click', function () {
        if (form.style.height === '170px') {
            form.style.height = '450px';
            if (container.style.height === '750px') {
                container.style.height = '150px';
            }
        }
        else {
            form.style.height = '170px';
        }
    });
});

