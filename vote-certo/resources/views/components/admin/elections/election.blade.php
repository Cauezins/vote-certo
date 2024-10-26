<div class="content" id="content">
    <x-nav-profile-admin :name="$name" :image_profile="$imageProfile" />
    @if ($idEle == 'error')
        <div class="col-md-12 tableCustom mt-3" style="padding: 60px">
            <div class="col-md-12 d-flex justify-content-center">
                <i class="bi bi-exclamation-triangle" style="font-size: 55px"></i>
            </div>
            <div class="col-md-12 d-flex justify-content-center mt-2">
                <b style="width: 400px; text-align:center; display: block;">Este link de acesso não é válido, tente
                    acessar novamente por <a href="">Aqui</a></a></b>
            </div>
        </div>
    @elseif(!isset($idEle->id))
        <div class="col-md-12 tableCustom mt-3" style="padding: 60px">
            <div class="col-md-12 d-flex justify-content-center">
                <i class="bi bi-exclamation-circle" style="font-size: 55px;"></i>
            </div>
            <div class="col-md-12 d-flex justify-content-center mt-2">
                <b style="width: 400px; text-align:center; display: block;">Você está tentando acessar uma eleição que
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
                        name="title" autocomplete="false" value="{{$idEle->title}}">

                </div>
                <div class="col-md-2">
                    <label for="categoryInputModal">Categoria:</label>
                    <select class="form-control" name="category" id="categoryInputModal" autocomplete="false">
                        <option value="Public" {{ $idEle->category == 'Public' ? 'selected' : '' }}>Publica</option>
                        <option value="Private" {{ $idEle->category == 'Private' ? 'selected' : '' }}>Privada</option>
                        <option value="Corporate" {{ $idEle->category == 'Corporate' ? 'selected' : '' }}>Coorporação</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="startDateInputModal">Data de Inicio:</label>
                    <input type="datetime-local" class="form-control" id="startDateInputModal" name="start_date"  value="{{$idEle->start_date}}">

                </div>
                <div class="col-md-3">
                    <label for="endDateInputModal">Data de Termino:</label>
                    <input type="datetime-local" class="form-control" id="endDateInputModal" name="end_date"  value="{{$idEle->end_date}}">

                </div>
            </div>

            <div class="row">
                <label for="titleInputModal">Responsaveis:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="titleInputModal" placeholder="Responsavel 1"
                        name="title" autocomplete="false">

                </div>
                <div class="col-md-1">
                    <select class="form-control" name="category" id="categoryInputModal" autocomplete="false">
                        <option value="Public">Admin</option>
                        <option value="Private">Editor</option>
                        <option value="Corporate">Visualizador</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="titleInputModal" placeholder="Responsavel 1"
                        name="title" autocomplete="false">

                </div>
                <div class="col-md-1">
                    <select class="form-control" name="category" id="categoryInputModal" autocomplete="false">
                        <option value="Public">Admin</option>
                        <option value="Private">Editor</option>
                        <option value="Corporate">Visualizador</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="titleInputModal" placeholder="Responsavel 1"
                        name="title" autocomplete="false">

                </div>
                <div class="col-md-1">
                    <select class="form-control" name="category" id="categoryInputModal" autocomplete="false">
                        <option value="Public">Admin</option>
                        <option value="Private">Editor</option>
                        <option value="Corporate">Visualizador</option>
                    </select>
                </div>

            </div>
        </div>
        <div class="col-md-12 d-flex justify-content-between flex-wrap">
            <div class="col-md-6 tableCustom mt-3 p-4">
                <div class="d-flex justify-content-between">
                    <h5>
                        Candidatos
                    </h5>
                    <button class="btn btn-dark criar-item" style="padding: 5px 13px 10px 13px;" data-bs-toggle="modal"
                        data-bs-target="#modalUser"><i class="bi bi-person-plus-fill"></i></button>
                </div>
            </div>
            <div class="col-md-5 tableCustom mt-3 p-4">
                <div class="d-flex justify-content-between">
                    <h5>
                        Eleitores
                    </h5>
                    <button class="btn btn-dark criar-item" style="padding: 5px 13px 10px 13px;" data-bs-toggle="modal"
                        data-bs-target="#modalUser"><i class="bi bi-person-plus-fill"></i></button>
                </div>
            </div>

        </div>
    @endif
</div>
