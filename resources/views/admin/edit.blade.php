@extends('layouts.admin')
@section('content')

<p>ユーザー名：{{$user->name}}</p>

<h3>タイトル：{{$project->title}}</h3>
<div class="flex reward-box">
  <img class="show_img" src="{{ Storage::url($project->image) }}">
  <!--プロジェクト詳細↓-->
  <div class="project-detail">
    <p>{{$project->overview}}</p>
    <p class="">目標金額:<span class="">{{$project->now_support_money}}</span>円</p>
    <p class="">支援者:<span class="">{{$project->now_supportors}}</span>人</p>
    <p class="">終了日:<span class="">{{$project->end}}</span></p>
  </div>
</div>

<h4>リターン一覧</h4>
@foreach ($rewards as $reward)
<div class="reward">
  <a href="{{route('reward.show',$reward->id)}}">
    <p>タイトル:{{$reward->title}}</p>
    <p>説明:{{$reward->overview}}</p>
    <p>金額:{{$reward->price}}</p>
  </a>
</div>
@endforeach

@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach

<form action=" {{route('admin.release_project_update',$project->id)}}" method="post">
  @csrf
  <input type="radio" name="release" value="0">非公開
  <input type="radio" name="release" value="1">公開
  <input type="submit" value="更新">
</form>

@endsection