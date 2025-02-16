<?php
require_once __DIR__ . '/../../vendor/autoload.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>カラーパレット</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .color-box {
            height: 100px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">カラーパレット</a>
        </div>
    </nav>

    <div class="container">
        <h2 class="mb-4">基本カラー</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="color-box" style="background-color: #007bff;">#007bff - プライマリー</div>
            </div>
            <div class="col-md-4">
                <div class="color-box" style="background-color: #6c757d;">#6c757d - セカンダリー</div>
            </div>
            <div class="col-md-4">
                <div class="color-box" style="background-color: #28a745;">#28a745 - サクセス</div>
            </div>
        </div>

        <h2 class="mb-4 mt-5">パステルカラー</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="color-box" style="background-color: #FFB3B3; color: black;">#FFB3B3 - パステルピンク</div>
            </div>
            <div class="col-md-3">
                <div class="color-box" style="background-color: #B3E0FF; color: black;">#B3E0FF - パステルブルー</div>
            </div>
            <div class="col-md-3">
                <div class="color-box" style="background-color: #B3FFB3; color: black;">#B3FFB3 - パステルグリーン</div>
            </div>
            <div class="col-md-3">
                <div class="color-box" style="background-color: #FFE6B3; color: black;">#FFE6B3 - パステルオレンジ</div>
            </div>
        </div>

        <h2 class="mb-4 mt-5">中間色</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="color-box" style="background-color: #9370DB;">#9370DB - ミディアムパープル</div>
            </div>
            <div class="col-md-3">
                <div class="color-box" style="background-color: #20B2AA;">#20B2AA - ライトシーグリーン</div>
            </div>
            <div class="col-md-3">
                <div class="color-box" style="background-color: #DEB887; color: black;">#DEB887 - バーリーウッド</div>
            </div>
            <div class="col-md-3">
                <div class="color-box" style="background-color: #BA55D3;">#BA55D3 - ミディアムオーキッド</div>
            </div>
        </div>

        <h2 class="mb-4 mt-5">アクセントカラー</h2>
        <div class="row">
            <div class="col-md-3">
                <div class="color-box" style="background-color: #dc3545;">#dc3545 - デンジャー</div>
            </div>
            <div class="col-md-3">
                <div class="color-box" style="background-color: #ffc107; color: black;">#ffc107 - ワーニング</div>
            </div>
            <div class="col-md-3">
                <div class="color-box" style="background-color: #17a2b8;">#17a2b8 - インフォ</div>
            </div>
            <div class="col-md-3">
                <div class="color-box" style="background-color: #6f42c1;">#6f42c1 - パープル</div>
            </div>
        </div>

        <h2 class="mb-4 mt-5">グレースケール</h2>
        <div class="row">
            <div class="col-md-2">
                <div class="color-box" style="background-color: #f8f9fa; color: black;">#f8f9fa - ライト</div>
            </div>
            <div class="col-md-2">
                <div class="color-box" style="background-color: #e9ecef; color: black;">#e9ecef - グレー100</div>
            </div>
            <div class="col-md-2">
                <div class="color-box" style="background-color: #dee2e6; color: black;">#dee2e6 - グレー200</div>
            </div>
            <div class="col-md-2">
                <div class="color-box" style="background-color: #495057;">#495057 - グレー700</div>
            </div>
            <div class="col-md-2">
                <div class="color-box" style="background-color: #343a40;">#343a40 - グレー800</div>
            </div>
            <div class="col-md-2">
                <div class="color-box" style="background-color: #212529;">#212529 - グレー900</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
