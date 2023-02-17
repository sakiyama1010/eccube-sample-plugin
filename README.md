# managemanet-plugin

* 社内の管理システムとしてプラグインの開発をしていく
* ECCUBEの勉強がてらサンプルコードも入ってる

## 使い方

```sh
## windows上
# コンテナ作成
docker compose -f docker-compose.yml -f docker-compose.pgsql.yml -f docker-compose.dev.yml -p manage-eccube up -d
# 起動したかチェック
docker logs manage-eccube-ec-cube-1 -f
# bash
docker exec -it manage-eccube-ec-cube-1 bash
# 慣れてきたら(最新化とキャッシュクリアを一緒にやる)
sudo git pull && docker exec -it manage-eccube-ec-cube-1 bin/console cache:clear --no-warmup
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
```

### PlayWright

* 事前準備
  * サイトからインストーラーをダウンロード
  * <http://nodejs.org/>

```ps1
PS C:\Users\xxx> node --version
v18.14.0
PS C:\Users\xxx> npm --version
9.3.1
```

* E2Eテストを実行するための Playwright をセットアップ

```ps1
PS C:\Users\xxx> npm init playwright@latest
~~~~~~~
Ok to proceed? (y) y
Getting started with writing end-to-end tests with Playwright:
Initializing project in '.'
 Do you want to use TypeScript or JavaScript? · TypeScript
 Where to put your end-to-end tests? · tests
 Add a GitHub Actions workflow? (y/N) · false
 Install Playwright browsers (can be done manually via 'npx playwright install')? (Y/n) · true
Initializing NPM project (npm init -y)…
~~~~~~~
Success! Created a Playwright Test project at C:\Users\xxx
```

* テストコード例

```ts
import { test, expect } from '@playwright/test';

test('test', async ({ page }) => {
  await page.goto('http://localhost:8080/admin/login');
  await page.getByPlaceholder('ログインID').click();
  await page.getByPlaceholder('ログインID').fill('admin');
  await page.getByPlaceholder('ログインID').press('Tab');
  await page.getByPlaceholder('パスワード').fill('password');
  await page.getByRole('button', { name: 'ログイン' }).click();
  await page.getByRole('link', { name: '顧客管理' }).click();
  await page.getByRole('link', { name: '顧客イベント管理' }).click();
  await page.getByRole('link', { name: '新規作成' }).click();
});
```

```txt
# コード実行結果レポート出力先
C:\Users\xxx\playwright-report
# テストコード置き場
C:\Users\xxx\tests
```

* Github Actionsで実行
  * <https://zenn.dev/keita_hino/articles/d38956a2f1880e>

## 課題メモ

* ライセンス
  * ECCUBEをとりあえずコピー
  * あとで考える
* テスト
  * PlayWrightをGithub Actionで実行する
* 開発環境
  * 色々入れたい
* CSV登録関係
  * 一旦放置(必要ないから)
* controller.phpの集約
  * インタフェース作るのもありかも？
* 標準に存在するファイルの実装
  * 拡張するイメージ
* イベント管理画面
  * 概要は20文字ぐらいで良い
  * joinしたテーブルの顧客名を出したい
* プラグインの物理フォルダ名が小文字になってる

## 参考

### 便利コマンド

```sh
# composerで使えるコマンド確認
composer run-script -l
# EntityからGetter/Setter/Repositoryを自動生成
bin/console make:entity --regenerate
```

### 参考サイト

* font awesome
  * <https://fontawesome.com/v5/search?o=r&m=free>
