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
            { width: "60px", targets: 0,  className: "text-center align-middle"  }, // Define a largura da primeira coluna (imagem)
            { width: "60px", targets: 1 ,  className: "text-center align-middle" }, // Largura da coluna ID
            { width: "200px", targets: 2 }, // Largura da coluna Nome
            { width: "250px", targets: 3}, // Largura da coluna Email
            { width: "150px", targets: 4 ,  className: "text-center align-middle" }, // Largura da coluna Cargo
            { width: "50px", targets: 5 ,  className: "text-center align-middle" }, // Largura da coluna de ações
        ],
        autoWidth: false, // Desabilita o ajuste automático de largura
        scrollX: true, // Habilita a rolagem horizontal caso necessário
    });

    // Adiciona evento de clique na div para simular o clique no input file
    document.getElementById("imageContainer").addEventListener("click", () => {
        document.getElementById("imageInput").click();
    });

    $("#formModalCreateUser").on("submit", (e) => {
        e.preventDefault();
        alert("roq aq");
        var data = document.getElementById("formModalCreateUser");
        var formData = new FormData(data);
        $.ajax({
            url: "/api/admin",
            method: "POST",
            processData: false, // Evita que o jQuery processe os dados
            contentType: false, // Impede que o jQuery defina o Content-Type automaticamente
            headers: {
                Authorization: "Bearer " + getCookie("jwt_token"),
            },
            data: formData,
            success: (response) => {
                alert("teste");
                console.log(response);
            },
        });
    });

    $(document).on('click', '.delete-item', function() {
        var itemId = $(this).data('id');
        var itemName = $(this).data('name');
        $('#itemId').val(itemId); // Armazena o ID no campo oculto do modal
        $('#modalLabel').text('Excluir Item');
        $('#modalMessage').text('Você tem certeza que deseja excluir a conta do usuário ' + itemName + '?');
        $('#modalEditDelete').modal('show'); // Mostra o modal
    });

     // Evento para confirmar exclusão
     $('#confirmDelete').on('click', function() {
        var itemId = $('#itemId').val();
        // Requisição AJAX para excluir o item
        $.ajax({
            url: '/api/admin/' + itemId, // Ajuste a URL conforme necessário
            type: 'DELETE',
            headers: {
                Authorization: "Bearer " + getCookie("jwt_token"),
            },
            success: function(response) {
                $('#modalEditDelete').modal('hide');
                // Opcional: atualize a tabela ou faça um refresh
                location.reload(); // Recarrega a página
            },
            error: function(xhr) {
                console.error(xhr);
                alert('Erro ao excluir o item');
            }
        });
    });
});
