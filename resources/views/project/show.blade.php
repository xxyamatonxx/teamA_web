@extends('layouts.app')

@section('content')
<div class="show_title">
  <h1>{{$project->title}}</h1>
</div>
<div class="show_image">
  <img  src="{{ Storage::url($project->image) }}" >
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
<a href="#">
  <div class="show_support">
    <div class="support_text">
      <p>プロジェクトを支援する ➡︎</p>
    </div>
  </div>
</a>







@endsection