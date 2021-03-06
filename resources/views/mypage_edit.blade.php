@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール変更</div>

                {{-- エラーメッセージ --}}
                @if(count($errors) > 0)
                <div class="container mt-2">
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- 更新成功メッセージ --}}
                @if (session('update_password_success'))
                <div class="container mt-2">
                    <div class="alert alert-success">
                        {{session('update_password_success')}}
                    </div>
                </div>
                @endif

                {{-- フォーム --}}
                <div class="card-body">
                    <form method="post" action="{{route('edit.data')}}">
                        @csrf
                        <input type="hidden" name="{{$user_id}}">
                        <div class="form-group">
                            <label for="password">新しい名前</label>
                            <div>
                                <input id="password" class="form-control" name="new-name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">新しいメールアドレス</label>
                            <div>
                                <input id="password" class="form-control" name="new-email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="current">現在のパスワード</label>
                            <div>
                                <input id="current" type="password" class="form-control" name="current-password" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">新しいパスワード</label>
                            <div>
                                <input id="password" type="password" class="form-control" name="new-password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm">新しいパスワード（確認用）</label>
                            <div>
                                <input id="confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">変更</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection