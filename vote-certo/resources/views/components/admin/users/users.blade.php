<div class="content" id="content">

    <x-nav-profile-admin :name="$name" :image_profile="$imageProfile" />
    <div class="content-dashboard">
        <div class="my-3">
            Home / Usuarios
        </div>
        <div class="row mt-4" style="--bs-gutter-x: 0;">
            <!-- Cards -->
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 float-left"></i>
                                </div>
                                <div class="media-body text-right">
                                    <h3>278</h3>
                                    <span>New Posts</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">156</h3>
                                    <span>New Clients</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-user success font-large-2 float-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success">64.89 %</h3>
                                    <span>Bounce Rate</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-cup success font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Conteúdo da dashboard -->
        <div class="row mt-4" style="--bs-gutter-x: 0;">
            <div class="d-flex justify-content-end">
                <button class="btn btn-dark criar-item" style="padding: 5px 13px 10px 13px;"
                    data-image="{{ Storage::url('profile_images/image_default.jpg') }}"><i
                        class="bi bi-person-plus-fill"></i></button>
            </div>

            <x-modal-user-admin id="modalUser" :image_profile="$imageProfile">
            </x-modal-user-admin>

        </div>

        <div class="row mt-3 tableCustom p-4" style="--bs-gutter-x: 0;">
            {{-- modal --}}
            <x-modal-delete-user-admin />
            <!-- HTML da Tabela -->
            <table id="example" class="table nowrap dataTable" style="width:100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Cargo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="tbodyTableUsers">
                    @foreach ($dataItems as $item)
                        <tr>
                            <td>
                                <img src="{{ Storage::url($item['img_profile']) }}" id="table-image-preview"
                                    alt="">
                            </td>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>

                            <td>
                                @if ($item['position'] == 1)
                                    <span class="badge text-bg-primary">Usuário</span>
                                @elseif($item['position'] == 50)
                                    <span class="badge text-bg-info">Suporte</span>
                                @elseif($item['position'] == 99)
                                    <span class="badge text-bg-success">Administrador</span>
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-light me-2 edit-item" data-id="{{ $item['id'] }}"
                                    data-name="{{ $item['name'] }}" data-email="{{ $item['email'] }}"
                                    data-position="{{ $item['position'] }}"
                                    data-image="{{ Storage::url($item['img_profile']) }}">
                                    <i class="bi bi-pencil-square"></i></button>

                                <button class="btn btn-sm btn-light delete-item" data-id="{{ $item['id'] }}"
                                    data-name="{{ $item['name'] }}"><i class="bi bi-trash-fill"></i></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

    </div>

</div>
