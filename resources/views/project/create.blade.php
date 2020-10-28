@extends('layouts.app')

@section('content')

<h2>投稿フォーム</h2>
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
<form action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title">
    <input type="text" name="subtitle">
    <textarea name="overview" cols="30" rows="10"></textarea>
    <input type="file" name="image" accept="image/png, image/jpeg">
    <input type="number" name="target_money">
    <input type="date" name="start">
    <input type="date" name="end">
    <input type="submit" value="申請する">
</form>


@endsection