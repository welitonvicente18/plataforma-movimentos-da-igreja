document.addEventListener('DOMContentLoaded', function () {

    if (document.getElementById('telephone')) {

        const telInput = document.getElementById('telephone');

        telInput.addEventListener('input', function (e) {
            let value = e.target.value;

            // Remove tudo que não for número
            value = value.replace(/\D/g, '');

            // Aplica a máscara dinâmica
            if (value.length > 10) {
                // Celular com 9 dígitos
                value = value.replace(/^(\d{2})(\d{5})(\d{4}).*/, '($1) $2-$3');
            } else if (value.length > 5) {
                // Fixo com 8 dígitos
                value = value.replace(/^(\d{2})(\d{4})(\d{0,4}).*/, '($1) $2-$3');
            } else if (value.length > 2) {
                value = value.replace(/^(\d{2})(\d{0,5})/, '($1) $2');
            } else {
                value = value.replace(/^(\d*)/, '($1');
            }

            e.target.value = value;
        });
    }
});
