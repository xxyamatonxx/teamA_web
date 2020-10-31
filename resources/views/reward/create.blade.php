@extends('layouts.app')

@section('content')

<h2>リターン追加フォーム</h2>
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

@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
<form action="{{ route('reward.store',$project->id) }}" method="post">
  @csrf
  <dl>
    <dt>タイトル</dt>
    <dd><input type="text" name="title"></dd>
    <dt>詳細</dt>
    <dd><textarea name="overview" cols="30" rows="10"></textarea></dd>
    <dt>金額</dt>
    <dd><input type="number" name="price"></dd>
    <dd></dd>
    <dd><input type="submit" value="リターンを追加する"></dd>
  </dl>
</form>


@endsection