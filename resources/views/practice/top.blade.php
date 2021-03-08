@extends('layout')
@section('title', 'トップページ')
@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-2">
    <h2>ブログ記事一覧</h2>
    @if (session('err_msg'))
    <p class="text-danger">{{ session('err_msg') }}</p>
    @endif
    <table class="table table-striped">
      <tr>
        <th>記事番号</th>
        <th>日付</th>
        <th>種目</th>
        <th>回数</th>
        <th>タイトル</th>
        <th></th>
        <th></th>
      </tr>
      @foreach ($practices as $practice)
      <tr>
        <td>{{ $practice->id }}</td>
        <td>{{ $practice->updated_at }}</td>
        <td>{{ $practice->style }}</td>
        <td>{{ $practice->times }}</td>
        <td><a href="/practice/{{ $practice->id }}">{{ $practice->title }}</a></td>
        <td><button type="button" class="btn btn-primary" onclick="location.href='/practice/edit/{{ $practice->id }}'">編集</button></td>
        <form method="POST" action="{{ route('delete', $practice->id) }}" onSubmit="return checkDelete()">
          @csrf
          <td><button type="submit" class="btn btn-primary" onclick=>削除</button></td>
        </form>
      </tr>
      @endforeach
    </table>
  </div>
</div>
<script>
  function checkDelete() {
    if (window.confirm('削除してよろしいですか？')) {
      return true;
    } else {
      return false;
    }
  }
</script>
@endsection