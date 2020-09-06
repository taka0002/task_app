To doリストアプリ

Laravelを使用して、日々のtodoを管理するアプリを作成しました。

URL:http://takahiro-kym.sakura.ne.jp/task_app/public/task_apps

![スクリーンショット 2020-09-06 14 50 16](https://user-images.githubusercontent.com/63849657/92319138-71789800-f050-11ea-9277-2be88d49b156.png)

【こだわった点】

- 詳細ボタンを押すと、ポップアップで備考欄が表示される

![popup](https://user-images.githubusercontent.com/63849657/90130317-3b276000-dda5-11ea-830e-181be3674fae.gif)

- todoのリストは登録順ではなく、締め切り日の近い順から並べている（デフォルトの状態）
- 「現在のステータス」「締め切り期限」に関しては、selectで選択すればリストの並び替えが可能

![status_change](https://user-images.githubusercontent.com/63849657/90130568-a40ed800-dda5-11ea-99b8-14e5ac57752a.gif)

- やることリストをその場編集できる
- その場編集したものに関しては、編集が完了した時点でenterを押すと、自動的にpostされて修正内容が保存される

![text_edit](https://user-images.githubusercontent.com/63849657/92319193-f5328480-f050-11ea-85f6-1673e0b3da4a.gif)

- 現在のステータスに関しては、クリックした時点で「未着手」「着手中」にステータスを変えられる（着手中の場合は色が変更）

![status_edit](https://user-images.githubusercontent.com/63849657/92319270-404c9780-f051-11ea-83d0-c4aba6344bbe.gif)

- それぞれの締め切り期限の日にちをクリックすると、その場で締め切り日の変更が可能。変更ボタンを押すとpostされて変更可能

![date_edit](https://user-images.githubusercontent.com/63849657/92319322-a6d1b580-f051-11ea-9671-010105d2bf17.gif)

- それぞれのタスクは、削除ボタンから削除可能（アラートの表示）

![delete_edit](https://user-images.githubusercontent.com/63849657/92319346-f1533200-f051-11ea-87e0-e444f7f9944d.gif)

【使用言語】 HTML/CSS、JavaScript、jQuery、PHP

【フレームワーク】 Laravel

【DB】 MySQL

【環境構築】 Docker
