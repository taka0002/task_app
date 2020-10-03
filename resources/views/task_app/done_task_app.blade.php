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
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm">
            <tr class="thead-light">
                <th class="text-nowrap col-6">やったこと</th>
                <th class="text-nowrap hidden">詳細</th>
                <th class="text-nowrap">完了日</th>
            </tr>
        @forelse($task_apps_archive as $task_app_archive)
            <tr class="pop">
                <td class="text-nowrap col-6">
                    <div class="text">{{ $task_app_archive->body }}</div>
                </td>
                <td class="hidden">
                    @if($task_app_archive->description === null)
                        なし
                    @else
                    <div class="description">
                        <button class="btn btn-primary">詳細</button>
                    </div>
                    @endif
                    <!--ポップアップ時の処理-->
                    <div class="popup">
                        <div class="popup_content">
                            <p>{{ $task_app_archive->description }}</p>
                            <button class="back btn btn-primary">閉じる</button>
                        </div>
                    </div>
                </td>
                <td class="text-nowrap">
                    <div class="text">{{ $task_app_archive->created_at }}</div>
                </td>
            </tr>
        @empty
            <li class="no_list">リストがありません。</li>
        @endforelse
        </table>
    </div>
</div>
@endsection