$(document).ready((event) => {
    setTimeout(() => {
        $('#preloader').fadeOut(500)
    }, 2000)
})

function logout() {
    $.ajax({
        method: "POST",
        url: "/api/logout",
        headers: {
            Authorization: "Bearer " + getCookie("user_token"),
        },
        success: (e) => {
            document.cookie =
                "user_token= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
            window.location.reload();
        },
    });
}

function getEncryptedId(id) {
    $.ajax({
        url: `/api/get-encrypted-id/${id}`,
        method: 'GET',
        headers: {
            Authorization: "Bearer " + getCookie("user_token"),
        },
        success: function (response) {
            const encryptedId = response.encryptedId;
            return encryptedId;
        },
        error: function (error) {
            console.log('Error fetching encrypted ID:', error);
        }
    });
}



