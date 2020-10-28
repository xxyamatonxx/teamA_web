@extends('layouts.app')

@section('content')

<h1>{{$project->title}}</h1>

<!--画像について記述-->

<!--プロジェクト詳細↓-->
<p>{{$project->overview}}</p>

<p>現在:{{$project->now_support_money}}円</p>
<p>支援者:{{$project->now_supportors}}人</p>
<p>終了日:{{$project->end}}</p>

<p>プロジェクトを支援する</p>







@endsection