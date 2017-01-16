<?php

$data = $_POST;

if ($data['action'] = 'login') {
    login($data);
}

function login($data)
{
    $result = array('errno' => 255, 'msg' => '255');
    session_start();
    $rst = json_encode($data);

    if ($data['iv'] != $_SESSION['iv']) {
        $result = array('errno' => 1, 'msg' => 'iv mismatch.'.$data['iv'].' != '.$_SESSION['iv'].'. try relogin.');
        echo json_encode($result);
        exit();
    }

    $key = 'encryptionkey';
    $iv = $_SESSION['iv'];
    $username = $data['username'];
    $password = decrypt($data['password'], $key, $iv);

    $auth = auth($username, $password);

    if ($auth) {
        $avaliable = true;
    } else {
        $avaliable = false;
    }

    if ($avaliable) {
        $result = array('errno' => 0, 'msg' => 'Success');
        echo json_encode($result);
        exit();
    } else {
        //echo 'password:'.$password."\n";
        //echo 'expect encrypt password:'.encrypt('123', $key, $iv)."\n";
        //echo 'expect decrypt password:'.decrypt(encrypt('123'))."\n";
        $result = array('errno' => 2, 'msg' => 'Failed, password mismatch');
        echo json_encode($result);
        exit();
    }
}

function decrypt($ciphertext, $key = 'encryptionkey', $iv = 'fXyFiQCfgiKcyuVNCGoILQ==')
{
    while (strlen($key) < 16) {
        $key = $key."\0";
    }

    if (strlen($iv) != strlen(base64_encode(mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND)))) {
        echo '$iv length error: '.$iv."\n";
        exit();
    }

    $iv_base64_decode = base64_decode($iv);

    $plaintext = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, base64_decode($ciphertext), MCRYPT_MODE_CBC, $iv_base64_decode);
    $decrypted = rtrim($plaintext, "\0");

    return $decrypted;
}

function encrypt($content, $key = 'encryptionkey', $iv = 'fXyFiQCfgiKcyuVNCGoILQ==')
{
    while (strlen($key) < 16) {
        $key = $key."\0";
    }

    if (strlen($iv) != strlen(base64_encode(mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), MCRYPT_RAND)))) {
        exit();
    }

    $iv_base64_decode = base64_decode($iv);

    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $content, MCRYPT_MODE_CBC, $iv_base64_decode);

    $rst = base64_encode($ciphertext);

    return $rst;
}

function auth($username, $password)
{
    if ($username == 'abc' && $password == md5('123')) {
        return true;
    } else {
        return false;
    }
}
