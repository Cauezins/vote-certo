
function updateNavbarPreview() {
    const navbar = document.querySelector('.preview-nav');
    const navLinks = navbar.querySelectorAll('.nav-link');

    // Update colors
    navbar.style.backgroundColor = document.getElementById('navbarBgColor').value;
    navbar.style.borderBottomColor = document.getElementById('navbarBorderColor').value;

    // Update text color
    const textColor = document.getElementById('navbarTextColor').value;
    navbar.style.color = textColor;
    navbar.querySelector('.navbar-brand').style.color = textColor;
    navLinks.forEach(link => link.style.color = textColor);

    // Update height
    const height = document.getElementById('navbarHeight').value;
    navbar.style.minHeight = `${height}px`;
    document.getElementById('navbarHeightValue').textContent = `${height}px`;

    // Update shadow
    navbar.style.boxShadow = document.getElementById('navbarShadow').checked
        ? '0 2px 4px rgba(0,0,0,0.1)'
        : 'none';

    // Add hover effect styles
    const styleSheet = document.styleSheet || (function() {
        const style = document.createElement("style");
        document.head.appendChild(style);
        return style.sheet;
    })();

    const hoverColor = document.getElementById('navbarHoverColor').value;
    const hoverRule = `.preview-nav .nav-link:hover { color: ${hoverColor} !important; }`;

    // Remove old hover rule if exists and add new one
    try {
        styleSheet.deleteRule(0);
    } catch (e) {}
    styleSheet.insertRule(hoverRule, 0);
}

// Event listeners for navbar configuration
document.addEventListener('DOMContentLoaded', () => {
    // Previous event listeners remain

    // Add navbar-specific listeners
    document.getElementById('navbarBgColor').addEventListener('input', updateNavbarPreview);
    document.getElementById('navbarTextColor').addEventListener('input', updateNavbarPreview);
    document.getElementById('navbarHoverColor').addEventListener('input', updateNavbarPreview);
    document.getElementById('navbarBorderColor').addEventListener('input', updateNavbarPreview);
    document.getElementById('navbarHeight').addEventListener('input', updateNavbarPreview);
    document.getElementById('navbarShadow').addEventListener('change', updateNavbarPreview);
    document.getElementById('navbarSticky').addEventListener('change', updateNavbarPreview);

    // Initialize navbar preview
    updateNavbarPreview();
});
</script>

<script>
// Função para atualizar o texto do input quando a cor é alterada
function setupColorInputs() {
    const colorInputs = document.querySelectorAll('input[type="color"]');
    colorInputs.forEach(input => {
        const textInput = document.getElementById(input.id + 'Text');
        if (textInput) {
            input.addEventListener('input', (e) => {
                textInput.value = e.target.value.toUpperCase();
                updatePreview();
            });
            textInput.addEventListener('input', (e) => {
                if (e.target.value.match(/^#[0-9A-Fa-f]{6}$/)) {
                    input.value = e.target.value;
                    updatePreview();
                }
            });
        }
    });
}

// Função para atualizar a pré-visualização
function updatePreview() {
    const loginBgColor = document.getElementById('loginBgColor').value;
    const loginCardColor = document.getElementById('loginCardColor').value;
    const loginButtonColor = document.getElementById('loginButtonColor').value;

    const previewLogin = document.getElementById('previewLogin');
    const previewCard = previewLogin.querySelector('.preview-login-card');
    const previewButton = previewLogin.querySelector('.btn-primary');

    previewLogin.style.backgroundColor = loginBgColor;
    previewCard.style.backgroundColor = loginCardColor;
    previewButton.style.backgroundColor = loginButtonColor;
    previewButton.style.borderColor = loginButtonColor;
}

// Inicializar os eventos quando o documento estiver pronto
document.addEventListener('DOMContentLoaded', () => {
    setupColorInputs();
    updatePreview();
});