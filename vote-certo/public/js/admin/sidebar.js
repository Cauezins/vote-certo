//Open Sub Nav-link
$('#dropdown-elections').on('click', () => {
    const dropdown = $('[data-target="#dropdown-elections"]');
    dropdown.slideToggle(400, function() {
        // Este código será executado após a animação
        if (dropdown.is(':visible')) {
            $('#dropdown-elections').html('<i class="bi bi-caret-up-fill"></i>');
        } else {
            $('#dropdown-elections').html('<i class="bi bi-caret-down-fill"></i>');
        }
    });
});

$(document).ready(function () {
    // Expressão regular para verificar a URL
    var path = window.location.pathname;
    var regex = /^\/admin\/election\/\d+$/;

    if (regex.test(path)) {
        // Caso a URL corresponda ao padrão, clique no dropdown
        $("#dropdown-elections").trigger("click"); // Substitua #dropdownMenuButton pelo seletor correto
    }
});
