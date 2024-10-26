const sidebar = document.getElementById("sidebarMenu");
const content = document.getElementById("content");
const toggleSidebar = document.getElementById("toggleSidebar");
const closeSidebar = document.getElementById("closeSidebar");

// Mostrar/ocultar a sidebar ao clicar no botão "☰"
toggleSidebar.addEventListener("click", function () {
    sidebar.classList.toggle("hidden");
    sidebar.classList.toggle("show");

    // Ajustar a margem do conteúdo
    if (sidebar.classList.contains("hidden")) {
        toggleSidebar.innerHTML =
            '<i class="bi bi-arrow-right-short" style="font-size: 30px;"></i>';
        content.style.marginLeft = "0"; // Remover a margem quando a sidebar está oculta
    } else {
        toggleSidebar.innerHTML =
            '<i class="bi bi-list" style="font-size: 30px;"></i>';
        content.style.marginLeft = "300px"; // Restaurar a margem quando a sidebar está visível
    }
});

// Fechar a sidebar ao clicar no botão "✖"
closeSidebar.addEventListener("click", function () {
    sidebar.classList.remove("show");
    sidebar.classList.add("hidden");
    content.style.marginLeft = "0"; // Remover a margem quando a sidebar está oculta
});

// Verificar o tamanho da tela para esconder/exibir a sidebar
window.addEventListener("resize", function () {
    if (window.innerWidth > 992) {
        sidebar.classList.remove("hidden"); // Mostrar a sidebar automaticamente no desktop
        sidebar.classList.remove("show"); // Remover a classe 'show' para o estado mobile
        content.style.marginLeft = "300px"; // Ajustar a margem do conteúdo
        toggleSidebar.innerHTML =
            '<i class="bi bi-list" style="font-size: 30px;"></i>';
    } else {
        sidebar.classList.add("hidden"); // Ocultar a sidebar no mobile
        content.style.marginLeft = "0"; // Remover a margem no mobile
    }
});

function getCookie(name) {
    let cookie = {};

    document.cookie.split(";").forEach(function (el) {
        let [k, v] = el.split("=");
        cookie[k.trim()] = v;
    });

    return cookie[name];
}

function logout() {
    $.ajax({
        method: "POST",
        url: "/api/logout",
        headers: {
            Authorization: "Bearer " + getCookie("jwt_token"),
        },
        success: (e) => {
            document.cookie =
                "jwt_token= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
            document.cookie =
                "user_id= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
            window.location.reload();
        },
    });
}
