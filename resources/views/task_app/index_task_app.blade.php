@extends('layouts.default')

@section('title', $title)

@section('content')
<div class="container">
    <h1 class="text-primary"><a href="http://takahiro-kym.sakura.ne.jp/task_app/public/task_apps" rel=”noopener”>{{ $title }}</a></h1>
    <p class="username text-center">現在のユーザー名: <span>{{ Auth::user()->name }}</span></p>
    <p class="text-center help">操作の仕方がわからない方は<a href="https://github.com/taka0002/task_app" target="_blank" rel=”noopener”>こちら</a>を参照してください</p>
    <form action="{{ url('/logout') }}" method="post" class="post text-right">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">ログアウト</button>
    </form>
    @if (session('status'))
    <div class="status_popup">
        <div class="popup-inner">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    </div>
    @endif

    {{-- エラーメッセージを出力 --}}
    @foreach($errors->all() as $error)
    <p class="error">{{ $error }}</p>
    @endforeach
    {{-- 以下にフォームを追記します。 --}}
    <button class="scroll text-center btn btn-info" type="button" data-toggle="collapse" data-target="#demo">ここをクリックしてやること登録</button>
    <form method="post" action="{{ url('/task_apps') }}" enctype="multipart/form-data" class="form-horizontal collapse" id="demo">
        {{-- LaravelではCSRF対策のため以下の一行が必須です。 --}}
        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" name="body" class="comment_field form-control" placeholder="To Doを入力（20文字まで入力可能）">
        </div>

        <div class="form-group">
            <span>締め切り日時：</span>
            <input type="date" name="date" class="date_field">
            <span class="empty_msg">（空欄の場合は固定表示になります）</span>
        </div>

        <div class="form-group hidden">
            <textarea type="text" name="description" class="remark_field form-control" placeholder="備考欄（300文字まで入力可能）"></textarea>
        </div>

        <div class="form-group">
            <span>ステータス：</span>
            <label>
                <select name="status" class="status form-control">
                        <option value="0">未着手</option>
                        <option value="1">着手中</option>   
                </select>
            </label>
            <input type="submit" value="登録" class="btn btn-primary submit">
        </div>

    </form>
    <p class="text-center done"><a href="{{ url('/task_apps_done')}}" target="_blank" rel=”noopener”>完了済みリストはこちらから</a></p>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm">
                <tr class="thead-light">
                    <th class="text-nowrap">やること</th>
                    <th class="text-nowrap hidden">詳細</th>
                    <form method="get" action="{{ url('/task_apps')}}" id="submit_form">
                        <th class="text-nowrap">
                            <select name="status" class="text">
                                <option value="">現在のステータス</option>
                                <option value="in">着手中を上へ</option>
                                <option value="out">未着手を上へ</option>
                            </select>
                        </th>
                        <th class="text-nowrap">
                            <select name="sort" class="text">
                                <option value="">締め切り期限</option>
                                <option value="asc">昇順</option>
                                <option value="desc">降順</option>
                            </select>
                        </th>
                    </form>
                    <th class="text-nowrap">取り消し</th>
                    <th class="text-nowrap">終わったら</th>
                </tr>
                @forelse($task_apps as $task_app)
                <tr class="pop">
                    <td class="text-nowrap">
                        <form method="post" action="{{ url('/task_apps')}}" id="submit_form">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="hidden" name="id" value="{{ $task_app->id }}">
                            <input type="hidden" name="sql_kind" value="update_text">
                            <div class="text">{{ $task_app->body }}</div>
                        </form>
                    </td>
                    <td class="hidden">
                        @if($task_app->description === null)
                            なし
                        @else
                        <div class="description">
                            <button class="btn btn-primary">詳細</button>
                        </div>
                        @endif
                        <!--ポップアップ時の処理-->
                        <div class="popup">
                            <div class="popup_content">
                                <p>{{ $task_app->description }}</p>
                                <button class="back btn btn-primary">閉じる</button>
                            </div>
                        </div>
                    </td>
                    <td>
                    @if($task_app->date !== null)
                    @if($task_app->status === 0)
                    <form method="post" action="{{ url('/task_apps')}}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                        <input type="submit" value="未着手" class="update">
                        <input type="hidden" name="id" value="{{ $task_app->id }}">
                        <input type="hidden" name="sql_kind" value="update">
                    </form>
                    @elseif($task_app->status === 1)
                    <form method="post" action="{{ url('/task_apps')}}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                        <input type="submit" value="着手中" class="update false">
                        <input type="hidden" name="id" value="{{ $task_app->id }}">
                        <input type="hidden" name="sql_kind" value="update">
                    </form>
                    @endif
                    @endif
                    </td>
                    <td class="text-nowrap">
                        @if($task_app->date === null)
                            <div class="moge">固定</div>
                        @else
                        <form method="post" action="{{ url('/task_apps')}}" id="submit_form">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="id" value="{{ $task_app->id }}">
                                <input type="hidden" name="sql_kind" value="update_date">
                                <span class="date">{{ $task_app->date }}</span>
                        </form>
                        @endif
                    </td>
                    <td>
                    <form method="post" action="{{ url('/task_apps')}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="削除" class="btn btn-primary">
                    <input type="hidden" name="id" value="{{ $task_app->id }}">
                    </form>
                    </td>
                    <td>
                    <form method="post" action="{{ url('/task_apps')}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="完了" class="btn btn-primary delete">
                    <input type="hidden" name="id" value="{{ $task_app->id }}">
                    <input type="hidden" name="body" value="{{ $task_app->body }}">
                    <input type="hidden" name="description" value="{{ $task_app->description }}">
                    </form>
                    </td>
                </tr>
            @empty
                <li class="no_list">リストがありません。</li>
            @endforelse
        </table>
    </div>
</div>
@endsection