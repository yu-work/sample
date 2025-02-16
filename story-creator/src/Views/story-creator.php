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
    <div class="container">
        <h1>ストーリー作成</h1>
        
        <div class="selection-group">
            <h2>キャラクターの心情</h2>
            <?php foreach (Character::EMOTIONS as $key => $label): ?>
                <div class="selection-item" data-emotion="<?php echo htmlspecialchars($key); ?>">
                    <?php echo htmlspecialchars($label); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="selection-group">
            <h2>シーンの種類</h2>
            <?php foreach (Scene::TYPES as $key => $label): ?>
                <div class="selection-item" data-scene="<?php echo htmlspecialchars($key); ?>">
                    <?php echo htmlspecialchars($label); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div id="story-output">
            <h2>生成されたストーリー</h2>
            <div id="story-text"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedEmotion = null;
            let selectedScene = null;

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
                if (selectedEmotion && selectedScene) {
                    const emotions = <?php echo json_encode(Character::EMOTIONS); ?>;
                    const scenes = <?php echo json_encode(Scene::TYPES); ?>;
                    
                    const storyText = `${scenes[selectedScene]}で${emotions[selectedEmotion]}の感情を抱いているキャラクター...`;
                    document.getElementById('story-text').textContent = storyText;
                }
            }
        });
    </script>
</body>
</html>
