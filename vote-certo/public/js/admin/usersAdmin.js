function loadFile(event) {
    const imageContainer = document.getElementById("imageContainer");
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function () {
        // Definindo a nova imagem de fundo da div
        imageContainer.style.backgroundImage = `url('${reader.result}')`;
    };

    // Carrega o arquivo da imagem selecionada
    if (file) {
        reader.readAsDataURL(file);
    }
}

$(document).ready(function () {
    $("#example").DataTable({
        columnDefs: [
            {
                width: "60px",
                targets: 0,
                className: "text-center align-middle",
            }, // Define a largura da primeira coluna (imagem)
            {
                width: "60px",
                targets: 1,
                className: "text-center align-middle",
            }, // Largura da coluna ID
            { width: "200px", targets: 2 }, // Largura da coluna Nome
            { width: "250px", targets: 3 }, // Largura da coluna Email
            {
                width: "150px",
                targets: 4,
                className: "text-center align-middle",
            }, // Largura da coluna Cargo
            {
                width: "50px",
                targets: 5,
                className: "text-center align-middle",
            }, // Largura da coluna de ações
        ],
        autoWidth: false, // Desabilita o ajuste automático de largura
        scrollX: true, // Habilita a rolagem horizontal caso necessário
    });

    // Adiciona evento de clique na div para simular o clique no input file
    document.getElementById("imageContainer").addEventListener("click", () => {
        document.getElementById("imageInput").click();
    });

    $(document).on("submit", "#formModalCreateUser", function (e) {
        e.preventDefault();
        var data = document.getElementById("formModalCreateUser");
        var formData = new FormData(data);
        $.ajax({
            url: "/api/admin",
            method: "POST",
            processData: false, // Evita que o jQuery processe os dados
            contentType: false, // Impede que o jQuery defina o Content-Type automaticamente
            headers: {
                Authorization: "Bearer " + getCookie("user_token"),
            },
            data: formData,
            success: (response) => {
                let message = $('#msgModalUser')
                updateTable()
                msg('Perfil criado com sucesso.', true, 'msgModalUser');
                setTimeout(() =>{
                    message.fadeOut();
                    $("#modalUser").modal("hide");
                }, 2000)
            },
            error: (xhr, status, error) => {
                if(xhr.status == 500){
                    let message = $('#msgModalUser')
                    msg('Email já cadastrado no banco de dados.', false, 'msgModalUser');
                    setTimeout(() =>{
                        message.fadeOut();
                    }, 2000)
                }
            },
        });
    });

    $(document).on("submit", "#formModalEditUser",async function (e) {
        e.preventDefault();
        const userData = await getDataUser(getCookie('user_token'));
        var idUser = userData.id;
        var itemId = $("#itemId").val();
        var data = document.getElementById("formModalEditUser");
        var formData = new FormData(data);

        formData.append("_method", "PUT");
        $.ajax({
            url: "/api/admin/" + itemId,
            method: "POST",
            processData: false, // Evita que o jQuery processe os dados
            contentType: false, // Impede que o jQuery defina o Content-Type automaticamente
            headers: {
                Authorization: "Bearer " + getCookie("user_token"),
            },
            data: formData,
            success: (response) => {
                if(response.id == idUser){
                    let message = $('#msgModalUser')
                    msg('O seu perfil foi alterado com sucesso, a página irá recarregar.', true, 'msgModalUser');
                    setTimeout(() =>{
                        message.fadeOut();
                        document.location.reload()
                    }, 2000)

                }else{
                    let message = $('#msgModalUser')
                    updateTable()
                    msg('Perfil alterado com sucesso.', true, 'msgModalUser');
                    setTimeout(() =>{
                        message.fadeOut();
                        $("#modalUser").modal("hide");
                    }, 2000)

                }

            },
            error: (xhr, status, error) => {
                if(xhr.status == 500){
                    let message = $('#msgModalUser')
                    msg('Email já cadastrado no banco de dados.', false, 'msgModalUser');
                    setTimeout(() =>{
                        message.fadeOut();
                    }, 2000)
                }
            },
        });
    });

    $(document).on("click", ".edit-item", function () {
        var itemId = $(this).data("id");
        var itemName = $(this).data("name");
        var itemEmail = $(this).data("email");
        var itemPosition = $(this).data("position");
        var itemImage = $(this).data("image");
        $(".formModalUser").attr("id", "formModalEditUser");
        $("#buttonSubmit").html('Editar');
        $("#itemId").val(itemId); // Armazena o ID no campo oculto do modal
        $("#modalUserLabel").text("Editar Item");
        $("#nameInputModal").val(itemName);
        $("#emailInputModal").val(itemEmail);
        $("#positionInputModal").val(itemPosition);
        $("#passwordInputModal").val("");
        $("#imageContainer").css("background-image", "url(" + itemImage + ")");
        $("#modalUser").modal("show"); // Mostra o modal
    });

    $(document).on("click", ".criar-item", function () {
        var itemImage = $(this).data("image");
        $("#buttonSubmit").html('Criar');
        $(".formModalUser").attr("id", "formModalCreateUser");
        $("#itemId").val(itemId); // Armazena o ID no campo oculto do modal
        $("#modalUserLabel").text("Criar Usuário");
        $("#nameInputModal").val("");
        $("#emailInputModal").val("");
        $("#positionInputModal").val("");
        $("#passwordInputModal").val("");
        $("#imageContainer").css("background-image", "url(" + itemImage + ")");
        $("#modalUser").modal("show"); // Mostra o modal
    });

    $(document).on("click", ".delete-item", function () {
        var itemId = $(this).data("id");
        var itemName = $(this).data("name");
        $("#itemId").val(itemId); // Armazena o ID no campo oculto do modal
        $("#modalLabel").text("Excluir Item");
        $("#modalMessage").text(
            "Você tem certeza que deseja excluir a conta do usuário " +
                itemName +
                "?"
        );
        $("#modalEditDelete").modal("show"); // Mostra o modal
    });

    // Evento para confirmar exclusão
    $("#confirmDelete").on("click", function () {
        var itemId = $("#itemId").val();
        // Requisição AJAX para excluir o item
        $.ajax({
            url: "/api/admin/" + itemId, // Ajuste a URL conforme necessário
            type: "DELETE",
            headers: {
                Authorization: "Bearer " + getCookie("user_token"),
            },
            success: function (response) {
                updateTable()
                $("#modalEditDelete").modal("hide");
            },
            error: function (xhr) {
                console.error(xhr);
                alert("Erro ao excluir o item");
            },
        });
    });
});

