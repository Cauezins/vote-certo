<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Completa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/electionsSettingsAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboardAdmin.css') }}">
</head>

<body>
    @php
        if (isset($dataElection->id)) {
            $idElection = $dataElection->id;
        } else {
            $idElection = null;
        }
    @endphp


    <x-side-bar-admin :position="$user->position" :view="$view" :dataElections="$dataElections" :idElection="$dataElection->id" />
    <div class="content" id="content">
        <x-nav-profile-admin :name="$user->name" :image_profile="$user->img_profile" />
        @if ($dataElection == 'error')
            <div class="col-md-12 tableCustom mt-3" style="padding: 60px">
                <div class="col-md-12 d-flex justify-content-center">
                    <i class="bi bi-exclamation-triangle" style="font-size: 55px"></i>
                </div>
                <div class="col-md-12 d-flex justify-content-center mt-2">
                    <b style="width: 400px; text-align:center; display: block;">Este link de acesso não é válido, tente
                        acessar novamente por <a href="">Aqui</a></a></b>
                </div>
            </div>
        @elseif(!isset($dataElection->id))
            <div class="col-md-12 tableCustom mt-3" style="padding: 60px">
                <div class="col-md-12 d-flex justify-content-center">
                    <i class="bi bi-exclamation-circle" style="font-size: 55px;"></i>
                </div>
                <div class="col-md-12 d-flex justify-content-center mt-2">
                    <b style="width: 400px; text-align:center; display: block;">Você está tentando acessar uma eleição
                        que
                        você não possui
                        permissão. Se ouve um equivoco, entre em contato com o suporte <a href="">Aqui.</a></b>
                </div>
            </div>
        @else
            <div class="my-3">
                Home / <a href="/admin/elections">Eleiçoes</a> / <a
                    href="/admin/election/{{ Crypt::encryptString($dataElection->id) }}">{{ $dataElection->title }}</a>
                / Configurações
            </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="config-tab" data-bs-toggle="tab" data-bs-target="#configContent"
                        type="button" role="tab" aria-controls="configContent"
                        aria-selected="true">Configurações</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="style-tab" data-bs-toggle="tab" data-bs-target="#styleContent"
                        type="button" role="tab" aria-controls="styleContent"
                        aria-selected="false">Estilização</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="style-tab" data-bs-toggle="tab" data-bs-target="#styleContentNav"
                        type="button" role="tab" aria-controls="styleContent" aria-selected="false">Estilização
                        2</button>
                </li>
            </ul>

            <!-- Conteúdo das Abas -->
            <div class="tab-content mt-3">
                <!-- Conteúdo da Aba Configurações -->
                <div class="tab-pane fade show active" id="configContent" role="tabpanel" aria-labelledby="config-tab">
                    <div class="col-md-12 tableCustom mt-3 p-4">
                        <div class="row">
                            <h5>Configuração</h5>
                            <div class="col-md-4">
                                <label for="titleInputModal">Nome:</label>
                                <input type="text" class="form-control" id="titleInputModal"
                                    placeholder="Eleiçoes CIPA" name="title" autocomplete="false"
                                    value="{{ $dataElection->title }}">

                            </div>
                            <div class="col-md-2">
                                <label for="categoryInputModal">Categoria:</label>
                                <select class="form-control" name="category" id="categoryInputModal"
                                    autocomplete="false">
                                    <option value="Public" {{ $dataElection->category == 'public' ? 'selected' : '' }}>
                                        Publica
                                    </option>
                                    <option value="Private"
                                        {{ $dataElection->category == 'private' ? 'selected' : '' }}>Privada
                                    </option>
                                    <option value="Corporate"
                                        {{ $dataElection->category == 'corporate' ? 'selected' : '' }}>
                                        Coorporação
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="startDateInputModal">Data de Inicio:</label>
                                <input type="datetime-local" class="form-control" id="startDateInputModal"
                                    name="start_date" value="{{ $dataElection->start_date }}">

                            </div>
                            <div class="col-md-3">
                                <label for="endDateInputModal">Data de Termino:</label>
                                <input type="datetime-local" class="form-control" id="endDateInputModal"
                                    name="end_date" value="{{ $dataElection->end_date }}">

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Navbar Configuration -->
                            <div class="tableCustom mt-3 p-4">
                                <div class="d-flex flex-wrap justify-content-between">
                                    <h5>Usuarios</h5>
                                    <div class="col-12">
                                        <form id="userForm" class="row g-3">
                                            <div class="col-md-5">
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Digite o email" required>
                                            </div>
                                            <div class="col-md-5">
                                                <select class="form-select" id="cargo" required>
                                                    <option value="">Selecione o cargo</option>
                                                    <option value="Administrador">Administrador</option>
                                                    <option value="Usuário">Usuário</option>
                                                    <option value="Gerente">Gerente</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit"
                                                    class="btn btn-primary w-100">Adicionar</button>
                                            </div>
                                        </form>

                                    </div>
                                    <div class="col-12">
                                        <div class="row g-3">
                                            <div class="col-md-5">
                                                <div class="form-control" style="height: 37px"></div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-control" style="height: 37px"></div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-control" style="height: 37px"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-4">


                            <div class="col-md-12">
                                <!-- Navbar Configuration -->
                                <div class="tableCustom mt-3 p-4">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <h5>Configuraçoes gerais</h5>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-start align-items-center">

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input large-switch" type="checkbox"
                                                        id="darkMode">
                                                    <label class="form-check-label" for="darkMode"></label>
                                                </div>
                                                <span>Modo Escuro</span>
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center">

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input large-switch" type="checkbox"
                                                        id="darkMode">
                                                    <label class="form-check-label" for="darkMode"></label>
                                                </div>
                                                <span>Modo Escuro</span>
                                            </div>

                                            <div class="d-flex justify-content-start align-items-center">

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input large-switch" type="checkbox"
                                                        id="darkMode">
                                                    <label class="form-check-label" for="darkMode"></label>
                                                </div>
                                                <span>Modo Escuro</span>
                                            </div>

                                            <div class="d-flex justify-content-start align-items-center">

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input large-switch" type="checkbox"
                                                        id="darkMode">
                                                    <label class="form-check-label" for="darkMode"></label>
                                                </div>
                                                <span>Modo Escuro</span>
                                            </div>

                                            <div class="d-flex justify-content-start align-items-center">

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input large-switch" type="checkbox"
                                                        id="darkMode">
                                                    <label class="form-check-label" for="darkMode"></label>
                                                </div>
                                                <span>Modo Escuro</span>
                                            </div>

                                            <div class="d-flex justify-content-start align-items-center">

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input large-switch" type="checkbox"
                                                        id="darkMode">
                                                    <label class="form-check-label" for="darkMode"></label>
                                                </div>
                                                <span>Modo Escuro</span>
                                            </div>

                                            <div class="d-flex justify-content-start align-items-center">

                                                <div class="form-check form-switch">
                                                    <input class="form-check-input large-switch" type="checkbox"
                                                        id="darkMode">
                                                    <label class="form-check-label" for="darkMode"></label>
                                                </div>
                                                <span>Modo Escuro</span>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 tableCustom mt-3 p-4">
                                <div class="row">
                                    <div class="d-flex flex-wrap justify-content-between">
                                        <h5>Configuraçoes Admin</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Conteúdo da Aba Estilização -->
                <div class="tab-pane fade" id="styleContent" role="tabpanel" aria-labelledby="style-tab">
                    <div class="row">
                        <!-- Configurações de Estilo -->
                        <div class="col-md-8">
                            <div class="tableCustom mt-3 p-4">
                                <h5>Configurações de Estilo</h5>
                                <div class="row mt-3">
                                    <!-- Cores Principais -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cor Principal</label>
                                        <div class="input-group">
                                            <input type="color" class="form-control form-control-color"
                                                id="primaryColor" value="#0d6efd">
                                            <input type="text" class="form-control" value="#0d6efd"
                                                id="primaryColorText">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cor Secundária</label>
                                        <div class="input-group">
                                            <input type="color" class="form-control form-control-color"
                                                id="secondaryColor" value="#6c757d">
                                            <input type="text" class="form-control" value="#6c757d"
                                                id="secondaryColorText">
                                        </div>
                                    </div>

                                    <!-- Logo Upload -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Logo da Eleição</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="logoUpload"
                                                accept="image/*">
                                            <button class="btn btn-outline-secondary" type="button">Upload</button>
                                        </div>
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="showSystemLogo"
                                                checked>
                                            <label class="form-check-label" for="showSystemLogo">
                                                Exibir logo do sistema junto com a personalizada
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Configurações da Tela de Login -->
                                    <div class="col-12">
                                        <h6 class="mb-3">Personalização da Tela de Login</h6>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cor de Fundo Login</label>
                                        <div class="input-group">
                                            <input type="color" class="form-control form-control-color"
                                                id="loginBgColor" value="#f8f9fa">
                                            <input type="text" class="form-control" value="#f8f9fa"
                                                id="loginBgColorText">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cor do Cartão de Login</label>
                                        <div class="input-group">
                                            <input type="color" class="form-control form-control-color"
                                                id="loginCardColor" value="#ffffff">
                                            <input type="text" class="form-control" value="#ffffff"
                                                id="loginCardColorText">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cor do Botão de Login</label>
                                        <div class="input-group">
                                            <input type="color" class="form-control form-control-color"
                                                id="loginButtonColor" value="#0d6efd">
                                            <input type="text" class="form-control" value="#0d6efd"
                                                id="loginButtonColorText">
                                        </div>
                                    </div>

                                    <!-- CSS Personalizado -->
                                    <div class="col-12 mb-3">
                                        <label class="form-label">CSS Personalizado</label>
                                        <textarea class="form-control" id="customCss" rows="4" placeholder="Insira seu CSS personalizado aqui"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Preview -->
                        <div class="col-md-4">
                            <div class="tableCustom mt-3 p-4">
                                <h5>Pré-visualização</h5>
                                <div class="preview-container mt-3">
                                    <!-- Preview Login -->
                                    <div class="preview-login-screen p-3" id="previewLogin"
                                        style="background-color: #f8f9fa; border-radius: 8px;">
                                        <div class="preview-login-card p-3"
                                            style="background-color: white; border-radius: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                                            <div class="text-center mb-3">
                                                <img src="/api/placeholder/120/60" alt="Logo Preview" class="mb-2">
                                                <h6>Login Eleição</h6>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Usuário" disabled>
                                            </div>
                                            <div class="mb-2">
                                                <input type="password" class="form-control form-control-sm"
                                                    placeholder="Senha" disabled>
                                            </div>
                                            <button class="btn btn-primary btn-sm w-100" disabled>Entrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="styleContentNav" role="tabpanel" aria-labelledby="style-tab">
                    <div class="row">
                        <!-- Configurações de Estilo -->
                        <div class="col-md-8">
                            <!-- Navbar Configuration -->
                            <div class="tableCustom mt-3 p-4">
                                <h5>Configuração da Barra de Navegação</h5>
                                <div class="row mt-3">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cor de Fundo da Navbar</label>
                                        <div class="input-group">
                                            <input type="color" class="form-control form-control-color"
                                                id="navbarBgColor" value="#ffffff">
                                            <input type="text" class="form-control" value="#ffffff"
                                                id="navbarBgColorText">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cor do Texto da Navbar</label>
                                        <div class="input-group">
                                            <input type="color" class="form-control form-control-color"
                                                id="navbarTextColor" value="#000000">
                                            <input type="text" class="form-control" value="#000000"
                                                id="navbarTextColorText">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cor de Hover dos Links</label>
                                        <div class="input-group">
                                            <input type="color" class="form-control form-control-color"
                                                id="navbarHoverColor" value="#0d6efd">
                                            <input type="text" class="form-control" value="#0d6efd"
                                                id="navbarHoverColorText">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Cor da Borda Inferior</label>
                                        <div class="input-group">
                                            <input type="color" class="form-control form-control-color"
                                                id="navbarBorderColor" value="#dee2e6">
                                            <input type="text" class="form-control" value="#dee2e6"
                                                id="navbarBorderColorText">
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input large-switch" type="checkbox"
                                                id="navbarShadow" checked>
                                            <label class="form-check-label" for="navbarShadow">Adicionar Sombra na
                                                Navbar</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input large-switch" type="checkbox"
                                                id="navbarSticky" checked>
                                            <label class="form-check-label" for="navbarSticky">Navbar Fixa no
                                                Topo</label>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Altura da Navbar (px)</label>
                                        <input type="range" class="form-range" id="navbarHeight" min="50"
                                            max="100" value="60">
                                        <div class="text-end">
                                            <small class="text-muted" id="navbarHeightValue">60px</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Existing Style Configuration -->
                            <div class="tableCustom mt-3 p-4">
                                <h5>Configurações de Estilo</h5>
                                <div class="row mt-3">
                                    <!-- [Previous color and logo configuration remains the same] -->
                                </div>
                            </div>
                        </div>

                        <!-- Preview -->
                        <div class="col-md-4">
                            <div class="tableCustom mt-3 p-4">
                                <h5>Pré-visualização</h5>
                                <div class="preview-container mt-3">
                                    <!-- Navbar Preview -->
                                    <div class="preview-navbar mb-3" id="previewNavbar"
                                        style="transform: scale(0.8); transform-origin: top center;">
                                        <nav class="navbar navbar-expand preview-nav"
                                            style="background-color: #ffffff; min-height: 60px; width: 100%; border-bottom: 1px solid #dee2e6;">
                                            <div class="container-fluid">
                                                <a class="navbar-brand" href="#">
                                                    <img src="/api/placeholder/40/40" alt="Logo"
                                                        class="d-inline-block align-text-top me-2">
                                                    Nome da Eleição
                                                </a>
                                                <div class="navbar-nav ms-auto">
                                                    <a class="nav-link active" href="#">Início</a>
                                                    <a class="nav-link" href="#">Votação</a>
                                                    <a class="nav-link" href="#">Resultados</a>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>

                                    <!-- Login Preview -->
                                    <div class="preview-login-screen" id="previewLogin"
                                        style="background-color: #f8f9fa; border-radius: 8px;">
                                        <!-- [Previous login preview content remains the same] -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/admin/admin.js') }}"></script>
    <script src="{{ asset('js/admin/sidebar.js') }}"></script>
    <script src="{{ asset('js/admin/electionsSettingsAdmin.js') }}"></script>


</body>

</html>
