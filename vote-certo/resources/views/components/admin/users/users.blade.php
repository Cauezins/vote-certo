<div class="content" id="content">

    <x-nav-profile-admin :name="$name" :image_profile="$imageProfile" />
    <div class="content-dashboard">
        <div class="my-3">
            Home / Usuarios
        </div>

        <!-- Conteúdo da dashboard -->
        <div class="row mt-4">
            <div>
                <button class="btn btn-dark criar-item" style="padding: 5px 13px 10px 13px;" data-image="{{ Storage::url('profile_images/image_default.jpg') }}"><i
                        class="bi bi-person-plus-fill"></i></button>
            </div>

            <x-modal-user-admin id="modalUser" :image_profile="$imageProfile">
            </x-modal-user-admin>

        </div>

        <div class="row mt-3 tableCustom">
            {{-- modal --}}
            <x-modal-delete-user-admin />
            <!-- HTML da Tabela -->
            <table id="example" class="table table-striped nowrap" style="width:100%">
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
                                <div class="dropdown">
                                    <i class="bi bi-three-dots-vertical" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false"></i>
                                    <ul class="dropdown-menu" style="z-index: 4" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item edit-item" data-id="{{ $item['id'] }}"
                                                data-name="{{ $item['name'] }}" data-email="{{ $item['email'] }}"
                                                data-position="{{ $item['position'] }}"
                                                data-image="{{ Storage::url($item['img_profile']) }}">Editar</a></li>
                                        <li><a class="dropdown-item delete-item" href="#"
                                                data-id="{{ $item['id'] }}"
                                                data-name="{{ $item['name'] }}">Excluir</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>

    </div>

</div>
