function logout(){
    $.ajax({
        method: 'POST',
        url: '/api/logout',
        headers: {
            'Authorization': 'Bearer ' + getCookie('jwt_token')
        },
        success: (e) =>{
            document.cookie = "jwt_token= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
            document.cookie = "user_id= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
            window.location.reload();
        }
    })

}

function getCookie(name) {
    let cookie = {};

    document.cookie.split(';').forEach(function(el) {
      let [k,v] = el.split('=');
      cookie[k.trim()] = v;
    })

    return cookie[name];

}
