@extends('layout')
@section('title', '編集')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2>ブログ編集フォーム</h2>
    <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
      @csrf
      <input type="hidden" name="id" value="{{ $practice->id }}">
      <div class="form-group">
        <label for="title">
          タイトル
        </label>
        <input id="title" name="title" class="form-control" value="{{ $practice->title }}" type="text">
        @if ($errors->has('title'))
        <div class="text-danger">
          {{ $errors->first('title') }}
        </div>
        @endif
      </div>
      <div class="form-group">
        <label for="style">
          種目
        </label>
        <input id="style" name="style" class="form-control" rows="4" value="{{ $practice->style }}">
        @if ($errors->has('style'))
        <div class="text-danger">
          {{ $errors->first('style') }}
        </div>
        @endif
      </div>
      <div class="form-group">
        <label for="times">
          回数
        </label>
        <input id="times" name="times" class="form-control" rows="4" value="{{ $practice->times }}">
        @if ($errors->has('times'))
        <div class="text-danger">
          {{ $errors->first('times') }}
        </div>
        @endif
      </div>
      <div class="form-group">
        <label for="content">
          本文
        </label>
        <textarea id="content" name="content" class="form-control" rows="4">{{ $practice->content }}</textarea>
        @if ($errors->has('content'))
        <div class="text-danger">
          {{ $errors->first('content') }}
        </div>
        @endif
      </div>
      <div class="mt-5">
        <a class="btn btn-secondary" href="{{ route('practice') }}">
          キャンセル
        </a>
        <button type="submit" class="btn btn-primary">
          更新する
        </button>
      </div>
    </form>
  </div>
</div>
<script>
  function checkSubmit() {
    if (window.confirm('更新してよろしいですか？')) {
      return true;
    } else {
      return false;
    }
  }
</script>
@endsection