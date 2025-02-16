<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Auth\GoogleAuth;

// ユーザーが既にログインしている場合はリダイレクト
if (isset($_SESSION['user'])) {
    header('Location: /index.php');
    exit;
}

$auth = new GoogleAuth();
$authUrl = $auth->getAuthUrl();
?>
<!DOCTYPE html>
<html>
<head>
    <title>ログイン - ストーリー作成アプリ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
        }
        .google-btn {
            background-color: #fff;
            color: #757575;
            border: 1px solid #ddd;
            padding: 12px 24px;
            transition: all 0.3s ease;
        }
        .google-btn:hover {
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .google-icon {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2 class="text-center mb-4">ログイン</h2>
            <div class="d-grid gap-2">
                <a href="<?php echo htmlspecialchars($authUrl); ?>" class="btn google-btn">
                    <img src="https://www.google.com/favicon.ico" alt="Google" class="google-icon" width="20" height="20">
                    Googleでログイン
                </a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
