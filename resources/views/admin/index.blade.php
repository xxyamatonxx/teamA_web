@extends('layouts.admin')
@section('content')

<button>
<a href="{{route('admin.projects_release')}}">公開プロジェクト一覧</a>
</button>

<button>
<a href="{{route('admin.projects_request')}}">申請プロジェクト一覧</a>
</button>

@endsection