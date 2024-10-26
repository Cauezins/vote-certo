<div class="content" id="content">
    <x-nav-profile-admin :name="$name" :image_profile="$imageProfile" />

    <div class="content-dashboard">
        <div class="my-3">
            Home / Eleiçoes
        </div>
        <div class="row mt-4">
            <!-- Cards -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Usuários Ativos</h5>
                        <p class="card-text">1,234</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Novos Cadastros</h5>
                        <p class="card-text">567</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vendas</h5>
                        <p class="card-text">R$ 12,345</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Comentários</h5>
                        <p class="card-text">89</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Conteúdo da dashboard -->
        <div class="row mt-4 d-flex justify-content-end">
            <div class="d-flex justify-content-end">
                <button class="btn btn-dark criar-item" style="padding: 5px 13px 10px 13px;" data-bs-toggle="modal"
                    data-bs-target="#modalUser"><i class="bi bi-person-plus-fill"></i></button>
            </div>

            <x-modal-election-admin id="modalUser">
            </x-modal-election-admin>

        </div>

        <div class="row mt-3 tableCustom">
            {{-- modal --}}
            <x-modal-delete-user-admin />
            <!-- HTML da Tabela -->
            <table id="example" class="table table-striped nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Data de Inicio</th>
                        <th>Data Fim</th>
                        <th>Categoria</th>
                        <th>Progresso</th>
                    </tr>
                </thead>
                <tbody id="tbodyTableUsers">
                    @foreach ($dataItems as $item)
                        <tr onclick="document.location.href = '/admin/election/{{$item['id']}}'">
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['title'] }}</td>
                            <td>{{ $item['start_date'] }}</td>
                            <td>{{ $item['end_date'] }}</td>
                            <td>{{ $item['category'] }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

    </div>
