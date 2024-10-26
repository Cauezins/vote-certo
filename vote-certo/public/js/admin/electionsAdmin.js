
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

    $(document).on("submit", "#formModalCreateElection", async function (e) {
        e.preventDefault();
        const userData = await getDataUser(getCookie('user_token'));
        var idUser = userData.id;
        var data = document.getElementById("formModalCreateElection");
        var formData = new FormData(data);
        formData.append('creator_id', idUser);
        $.ajax({
            url: "/api/elections",
            method: "POST",
            processData: false, // Evita que o jQuery processe os dados
            contentType: false, // Impede que o jQuery defina o Content-Type automaticamente
            headers: {
                Authorization: "Bearer " + getCookie("user_token"),
            },
            data: formData,
            success: (response) => {
                console.log(response);

                // let message = $('#msgModalUser')
                // updateTable()
                // msg('Perfil criado com sucesso.', true, 'msgModalUser');
                // setTimeout(() =>{
                //     message.fadeOut();
                //     $("#modalUser").modal("hide");
                // }, 2000)
            },
            error: (xhr, status, error) => {
                // if(xhr.status == 500){
                //     let message = $('#msgModalUser')
                //     msg('Email já cadastrado no banco de dados.', false, 'msgModalUser');
                //     setTimeout(() =>{
                //         message.fadeOut();
                //     }, 2000)
                // }
            },
        });
    });

});

function updateTable() {
    $("#example").DataTable().destroy();
    $("#tbodyTableUsers").html("");
    $.ajax({
        url: "/api/admin", // URL da sua API que retorna os dados
        method: "GET",
        headers: {
            Authorization: "Bearer " + getCookie("user_token"),
        },
        success: function (response) {

            response.forEach((item) => {
                addRowToTable(item);
            });
            // Reinicializar o DataTable

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
