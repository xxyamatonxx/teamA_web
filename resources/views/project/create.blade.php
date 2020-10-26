@extends('layouts.app')

@section('content')

<h2>投稿フォーム</h2>

<form action="{{ route('projects.store') }}" method="post">
    @csrf
    <input type="text" name="title">
    <input type="text" name="subtitle">
    <textarea name="overview" cols="30" rows="10"></textarea>
    <input type="file" name="image">
    <input type="number" name="target_money">
    <input type="date" name="start">
    <input type="date" name="end">
    <input type="submit" value="申請する">
</form>


@endsection