@extends('app')
  
  @section('content')
      <h2 class="page-header">記事詳細</h2>
      <ul class="list-inline">
          <li>
              <a href="/articles/edit/{{{ $article->id }}}" class="btn btn-primary pull-left">編集</a>
          </li>
          <li>
              {!! Form::open(['action' => ['ArticlesController@postDelete', $article->id]]) !!}
              <button type="submit" class="btn btn-danger pull-left">削除</button>
              {!! Form::close() !!}
          </li>
      </ul>
      <table class="table table-striped">
          <tbody>
          <tr>
              <th>タイトル</th>
              <td>{{{ $article->title }}}</td>
          </tr>
          <tr>
              <th>本文</th>
              <td>{{{ $article->body }}}</td>
          </tr>
          <tr>
              <th>作成日時</th>
              <td>{{{ $article->created_at }}}</td>
          </tr>
          <tr>
              <th>更新日時</th>
              <td>{{{ $article->updated_at }}}</td>
          </tr>
          </tbody>
      </table>
  @endsection