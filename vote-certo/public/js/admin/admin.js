function logout(){
    $.removeCookie('jwt_token');
    $.removeCookie('user_id');
    window.location.href = "/admin/login";
}
