document.addEventListener("DOMContentLoaded", function (event) {
    document.getElementById('login-form').addEventListener('submit', async (e) => {
        e.preventDefault(); // Previne o envio padrão do formulário

        const email = e.target.elements.email.value;
        const password = e.target.elements.password.value;
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const response = await fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Incluindo o token CSRF no cabeçalho
                },
                body: JSON.stringify({ email: email, password: password })
            });

            const data = await response.json();

            if (data.access_token) {
                const now = new Date();
                const expires = new Date(now.getTime() + 60 * 60 * 1000).toUTCString(); // Cookie válido por 1 hora

                // Armazena o token JWT e o ID do usuário em cookies
                document.cookie = `jwt_token=${data.access_token}; path=/; expires=${expires};`; // sem HttpOnly
                document.cookie = `user_id=${data.user_id}; path=/; expires=${expires};`;


                console.log(document.cookie);
                alert('Logado com sucesso!');
                window.location.href = '/admin';  // Redireciona o usuário para a página de admin
            } else {
                alert('Falha no login');
            }
        } catch (error) {
            console.error('Erro ao fazer login:', error);
            alert('Ocorreu um erro ao tentar fazer login');
        }
    });
});
