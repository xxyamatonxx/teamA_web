@extends('layouts.app')
@section('content')

<h3>管理者ページ</h3>

<p>ユーザー名：{{$user->name}}</p>

<div>
  <h4>プロジェクト詳細</h4>
  <p>タイトル：{{$project->title}}</p>
  <img src="{{ Storage::url($project->image) }}" alt="{{$project->title}}の画像">
  <p>サブタイトル：{{$project->title}}</p>
  <p>説明：{{$project->title}}</p>
  <p>目標金額：{{$project->target_money}}</p>
  <p>公開予定日：{{$project->start}}</p>
  <p>終了予定日：{{$project->end}}</p>
</div>

@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach

<form action="{{route('admin.release_project_update',$project->id)}}" method="post">
  @csrf
  <input type="radio" name="release" value="0">非公開
  <input type="radio" name="release" value="1">公開
  <input type="submit" value="更新">
</form>

@endsection