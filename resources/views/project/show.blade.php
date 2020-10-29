@extends('layouts.app')

@section('content')
<div class="show_title">
<h1>{{$project->title}}</h1>
</div>
<div class="show_image">
<!--画像について記述-->
</div>
<!--プロジェクト詳細↓-->
<div class="show_show">
<p>{{$project->overview}}</p>
</div>
<div class="show_now">
<p>現在:{{$project->now_support_money}}円</p>
<p>支援者:{{$project->now_supportors}}人</p>
<p>終了日:{{$project->end}}</p>
</div>
<div class="show_support">
<p>プロジェクトを支援する</p>
</div>







@endsection