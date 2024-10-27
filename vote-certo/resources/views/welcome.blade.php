<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voto Certo - Sistema de Eleições Empresariais</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-green: #00d657;
            --hover-green: #00b348;
        }

        .navbar {
            transition: all 0.3s ease;
            padding: 20px 0;
        }

        .navbar.navbar-scrolled {
            background-color: rgb(251, 251, 251);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }

        .navbar:not(.navbar-scrolled) .navbar-brand,
        .navbar:not(.navbar-scrolled) .nav-link {
            color: rgb(0, 0, 0);
        }

        .navbar:not(.navbar-scrolled) .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar:not(.navbar-scrolled) .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        .navbar.navbar-scrolled .navbar-brand,
        .navbar.navbar-scrolled .nav-link {
            color: #000;
        }

        .navbar .nav-link {
            transition: color 0.3s ease;
        }

        .navbar .nav-link:hover {
            color: var(--primary-green) !important;
        }

        .hero-section {
            background: linear-gradient(178deg, #64ff6254 0%, #ffffff 100%);
            color: rgb(0, 0, 0);
            padding: 120px 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .attention-banner {
            position: fixed;
            top: 80px;
            right: 20px;
            background: rgba(0, 214, 87, 0.95);
            padding: 15px 25px;
            border-radius: 10px;
            color: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            transform: translateX(200%);
            animation: slideIn 0.5s forwards;
        }

        .close-banner {
            position: absolute;
            top: 5px;
            right: 10px;
            cursor: pointer;
            font-size: 1.2rem;
        }

        .calculator-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: all 0.4s ease;
        }

        .calculator-card:hover {
            transform: translateY(-10px);
        }

        .info-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .info-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-5px);
        }

        .info-icon {
            font-size: 2.5rem;
            color: var(--primary-green);
            margin-bottom: 20px;
        }

        .testimonial-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }

        .testimonial-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .client-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .integration-section {
            padding: 80px 0;
            background-color: white;
        }

        .integration-icon {
            font-size: 3rem;
            color: var(--primary-green);
            margin-bottom: 20px;
        }

        @keyframes slideIn {
            to {
                transform: translateX(0);
            }
        }

        .price-tag {
            font-size: 2.5rem;
            color: var(--primary-green);
            font-weight: bold;
        }

        .feature-list {
            list-style: none;
            padding: 0;
        }

        .feature-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }

        .feature-list li:last-child {
            border-bottom: none;
        }

        .feature-check {
            color: var(--primary-green);
            margin-right: 10px;
        }

        .btn-custom {
            background-color: var(--primary-green);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: var(--hover-green);
            transform: translateY(-2px);
            color: white;
        }

        .btn-outline-custom {
            border: 2px solid var(--primary-green);
            color: var(--primary-green);
            padding: 12px 30px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-outline-custom:hover {
            background-color: var(--primary-green);
            color: white;
            transform: translateY(-2px);
        }

        .feature-card {
            border-radius: 15px;
            transition: transform 0.3s ease;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .stats-section {
            background-color: #f8f9fa;
            padding: 80px 0;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-green);
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-container img {
            height: 40px;
            margin-right: 10px;
        }



        .custom-shape {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            line-height: 0;
        }

        .social-links a:hover {
            color: var(--primary-green) !important;
            transform: translateY(-3px);
            display: inline-block;
        }

        .social-links a {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="logo-container">
                    <img src="{{ asset('images/system/logo-black-horizontal.svg') }}" alt="">
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Recursos</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#about">Sobre</a>
                    </li>
                    <li class="nav-item ">
                        <button class="btn" style="background-color: #00d657; color:white;">Área Administrativa</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section py-5">
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="display-4 fw-bold mb-4">Evolua as eleições da sua empresa</h1>
                    <p class="lead mb-4">Com o Voto Certo, realize eleições empresariais com total segurança e
                        transparência, simplificando e modernizando o processo de decisão.</p>
                    <button class="btn btn-lg me-3" style="background-color: #00d657; color:white;">Experimente Agora</button>
                    <button class="btn btn-lg" style="border-color: #00d657; color:#00d657;">Saiba Mais</button>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner shadow"
                            style="border-radius:100px 0 100px 0;">
                            <div class="carousel-item active">
                                <img src="{{asset('images/system/tela-admin.png')}}" class="d-block w-100"
                                    alt="Imagem ilustrativa de eleição 1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{asset('images/system/tela-login.png')}}" class="d-block w-100"
                                    alt="Imagem ilustrativa de eleição 2">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Recursos Principais</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card feature-card h-100 p-4">
                        <div class="text-center">
                            <i class="fas fa-shield-alt feature-icon"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Segurança Máxima</h5>
                            <p class="card-text">Criptografia de ponta a ponta e verificação em múltiplas camadas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card feature-card h-100 p-4">
                        <div class="text-center">
                            <i class="fas fa-chart-bar feature-icon"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Resultados em Tempo Real</h5>
                            <p class="card-text">Acompanhe a apuração dos votos instantaneamente com gráficos
                                dinâmicos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card feature-card h-100 p-4">
                        <div class="text-center">
                            <i class="fas fa-mobile-alt feature-icon"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Acesso Multiplataforma</h5>
                            <p class="card-text">Vote de qualquer dispositivo com nossa interface responsiva.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Informações -->
    <section class="info-section">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Como Funciona</h2>
            <div class="row">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="info-card">
                        <i class="fas fa-tasks info-icon"></i>
                        <h4>Configure sua Eleição</h4>
                        <p>Defina candidatos, períodos de votação e regras específicas para sua organização.</p>
                        <ul class="feature-list">
                            <li><i class="fas fa-check feature-check"></i> Personalização completa</li>
                            <li><i class="fas fa-check feature-check"></i> Interface intuitiva</li>
                            <li><i class="fas fa-check feature-check"></i> Suporte dedicado</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-card">
                        <i class="fas fa-users info-icon"></i>
                        <h4>Gerencie Eleitores</h4>
                        <p>Importe sua base de eleitores e envie credenciais seguras automaticamente.</p>
                        <ul class="feature-list">
                            <li><i class="fas fa-check feature-check"></i> Importação em massa</li>
                            <li><i class="fas fa-check feature-check"></i> Validação automática</li>
                            <li><i class="fas fa-check feature-check"></i> Gestão de acesso</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-card">
                        <i class="fas fa-chart-pie info-icon"></i>
                        <h4>Acompanhe Resultados</h4>
                        <p>Visualize estatísticas em tempo real e gere relatórios detalhados.</p>
                        <ul class="feature-list">
                            <li><i class="fas fa-check feature-check"></i> Dashboards em tempo real</li>
                            <li><i class="fas fa-check feature-check"></i> Exportação de dados</li>
                            <li><i class="fas fa-check feature-check"></i> Auditoria completa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Depoimentos -->
    <section class="testimonial-section">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">O que nossos clientes dizem</h2>
            <div class="row">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="testimonial-card">
                        <img src="/api/placeholder/80/80" alt="Cliente" class="client-image">
                        <h5>Maria Silva</h5>
                        <p class="text-muted">Diretora de RH</p>
                        <p>"O Voto Certo revolucionou nossa forma de realizar eleições internas. Processo muito mais
                            ágil e seguro."</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <img src="/api/placeholder/80/80" alt="Cliente" class="client-image">
                        <h5>João Santos</h5>
                        <p class="text-muted">Gerente de Compliance</p>
                        <p>"A transparência e a segurança do sistema nos deram total confiança no processo eleitoral."
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card">
                        <img src="/api/placeholder/80/80" alt="Cliente" class="client-image">
                        <h5>Ana Costa</h5>
                        <p class="text-muted">Presidente do Sindicato</p>
                        <p>"Conseguimos realizar nossa eleição com mais de 5000 associados sem nenhum problema."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nova Seção de Orçamento -->
    <section id="orcamento" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Calcule seu Investimento</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="calculator-card" data-aos="fade-up">
                        <div class="mb-4">
                            <label class="form-label">Número de Eleitores</label>
                            <input type="range" class="form-range" id="eleitoresRange" min="50"
                                max="1000" step="50">
                            <div class="text-end" id="eleitoresValue">500 eleitores</div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Duração da Eleição (dias)</label>
                            <input type="range" class="form-range" id="duracaoRange" min="1"
                                max="30" step="1">
                            <div class="text-end" id="duracaoValue">15 dias</div>
                        </div>

                        <div class="text-center mt-4">
                            <h3 class="mb-3">Investimento Estimado</h3>
                            <div class="price-tag floating-number" id="precoTotal">R$ 0,00</div>
                            <p class="text-muted mt-2">Valores aproximados, sujeitos a análise</p>
                            <button class="btn btn-custom mt-3">Solicitar Proposta Detalhada</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner de Oferta -->
    <div class="attention-banner" id="attention-banner">
        <span class="close-banner" onclick="closeBanner()">×</span>
        <strong>🎉 Oferta Especial!</strong>
        <p class="mb-0">20% de desconto para novos clientes</p>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
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
    </script>
</body>

</html>
