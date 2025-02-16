<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
use App\Auth\GoogleAuth;

session_start();

$auth = new GoogleAuth();
$code = $_GET['code'] ?? null;

if ($code) {
    $tokenData = $auth->getAccessToken($code);
    if (isset($tokenData['access_token'])) {
        $userInfo = $auth->getUserInfo($tokenData['access_token']);
        if ($userInfo) {
            $_SESSION['user'] = $userInfo;
            header('Location: /index.php');
            exit;
        }
    }
}

header('Location: /login.php?error=auth_failed');
exit;
