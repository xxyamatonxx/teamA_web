@extends('layouts.app')

@section('content')
 
 <!--プロジェクト一覧-->
 @foreach ($projects as $project)
    <a href="{{ route('projects.show' , $project->id )}}">
    <div class="box">
     <div class="project_all">
      <div class="project_image">
      <!--ここに画像について書く-->
      </div>
      <!--プロジェクトタイトル表示-->
      <div class="project_title">
      <p>{{$project->title}}</p>
      </div>
      <!--プロジェクトの現状(現在金額、支援者、終了日)-->
      <div class="project_now">
      <P>現在:{{$project->now_support_money}}円</P>
      <p>支援者:{{$project->now_supportors}}人</p>
      <p>終了日:{{$project->end}}</p>
      </div>
     </div>
     </div>
     </a>

 @endforeach

@endsection