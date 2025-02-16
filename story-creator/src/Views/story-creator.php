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
        .selection-group {
            margin: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .selection-item {
            display: inline-block;
            margin: 5px;
            padding: 10px;
            border: 1px solid #999;
            cursor: pointer;
        }
        .selection-item:hover {
            background-color: #eee;
        }
    </style>
</head>
<body>
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

    <div id="story-output" class="selection-group">
        <h2>生成されたストーリー</h2>
        <div id="story-text"></div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedEmotion = null;
            let selectedScene = null;

            // 心情の選択
            document.querySelectorAll('[data-emotion]').forEach(item => {
                item.addEventListener('click', function() {
                    selectedEmotion = this.dataset.emotion;
                    updateStory();
                });
            });

            // シーンの選択
            document.querySelectorAll('[data-scene]').forEach(item => {
                item.addEventListener('click', function() {
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
