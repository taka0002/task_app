To doリストアプリ

Laravelを使用して、日々のtodoを管理するアプリを作成しました。

URL:http://takahiro-kym.sakura.ne.jp/task_app/public/task_apps

![スクリーンショット 2020-08-10 10 33 48](https://user-images.githubusercontent.com/63849657/89746529-14430280-daf5-11ea-9ca4-b77fd67f6712.png)

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

![タイトルなし](https://user-images.githubusercontent.com/63849657/88667943-f18c1380-d11c-11ea-8986-e84c69d9e26b.gif)

- それぞれのタスクは、削除ボタンから削除可能（アラートの表示）

![タイトルなし](https://user-images.githubusercontent.com/63849657/88927862-08646e80-d2b3-11ea-9573-979ae3cf36d1.gif)

【使用言語など】 HTML/CSS、JavaScript、jQuery、PHP、MySQL、Laravel、GitHub、Docker
