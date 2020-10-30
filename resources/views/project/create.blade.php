@extends('layouts.app')

@section('content')
<h2>投稿フォーム</h2>
@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
<form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <dl>
    <dt>※プロジェクトタイトル</dt>
    <dl><input type="text" name="title" value="{{ old('title')}}"></dl>

    <dt>サブタイトル</dt>
    <dl><input type="text" name="subtitle" value="{{ old('subtitle')}}"></dl>

    <dt>※プロジェクト説明</dt>
    <dl><textarea name="overview" cols="30" rows="10">{{ old('overview')}}</textarea></dl>

    <dt>※イメージ画像</dt>
    <dl><input type="file" name="image" accept="image/png, image/jp}}"></dl>

    <dt>※目標金額</dt>
    <dl><input type="number" name="target_money" value="{{ old('target_money')}}"></dl>

    <dt>※掲載開始予定日</dt>
    <dl><input type="date" name="start" value="{{ old('start')}}"></dl>

    <dt>※掲載終了予定日</dt>
    <dl><input type="date" name="end" value="{{ old('end')}}"></dl>
    <dt></dt>
    <dl><input type="submit" value="申請する"></dl>
  </dl>
</form>



@endsection