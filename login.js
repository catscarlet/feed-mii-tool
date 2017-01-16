var iv = decodeURIComponent(document.cookie.replace(/(?:(?:^|.*;\s*)iv\s*\=\s*([^;]*).*$)|^.*$/, '$1'));

$(document).ready(function() {
    $('#login').on('click', do_login);
});

function do_login() {
    var username = $('#username').val();
    var password_input = $('#password').val();
    var password_md5 = CryptoJS.MD5(password_input).toString();
    console.log(password_md5);
    var password = js_encrpyt(password_input);

    var data = {
        action: 'login',
        username: username,
        password: password,
        iv: iv
    };

    console.log(data);

    $.ajax({
        type: 'POST',
        url: 'login.php',
        data: data,
        dataType: 'json',
        async: true,
        success: function(msg, textStatus, jqXHR) {
            console.log(msg);
        },
        error: function(msg) {
            console.log(msg);
        }
    });
}

function try_relogin() {

}

function format_key(key) {
    while (key.length < 16) {
        key = key + '\u0000';
    }
    return key;
}

function js_encrpyt(content) {
    var result;
    var key = format_key('encryptionkey');
    key = CryptoJS.enc.Utf8.parse(key);
    var iv_enc = CryptoJS.enc.Base64.parse(iv);
    var ciphertext = CryptoJS.AES.encrypt(content, key, {iv: iv_enc, padding: CryptoJS.pad.ZeroPadding});
    result = ciphertext.toString();
    return result;
}
