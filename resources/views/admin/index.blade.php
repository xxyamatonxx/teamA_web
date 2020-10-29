@extends('layouts.app')
@section('content')

<h3>管理者ページ</h3>
<button>
<a href="{{route('admin.projects_release')}}">公開プロジェクト一覧</a>
</button>

<button>
<a href="{{route('admin.projects_request')}}">申請プロジェクト一覧</a>
</button>

@endsection