To doリストアプリ

Laravelを使用して、日々のtodoを管理するアプリを作成しました。

URL:http://takahiro-kym.sakura.ne.jp/task_app/public/task_apps

![todo](https://user-images.githubusercontent.com/63849657/99249661-cead7880-284d-11eb-926d-06688491818c.png)

【こだわった点】

- 詳細ボタンを押すと、ポップアップで備考欄が表示される

![todo_popup](https://user-images.githubusercontent.com/63849657/99250233-aeca8480-284e-11eb-9317-aea1b736a434.gif)

- todoのリストは登録順ではなく、締め切り日の近い順から並べている（デフォルトの状態）
- 「現在のステータス」「締め切り期限」に関しては、selectで選択すればリストの並び替えが可能

![todo_status](https://user-images.githubusercontent.com/63849657/99250842-b179a980-284f-11eb-8ac4-ddb7c84e761c.gif)

- やることリストをその場編集できる
- その場編集したものに関しては、編集が完了した時点でenterを押すと、自動的にpostされて修正内容が保存される

![todo_change_1](https://user-images.githubusercontent.com/63849657/99251141-2d73f180-2850-11eb-9e1a-e4553bbcff18.gif)

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
