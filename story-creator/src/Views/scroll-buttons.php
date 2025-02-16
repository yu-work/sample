<?php
require_once __DIR__ . '/../../vendor/autoload.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>スクロールボタン</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        .content-box {
            height: 200vh;
            background: linear-gradient(to bottom, var(--bs-light), var(--bs-white));
            padding: 20px;
        }
        
        .scroll-button {
            position: fixed;
            width: 50px;
            height: 50px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: #FFE5E5;
            border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .scroll-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .scroll-up {
            top: 20px;
            right: 20px;
        }

        .scroll-down {
            bottom: 20px;
            right: 20px;
        }

        .section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2em;
            color: var(--bs-gray-700);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">スクロールボタン デモ</a>
        </div>
    </nav>

    <div class="content-box">
        <button class="scroll-button scroll-up" onclick="scrollToTop()">
            <i class="bi bi-arrow-up"></i>
        </button>
        
        <button class="scroll-button scroll-down" onclick="scrollToBottom()">
            <i class="bi bi-arrow-down"></i>
        </button>

        <div class="section">
            セクション 1
        </div>
        <div class="section">
            セクション 2
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function scrollToBottom() {
            window.scrollTo({
                top: document.documentElement.scrollHeight,
                behavior: 'smooth'
            });
        }
    </script>
</body>
</html>
