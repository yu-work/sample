# CLI Database Application

画面情報を管理するためのCLIアプリケーション。

## 機能

- 画面タイトルとリンク情報の追加
- 画面情報の一覧表示
- 画面情報の削除

## 使い方

```bash
# 画面情報の追加
screen-cli add "画面タイトル" --link "https://example.com" --description "説明"

# 画面情報の一覧表示
screen-cli list

# 画面情報の削除
screen-cli delete 1
```
