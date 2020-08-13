To doリストアプリ

Laravelを使用して、日々のtodoを管理するアプリを作成しました。

URL:http://takahiro-kym.sakura.ne.jp/task_app/public/task_apps

![スクリーンショット 2020-08-13 20 22 11](https://user-images.githubusercontent.com/63849657/90129019-d834c980-dda2-11ea-9cd9-ba34f19e4a50.png)

【こだわった点】
- todoのリストは登録順ではなく、締め切り日の近い順から並べている（デフォルトの状態）
- 「現在のステータス」「締め切り期限」に関しては、selectで選択すればリストの並び替えが可能

![並び替え](https://user-images.githubusercontent.com/63849657/90129269-4bd6d680-dda3-11ea-8756-954f1dff391a.gif)

- やることリストをその場編集できる
- その場編集したものに関しては、編集が完了した時点でenterを押すと、自動的にpostされて修正内容が保存される

![書き込み編集](https://user-images.githubusercontent.com/63849657/90129494-b9830280-dda3-11ea-8f4c-cf1949e64b7c.gif)

- 現在のステータスに関しては、クリックした時点で「未着手」「着手中」にステータスを変えられる（着手中の場合は色が変更）

![ステータス変更](https://user-images.githubusercontent.com/63849657/90129774-3ada9500-dda4-11ea-8247-27701714146a.gif)

- それぞれの締め切り期限の日にちをクリックすると、その場で締め切り日の変更が可能。変更ボタンを押すとpostされて変更可能

![日付変更](https://user-images.githubusercontent.com/63849657/90129965-93119700-dda4-11ea-9aeb-925abc135d98.gif)

- それぞれのタスクは、削除ボタンから削除可能（アラートの表示）

![delete](https://user-images.githubusercontent.com/63849657/90130115-da982300-dda4-11ea-9ee0-b988056331ff.gif)

【使用言語】 HTML/CSS、JavaScript、jQuery、PHP

【フレームワーク】 Laravel

【DB】 MySQL

【環境構築】 Docker
