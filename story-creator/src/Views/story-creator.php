<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use App\Models\Character;
use App\Models\Scene;

$character = new Character();
$scene = new Scene();
?>
<!DOCTYPE html>
<html>
<head>
    <title>ストーリー作成</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #333333;
            --secondary-color: #666666;
            --background-color: #f5f5f5;
            --text-color: #222222;
            --border-radius: 8px;
            --hover-color: #444444;
        }
        
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: var(--text-color);
            font-weight: 300;
            font-size: 2.5em;
            margin-bottom: 40px;
        }

        h2 {
            color: var(--text-color);
            font-weight: 400;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .selection-group {
            background: white;
            border-radius: var(--border-radius);
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .selection-item {
            display: inline-block;
            margin: 8px;
            padding: 12px 20px;
            background-color: white;
            border: 2px solid var(--primary-color);
            border-radius: var(--border-radius);
            color: var(--primary-color);
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .selection-item:hover {
            background-color: var(--hover-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .selection-item.selected {
            background-color: var(--primary-color);
            color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        #story-output {
            background: white;
            padding: 30px;
            border-radius: var(--border-radius);
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        #story-text {
            font-size: 1.1em;
            line-height: 1.8;
            color: var(--text-color);
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">ストーリー作成</a>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">ボタンのスタイル例</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary me-2 mb-2">プライマリーボタン</button>
                        <button class="btn btn-secondary me-2 mb-2">セカンダリーボタン</button>
                        <button class="btn btn-success me-2 mb-2">サクセスボタン</button>
                        <button class="btn btn-danger me-2 mb-2">デンジャーボタン</button>
                        <button class="btn btn-warning me-2 mb-2">ワーニングボタン</button>
                        <button class="btn btn-info me-2 mb-2">インフォボタン</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">アウトラインボタン</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-outline-primary me-2 mb-2">プライマリー</button>
                        <button class="btn btn-outline-secondary me-2 mb-2">セカンダリー</button>
                        <button class="btn btn-outline-success me-2 mb-2">サクセス</button>
                        <button class="btn btn-outline-danger me-2 mb-2">デンジャー</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">サイズバリエーション</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary btn-lg me-2 mb-2">大きいボタン</button>
                        <button class="btn btn-primary me-2 mb-2">通常ボタン</button>
                        <button class="btn btn-primary btn-sm me-2 mb-2">小さいボタン</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedCharacterType = null;
            let selectedEmotion = null;
            let selectedScene = null;

            // キャラクターの種類選択
            document.querySelectorAll('[data-character-type]').forEach(item => {
                item.addEventListener('click', function() {
                    // Remove selected class from all character type items
                    document.querySelectorAll('[data-character-type]').forEach(el => el.classList.remove('selected'));
                    // Add selected class to clicked item
                    this.classList.add('selected');
                    selectedCharacterType = this.dataset.characterType;
                    updateStory();
                });
            });

            // 心情の選択
            document.querySelectorAll('[data-emotion]').forEach(item => {
                item.addEventListener('click', function() {
                    // Remove selected class from all emotion items
                    document.querySelectorAll('[data-emotion]').forEach(el => el.classList.remove('selected'));
                    // Add selected class to clicked item
                    this.classList.add('selected');
                    selectedEmotion = this.dataset.emotion;
                    updateStory();
                });
            });

            // シーンの選択
            document.querySelectorAll('[data-scene]').forEach(item => {
                item.addEventListener('click', function() {
                    // Remove selected class from all scene items
                    document.querySelectorAll('[data-scene]').forEach(el => el.classList.remove('selected'));
                    // Add selected class to clicked item
                    this.classList.add('selected');
                    selectedScene = this.dataset.scene;
                    updateStory();
                });
            });

            // ストーリーの更新
            function updateStory() {
                if (selectedCharacterType && selectedEmotion && selectedScene) {
                    const characterTypes = <?php echo json_encode(CharacterType::TYPES); ?>;
                    const emotions = <?php echo json_encode(Character::EMOTIONS); ?>;
                    const scenes = <?php echo json_encode(Scene::TYPES); ?>;
                    
                    const storyText = `${scenes[selectedScene]}で${emotions[selectedEmotion]}の感情を抱いている${characterTypes[selectedCharacterType]}のキャラクター...`;
                    document.getElementById('story-text').textContent = storyText;
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
