<?php
require_once __DIR__ . '/../../vendor/autoload.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>ストーリー作成アプリ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        .nav-link {
            color: var(--bs-gray-600);
            transition: all 0.3s ease;
        }
        .nav-link:hover {
            color: var(--bs-primary);
            transform: translateY(-2px);
        }
        .card {
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">ストーリー作成アプリ</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ストーリー作成</h5>
                        <p class="card-text">キャラクターと場面を選んでストーリーを作成します。</p>
                        <a href="story-creator.php" class="btn btn-primary">開始する</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">カラーパレット</h5>
                        <p class="card-text">利用可能な色のパレットを確認できます。</p>
                        <a href="color-palette.php" class="btn btn-primary">確認する</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">スクロールボタン</h5>
                        <p class="card-text">スクロール機能のデモを確認できます。</p>
                        <a href="scroll-buttons.php" class="btn btn-primary">確認する</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div class="alert alert-warning" role="alert">
            一時アクセス: 残り時間 <span id="countdown">10:00</span>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // カウントダウンタイマー
        function startTimer(duration, display) {
            var timer = duration, minutes, seconds;
            var countdown = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    clearInterval(countdown);
                    display.textContent = "期限切れ";
                }
            }, 1000);
        }

        window.onload = function () {
            var tenMinutes = 60 * 10,
                display = document.querySelector('#countdown');
            startTimer(tenMinutes, display);
        };
    </script>
</body>
</html>
