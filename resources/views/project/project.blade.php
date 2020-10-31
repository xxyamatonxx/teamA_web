@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
<!--プロジェクト一覧-->
<div class="container">
    @foreach ($projects as $project)
    @if ($project->release == 1)
    <a href="{{ route('projects.show' , $project->id )}}">
        <div class="all_page">
            <div class="box">
                <div class="project_all">
                    <div class="project_imageBox">
                        <div class="project_image">
                            <img src="{{ Storage::url($project->image) }}">
                        </div>
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
    @endif



    @endforeach
</div>




@endsection