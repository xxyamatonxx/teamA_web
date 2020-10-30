@extends('layouts.app')

@section('content')
<div class="show_title">
  <h1>{{$project->title}}</h1>
</div>
<div class="show_image">
  <img src="{{ Storage::url($project->image) }}">
</div>
<!--プロジェクト詳細↓-->
<div class="show_overview">
  <div class="overview_text">
    <p>{{$project->overview}}</p>
  </div>
</div>
<div class="now_box">
  <div class="show_now">
    <p class="now">現在:<span class="now_now">{{$project->now_support_money}}</span>円</p>
    <p class="now">支援者:<span class="now_now">{{$project->now_supportors}}</span>人</p>
    <p class="now">終了日:<span class="now_now">{{$project->end}}</span></p>
  </div>
</div>

@foreach ($rewards as $reward)
<div>
  <p>タイトル:{{$reward->title}}</p>
  <p>説明:{{$reward->overview}}</p>
  <p>金額:{{$reward->price}}</p>
  <form action="{{route('support.store',$reward->id)}}" method="post">
    @csrf
    <button type=" submit" onclick="return confirm('支援します。よろしいですか？')">支援する</button>
  </form>
</div>
@endforeach







@endsection