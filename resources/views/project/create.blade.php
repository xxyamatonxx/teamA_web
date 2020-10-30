@extends('layouts.app')

@section('content')

<h2>投稿フォーム</h2>
@foreach ($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
<form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="text" name="title" value="{{ old('title')}}">
  <input type="text" name="subtitle" value="{{ old('subtitle')}}">
  <textarea name="overview" cols="30" rows="10">{{ old('overview')}}</textarea>
  <input type="file" name="image" accept="image/png, image/jpeg">
  <input type="number" name="target_money" value="{{ old('target_money')}}">
  <input type="date" name="start" value="{{ old('start')}}">
  <input type="date" name="end" value="{{ old('end')}}">
  <input type="submit" value="申請する">


</form>


@endsection