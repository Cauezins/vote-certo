<div class="d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center"> <!-- Grupo para o botão de menu -->
        <span class="menu-btn" id="toggleSidebar"><i class="bi bi-list" style="font-size: 30px;"></i></span>
    </div>

    <div class="profile-container" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <!-- Grupo para o perfil -->
        <img src="{{Storage::url($imageProfile)}}" alt="Foto do perfil" class="profile-pic">
        <span class="profile-name">{{ $name }}</span>
        <!-- Menu dropdown com opções -->
        <div class="dropdown">
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">Configurações</a></li>
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" onclick="logout()">Sair</a></li>
            </ul>
        </div>
    </div>
</div>
