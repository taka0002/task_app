@extends('layouts.default')

@section('title', $title)

@section('content')
<div class="container">
    <h1 class="text-primary"><a href="http://takahiro-kym.sakura.ne.jp/task_app/public/task_apps" rel=”noopener”>{{ $title }}</a></h1>
    <p class="username text-center">現在のユーザー名: <span>{{ Auth::user()->name }}</span></p>
    <form action="{{ url('/logout') }}" method="post" class="post text-right">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary">ログアウト</button>
    </form>

    @if (session('status'))
    <div class="alert alert-success" role="alert" onclick="this.classList.add('hidden')">
        {{ session('status') }}
    </div>
    @endif

    {{-- エラーメッセージを出力 --}}
    @foreach($errors->all() as $error)
    <p class="error">{{ $error }}</p>
    @endforeach
    {{-- 以下にフォームを追記します。 --}}
    <form method="post" action="{{ url('/task_apps') }}" enctype="multipart/form-data" class="form-horizontal">
        {{-- LaravelではCSRF対策のため以下の一行が必須です。 --}}
        {{ csrf_field() }}

        <div class="form-group">
            <input type="text" name="body" class="comment_field form-control" placeholder="To Doを入力">
        </div>

        <div class="form-group">
            <span>締め切り日時：</span>
            <input type="date" name="date" class="date_field" placeholder="締め切り日時を入力">
        </div>

        <div class="form-group">
            <label>
                <select name="status" class="status form-control">
                        <option value="0">未着手</option>
                        <option value="1">着手中</option>   
                </select>
            </label>
        </div>

        <div class="post form-group">
            <input type="submit" value="登録" class="btn btn-primary">
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
                <tr class="thead-light">
                    <th class="text-nowrap">やること</th>
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
                    <th class="text-nowrap">終わったら</th>
                </tr>
                @forelse($task_apps as $task_app)
                <tr class="<?php echo $task_app->status === 1 ? "false" : "" ?>">
                    <td class="text-nowrap">
                        <form method="post" action="{{ url('/task_apps')}}" id="submit_form">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                            <input type="hidden" name="id" value="{{ $task_app->id }}">
                            <input type="hidden" name="sql_kind" value="update_text">
                            <div class="text">{{ $task_app->body }}</div>
                        </form>
                    </td>
                    <td>
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
                        <input type="submit" value="着手中" class="update">
                        <input type="hidden" name="id" value="{{ $task_app->id }}">
                        <input type="hidden" name="sql_kind" value="update">
                    </form>
                    @endif
                    </td>
                    <td class="text-nowrap">
                        <form method="post" action="{{ url('/task_apps')}}" id="submit_form">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="id" value="{{ $task_app->id }}">
                                <input type="hidden" name="sql_kind" value="update_date">
                                <span class="date">{{ $task_app->date }}</span>
                        </form>
                    </td>
                    <td>
                    <form method="post" action="{{ url('/task_apps')}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="submit" value="削除" class="btn btn-primary delete">
                    <input type="hidden" name="id" value="{{ $task_app->id }}">
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