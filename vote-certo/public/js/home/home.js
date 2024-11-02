// Inicializar AOS
AOS.init({
    duration: 800,
    once: true
});

// Função para fechar o banner
function closeBanner() {
    document.getElementById('attention-banner').style.display = 'none';
}

setTimeout(() => {
    closeBanner()
}, 5000);

// Calculadora de Orçamento
function calcularOrcamento() {
    const eleitores = parseInt(document.getElementById('eleitoresRange').value);
    const duracao = parseInt(document.getElementById('duracaoRange').value);

    let preco = eleitores * 1.3;
    preco += duracao * 3;


    document.getElementById('precoTotal').textContent =
        `R$ ${preco.toLocaleString('pt-BR', {minimumFractionDigits: 2})}`;
}

// Event listeners para a calculadora
if (document.getElementById('eleitoresRange')) {
    document.getElementById('eleitoresRange').addEventListener('input', function(e) {
        document.getElementById('eleitoresValue').textContent = `${e.target.value} eleitores`;
        calcularOrcamento();
    });
}

if (document.getElementById('duracaoRange')) {
    document.getElementById('duracaoRange').addEventListener('input', function(e) {
        document.getElementById('duracaoValue').textContent = `${e.target.value} dias`;
        calcularOrcamento();
    });
}

['recursoEmail', 'recursoSMS', 'recursoRelatorios'].forEach(id => {
    if (document.getElementById(id)) {
        document.getElementById(id).addEventListener('change', calcularOrcamento);
    }
});

// Calcular orçamento inicial
if (document.getElementById('precoTotal')) {
    calcularOrcamento();
}

function checkScroll() {
    const navbar = document.querySelector('.navbar');
    const heroSection = document.querySelector('.hero-section');
    const heroBottom = heroSection.offsetTop + heroSection.offsetHeight;

    if (window.scrollY > 50) {
        navbar.classList.add('navbar-scrolled');
    } else {
        navbar.classList.remove('navbar-scrolled');
    }
}

// Adicionar listeners para o scroll
window.addEventListener('scroll', checkScroll);
window.addEventListener('load', checkScroll);
window.addEventListener('resize', checkScroll);
