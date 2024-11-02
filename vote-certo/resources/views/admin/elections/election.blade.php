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
    <link rel="stylesheet" href="{{ asset('css/admin/dashboardAdmin.css') }}">
</head>

<body>
    @php
        if ($view === 'election' || $view === 'election-setting') {
            if (isset($dataElection->id)) {
                $idElection = $dataElection->id;
            } else {
                $idElection = null;
            }
        } else {
            $idElection = null;
        }
    @endphp
    <x-side-bar-admin :position="$user->position" :view="$view" :dataElections="$dataElections" :idElection="$dataElection->id" />
    <div class="content" id="content">
        <x-nav-profile-admin :name="$user->name" :image_profile="$user->img_profile" />
        <div class="my-3">
            Home / <a href="/admin/elections">Eleiçoes</a> / {{ $dataElection->title }}
        </div>
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
            <div class="col-md-12 tableCustom mt-3 p-4">
                <div class="row">
                    <div class="col-md-4">
                        <label for="titleInputModal">Nome:</label>
                        <input type="text" class="form-control" id="titleInputModal" placeholder="Eleiçoes CIPA"
                            name="title" autocomplete="false" value="{{ $dataElection->title }}">

                    </div>
                    <div class="col-md-2">
                        <label for="categoryInputModal">Categoria:</label>
                        <select class="form-control" name="category" id="categoryInputModal" autocomplete="false">
                            <option value="Public" {{ $dataElection->category == 'Public' ? 'selected' : '' }}>Publica</option>
                            <option value="Private" {{ $dataElection->category == 'Private' ? 'selected' : '' }}>Privada
                            </option>
                            <option value="Corporate" {{ $dataElection->category == 'Corporate' ? 'selected' : '' }}>
                                Coorporação</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label for="startDateInputModal">Data de Inicio:</label>
                        <input type="datetime-local" class="form-control" id="startDateInputModal" name="start_date"
                            value="{{ $dataElection->start_date }}">

                    </div>
                    <div class="col-md-3">
                        <label for="endDateInputModal">Data de Termino:</label>
                        <input type="datetime-local" class="form-control" id="endDateInputModal" name="end_date"
                            value="{{ $dataElection->end_date }}">

                    </div>
                </div>

            </div>
            <div class="col-md-12 d-flex justify-content-between flex-wrap">
                <div class="col-md-6 tableCustom mt-3 p-4">
                    <div class="d-flex justify-content-between">
                        <h5>
                            Candidatos
                        </h5>
                        <button class="btn btn-dark criar-item" style="padding: 5px 13px 10px 13px;"
                            data-bs-toggle="modal" data-bs-target="#modalUser"><i
                                class="bi bi-person-plus-fill"></i></button>
                    </div>
                </div>
                <div class="col-md-5 tableCustom mt-3 p-4">
                    <div class="d-flex justify-content-between">
                        <h5>
                            Eleitores
                        </h5>
                        <button class="btn btn-dark criar-item" style="padding: 5px 13px 10px 13px;"
                            data-bs-toggle="modal" data-bs-target="#modalUser"><i
                                class="bi bi-person-plus-fill"></i></button>
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

</body>

</html>
