function hideTios() {
    const select = document.getElementById('type');
    const divs = document.querySelectorAll('.hide-tios');
    const divsJovem = document.querySelectorAll('.hide-jovem');

    if (select.value === '1' || select.value === '') {
        divs.forEach(div => div.style.display = '');
        divsJovem.forEach(divsJovem => divsJovem.style.display = 'none');
    } else {
        divs.forEach(div => div.style.display = 'none');
        divsJovem.forEach(divsJovem => divsJovem.style.display = '');
    }
}

// Torna a função acessível globalmente
window.hideTios = hideTios;

// Executar ao carregar a página
window.addEventListener('DOMContentLoaded', hideTios);
