@extends('layout')
@section('title', '詳細')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2>{{ $practice->title }}</h2>
      <span>作成日: {{ $practice->created_at }}</span><br>
      <span>更新日: {{ $practice->updated_at }}</span>
      <p>{{ $practice->content }}</p>
  </div>
</div>
@endsection