function updateTable() {
    // Fazer uma requisição para obter os dados da API
    $.ajax({
        url: "/api/admin", // URL da sua API que retorna os dados
        method: "GET",
        headers: {
            Authorization: "Bearer " + getCookie("user_token"),
        },
        success: function (response) {
            // Atualizar os dados da tabela de forma fluida
            let table = $("#example").DataTable();

            // Limpar dados antigos da tabela sem destruir a instância
            table.clear();

            // Adicionar novos dados
            response.forEach((item) => {
                table.row.add([
                    ` <img src="/storage/${item.img_profile}" id="table-image-preview" alt="">`,
                    item.id,
                    item.name,
                    item.email,
                    getPositionBadge(item.position),
                    `
            <div class="dropdown">
                <i class="bi bi-three-dots-vertical" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false"></i>
                <ul class="dropdown-menu" style="z-index: 4" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item edit-item" data-id="${item.id}"
                            data-name="${item.name}" data-email="${item.email}"
                            data-position="${item.position}"
                            data-image="/storage/${item.img_profile}">Editar</a></li>
                    <li><a class="dropdown-item delete-item" href="#"
                            data-id="${item.id}"
                            data-name="${item.name}">Excluir</a></li>
                </ul>
            </div>
        `,
                ]);
            });

            // Desenhar a tabela com os novos dados
            table.draw(false);
        },
        error: function (error) {
            console.log("Erro ao buscar dados:", error);
        },
    });
}

function addRowToTable(item) {
    var newRow = `
    <tr>
        <td>
            <img src="/storage/${item.img_profile}" id="table-image-preview" alt="">
        </td>
        <td>${item.id}</td>
        <td>${item.name}</td>
        <td>${item.email}</td>
        <td>
            ${getPositionBadge(item.position)}
        </td>
        <td>
            <div class="dropdown">
                <i class="bi bi-three-dots-vertical" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false"></i>
                <ul class="dropdown-menu" style="z-index: 4" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item edit-item" data-id="${item.id}"
                            data-name="${item.name}" data-email="${item.email}"
                            data-position="${item.position}"
                            data-image="/storage/${item.img_profile}">Editar</a></li>
                    <li><a class="dropdown-item delete-item" href="#"
                            data-id="${item.id}"
                            data-name="${item.name}">Excluir</a></li>
                </ul>
            </div>
        </td>
    </tr>
`;

    // Adiciona a nova linha ao tbody
    $("#tbodyTableUsers").append(newRow);
}

function getPositionBadge(position) {
    if (position == 1) {
        return '<span class="badge text-bg-primary">Usuário</span>';
    } else if (position == 50) {
        return '<span class="badge text-bg-info">Suporte</span>';
    } else if (position == 99) {
        return '<span class="badge text-bg-success">Administrador</span>';
    }
    return "";
}

function msg(msg, type, id){
    if(type){
        let message = $("#"+ id);
        message.html(msg);
        message.addClass('alert alert-success')
        message.fadeIn();

    }else{
        let message = $("#"+ id);
        message.html(msg);
        message.addClass('alert alert-danger')
        message.fadeIn();

    }
}
