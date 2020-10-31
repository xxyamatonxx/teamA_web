@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('マイページ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    お名前：{{$user_data["name"]}}<br>
                    メールアドレス：{{$user_data["email"]}}<br>
                    <?php $password=$user_data["password"];
                    $hidden_pass = str_repeat('*', strlen($password));
                    echo "パスワード" . "：" . $hidden_pass?>
                    
                    <form method="post" action="{{route('edit.profile')}}">
                    @csrf
                    <input type="hidden" name= "user_id" value="{{$user_data['id']}}">
                    <button type="submit">プロフィールを編集</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@include('project.project_template')

@endsection

