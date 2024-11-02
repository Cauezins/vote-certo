<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voto Certo - Sistema de Eleições Empresariais</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/home/home.css')}}">
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
                        <button class="btn" style="background-color: #00d657; color:white;" onclick="document.location.href = '/admin/login' " >Área Administrativa</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="display-4 fw-bold mb-4">Evolua as eleições da sua empresa</h1>
                    <p class="lead mb-4">Com o Voto Certo, realize eleições empresariais com total segurança e transparência, simplificando e modernizando o processo de decisão.</p>
                    <button class="btn btn-lg btn-primary-custom me-3">Experimente Agora</button>
                    <button class="btn btn-lg btn-outline-custom">Saiba Mais</button>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="images-container">
                        <div class="floating-image">
                            <img src="{{asset('images/system/tela-admin.png')}}" alt="Dashboard">
                        </div>
                        <div class="floating-image">
                            <img src="{{asset('images/system/tela-login.png')}}" alt="Tela de Login">
                        </div>
                        <div class="floating-image">
                            <img src="{{asset('images/system/tela-admin.png')}}" alt="Painel de Controle">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4" data-aos="fade-right">
                    <h2 class="display-6 fw-bold text-success">Sobre o Voto Certo</h2>
                    <p class="lead">O Voto Certo é um sistema de eleições online desenvolvido para empresas que buscam realizar votações com total segurança, praticidade e transparência. Nossa plataforma foi projetada para simplificar processos de decisão, reduzindo a burocracia e garantindo que cada voto seja contabilizado com precisão.</p>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-3">
                            <i class="bi bi-shield-check text-success fs-4 me-2"></i>
                            <strong>Segurança</strong>: Proteção de dados e autenticação segura para garantir a integridade dos votos.
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-bar-chart-line text-success fs-4 me-2"></i>
                            <strong>Transparência</strong>: Resultados acessíveis e auditáveis em tempo real.
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-clock-history text-success fs-4 me-2"></i>
                            <strong>Praticidade</strong>: Interface intuitiva e fácil de usar, tanto para administradores quanto para eleitores.
                        </li>
                    </ul>
                    <button class="btn btn-success btn-lg mt-4">Conheça Mais Benefícios</button>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="{{asset('images/system/overview.png')}}" alt="Visão Geral do Sistema" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>


    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-item" data-aos="fade-up">
                        <div class="stat-number">50k+</div>
                        <div>Votos Processados</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="stat-number">98%</div>
                        <div>Taxa de Satisfação</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="stat-number">500+</div>
                        <div>Empresas Atendidas</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="stat-number">100%</div>
                        <div>Segurança</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <h2 class="text-center section-title" data-aos="fade-up">Recursos Principais</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="feature-card">
                        <div class="text-center">
                            <i class="fas fa-shield-alt feature-icon"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Segurança Máxima</h5>
                            <p class="card-text">Criptografia de ponta a ponta e verificação em múltiplas camadas para garantir a integridade do seu processo eleitoral.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="text-center">
                            <i class="fas fa-chart-bar feature-icon"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Resultados em Tempo Real</h5>
                            <p class="card-text">Acompanhe a apuração dos votos instantaneamente com gráficos dinâmicos e análises detalhadas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="text-center">
                            <i class="fas fa-mobile-alt feature-icon"></i>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">Acesso Multiplataforma</h5>
                            <p class="card-text">Vote de qualquer dispositivo com nossa interface responsiva e intuitiva.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section class="info-section">
        <div class="container">
            <h2 class="text-center section-title" data-aos="fade-up">Como Funciona</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="info-card">
                        <i class="fas fa-tasks info-icon"></i>
                        <h4>Configure sua Eleição</h4>
                        <p>Defina candidatos, períodos de votação e regras específicas para sua organização.</p>
                        <ul class="feature-list">
                            <li><i class="fas fa-check feature-check"></i> Personalização completa</li>
                            <li><i class="fas fa-check feature-check"></i> Interface intuitiva</li>
                            <li><i class="fas fa-check feature-check"></i> Suporte dedicado</li>
                            <li><i class="fas fa-check feature-check"></i> Múltiplos formatos de eleição</li>
                            <li><i class="fas fa-check feature-check"></i> Regras personalizáveis</li>
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
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
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
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center text-success fw-bold mb-5">Empresas que confiam no Voto Certo</h2>
            <div class="row align-items-center text-center">
                <!-- Empresa 1 -->
                <div class="col-6 col-md-3 mb-4">
                    <img src="logo1-url.png" alt="Logo Empresa 1" class="img-fluid grayscale-logo">
                </div>
                <!-- Empresa 2 -->
                <div class="col-6 col-md-3 mb-4">
                    <img src="logo2-url.png" alt="Logo Empresa 2" class="img-fluid grayscale-logo">
                </div>
                <!-- Empresa 3 -->
                <div class="col-6 col-md-3 mb-4">
                    <img src="logo3-url.png" alt="Logo Empresa 3" class="img-fluid grayscale-logo">
                </div>
                <!-- Empresa 4 -->
                <div class="col-6 col-md-3 mb-4">
                    <img src="logo4-url.png" alt="Logo Empresa 4" class="img-fluid grayscale-logo">
                </div>
                <!-- Adicione mais logos conforme necessário -->
            </div>
        </div>
    </section>


    <footer class="bg-dark text-light pt-5 pb-3">
        <div class="container">
            <div class="row">
                <!-- Logo e Descrição -->
                <div class="col-md-4 mb-3">
                    <img src="logo-url.png" alt="Voto Certo Logo" class="mb-3" style="width: 150px;">
                    <p>Simplificando as eleições corporativas com segurança, transparência e eficiência.</p>
                </div>

                <!-- Links Úteis -->
                <div class="col-md-4 mb-3">
                    <h5 class="text-uppercase text-success">Links Úteis</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-light text-decoration-none">Início</a></li>
                        <li><a href="#features" class="text-light text-decoration-none">Recursos</a></li>
                        <li><a href="#pricing" class="text-light text-decoration-none">Preços</a></li>
                        <li><a href="#contact" class="text-light text-decoration-none">Contato</a></li>
                    </ul>
                </div>

                <!-- Contato e Redes Sociais -->
                <div class="col-md-4 mb-3">
                    <h5 class="text-uppercase text-success">Contato</h5>
                    <p class="mb-1">Email: contato@votocerto.com</p>
                    <p>Telefone: (11) 1234-5678</p>
                    <div class="d-flex mt-3">
                        <a href="https://facebook.com" target="_blank" class="text-light me-3">
                            <i class="fab fa-facebook fa-2x"></i>
                        </a>
                        <a href="https://linkedin.com" target="_blank" class="text-light me-3">
                            <i class="fab fa-linkedin fa-2x"></i>
                        </a>
                        <a href="https://twitter.com" target="_blank" class="text-light">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Linha de Copyright -->
            <div class="row mt-4">
                <div class="col text-center">
                    <p class="text-muted small mb-0">© 2024 Voto Certo. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </footer>


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
    <script src="{{asset('js/home/home.js')}}"></script>
</body>

</html>
