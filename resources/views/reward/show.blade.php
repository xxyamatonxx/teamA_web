@extends('layouts.app')

@section('content')

<h3>リターン詳細</h3>
<p>タイトル：{{$reward->title}}</p>
<p>価格：{{$reward->price}}</p>
<p>詳細：{{$reward->overview}}</p>

@endsection