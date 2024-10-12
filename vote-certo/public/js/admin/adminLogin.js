$("#login-form").on("submit", (e) => {
    e.preventDefault(); // Previne o envio padrão do formulário

    const submitBtn = $("#buttonSubmit");
    const originalText = submitBtn.html(); // Armazena o texto original do botão

    // Bloquear o botão de submit e adicionar o spinner
    submitBtn.attr("disabled", true);
    submitBtn.html(`
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    `);

    const formData = new FormData(document.getElementById("login-form"));
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    $.ajax({
        method: "POST",
        url: "/api/login",
        headers: {
            "X-CSRF-TOKEN": csrfToken, // Incluindo o token CSRF no cabeçalho
        },
        data: formData, // Enviando o FormData
        processData: false, // Não processar os dados automaticamente
        contentType: false, // Deixar o jQuery definir o Content-Type corretamente
        success: (response) => {
            // Expira em 1 hora
            const expires = 1 / 24;

            // Armazena o token JWT e o ID do usuário em cookies
            $.cookie('jwt_token', response.access_token, { expires: expires });
            $.cookie('user_id', response.user_id, { expires: expires });


            showStatusMessage(
                "success",
                "Login bem-sucedido! Redirecionando..."
            );
            // Exemplo de redirecionamento após login bem-sucedido
            setTimeout(() => {
                window.location.href = "/admin";
            }, 2000);
        },
        error: (error) => {
            showStatusMessage(
                "danger",
                "Erro ao fazer login. Verifique suas credenciais."
            );
        },
        complete: () => {
            // Habilitar o botão novamente e restaurar o texto original
            submitBtn.attr("disabled", false).html(originalText);
        },
    });
});

function showStatusMessage(type, message) {
    const msgState = $("#msgState");
    const msgContent = $("#msgContent");

    msgContent.removeClass().addClass(`alert alert-${type}`).html(message);

    msgState.fadeIn(300);

    setTimeout(() => {
        msgState.fadeOut(300);
    }, 5000);
}
