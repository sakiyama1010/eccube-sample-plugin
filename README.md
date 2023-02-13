# managemanet-plugin

ECCUBEの勉強がてら社内の管理システムとしてプラグインの開発をしていく

## 使い方

```sh
## windows上
docker compose -f docker-compose.yml -f docker-compose.pgsql.yml -f docker-compose.dev.yml -p manage-eccube up -d
# 起動したかチェック
docker logs manage-eccube-ec-cube-1 -f
# bash
docker exec -it manage-eccube-ec-cube-1 bash
## コンテナ上
# Plugin配下にシンボリックを設定
cd /var/www/html
ln -s /management ./app/Plugin
# アンイストール
bin/console eccube:plugin:uninstall --code management
# インストール
bin/console eccube:plugin:install --code management
# 有効化
bin/console eccube:plugin:enable --code management
# キャッシュクリア
bin/console cache:clear --no-warmup
# composerで使えるコマンド確認
composer run-script -l
```

## 課題メモ

* ライセンス
  * ECCUBEをとりあえずコピー
  * あとで考える
* テスト
  * PlayWright入れてみたい
* 開発環境
  * 色々入れたい
* CSV登録関係
  * 一旦放置(必要ないから)
* controller.phpの集約
  * インタフェース作るのもありかも？
* 標準に存在するファイルの実装
  * 拡張するイメージ
* プラグインの物理フォルダ名が小文字になってる
