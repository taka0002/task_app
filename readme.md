To doリストアプリ

Laravelを使用して、日々のtodoを管理するアプリを作成しました。

URL:http://takahiro-kym.sakura.ne.jp/task_app/public/task_apps

![スクリーンショット 2020-08-13 20 22 11](https://user-images.githubusercontent.com/63849657/90129019-d834c980-dda2-11ea-9cd9-ba34f19e4a50.png)

【こだわった点】
- todoのリストは登録順ではなく、締め切り日の近い順から並べている（デフォルトの状態）
- 「現在のステータス」「締め切り期限」に関しては、selectで選択すればリストの並び替えが可能

![タイトルなし](https://user-images.githubusercontent.com/63849657/89746594-87e50f80-daf5-11ea-819a-8cc8f22abafc.gif)

- やることリストをその場編集できる
- その場編集したものに関しては、編集が完了した時点でenterを押すと、自動的にpostされて修正内容が保存される

![タイトルなし](https://user-images.githubusercontent.com/63849657/89746663-dbeff400-daf5-11ea-8cb4-8127aa9bf2a7.gif)

- 現在のステータスに関しては、クリックした時点で「未着手」「着手中」にステータスを変えられる（着手中の場合は色が変更）

![タイトルなし](https://user-images.githubusercontent.com/63849657/89746721-3b4e0400-daf6-11ea-8190-1cee178910b4.gif)

- それぞれの締め切り期限の日にちをクリックすると、その場で締め切り日の変更が可能。変更ボタンを押すとpostされて変更可能

![タイトルなし_4](https://user-images.githubusercontent.com/63849657/89746780-8c5df800-daf6-11ea-8753-d5bac6145b2a.gif)

- それぞれのタスクは、削除ボタンから削除可能（アラートの表示）

![タイトルなし_削除](https://user-images.githubusercontent.com/63849657/89746886-0b533080-daf7-11ea-986a-f8691fc16b0b.gif)

【使用言語】 HTML/CSS、JavaScript、jQuery、PHP

【フレームワーク】 Laravel

【DB】 MySQL

【環境構築】 Docker
