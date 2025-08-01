@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection

@section('content')
<div class="todo__alert">
  @if(session('message'))
  <div class="todo__alert--success">
    {{ session('message') }}
  </div>
  @endif
  @if($errors->any())
  <div class="todo__alert--danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
</div>

<div class="todo__content">
    <!-- <form class="create-form" action="/todos" method="post"> -->
    <form class="create-form" action="/categories" method="post">
        @csrf
        <div class="create-form__item">
            <input class="create-form__item-input" type="text" name="name">
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">作成</button>
        </div>
    </form>

    <div class="category-table">
        <table class="category-table__inner">
            <tr class="category-table__row">
                <th class="category-table__item">category</th>
            </tr>
            @foreach($categories as $category)
            <tr class="category-table__row">
                <td class="category-table__item">
                    <form action="/categories/update" class="update-form" method="post">
                        @method('patch')
                        @csrf
                        <div class="update-form__item">
                            <input type="text" name="category" class="update-form__item-input" value="{{ $category['name'] }}">
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                        </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="category-table__item">
                    <form action="/categories/delete" class="delete-form" method="post">
                        @method('delete')
                        @csrf
                        <div class="delete-form__button">
                            <input type="hidden" name="id" value="{{ $category['id'] }}">
                            <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection