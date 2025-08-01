<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // indexアクションでindex.blade.phpを呼び出し
    public function index()
    {
        // $todosにTodoの全てのデータ格納
        $todos = Todo::with('category')->get();
        $categories = Category::all();
        // dd($todos);
        // index.blade.phpとtodosのデータ表示
        return view('index', compact('todos', 'categories'));
    }

    // リクエストを受け取りデータ保存、/にリダイレクト
    public function store(TodoRequest $request)
    {
        // dd($request->all());
        // リクエストのcontentだけ取得
        $todo = $request->only(['content','category_id']);
        Todo::create($todo);

        // /にリダイレクト
        return redirect('/')->with('message', 'Todoを作成しました');
    }

    // データ編集ページの表示
    // public function edit(TodoRequest $request)
    // {
    //     $todos = Todo::find($request->id);
    //     return view('edit', ['form' => $todos]);
    // }

    // 更新機能
    // public function update(TodoRequest $request)
    // {
    //     $form = $request->all();
    //     Todo::find($request->id)->update($form);
    //     return redirect('/')->with('message', 'Todoを更新しました');
    // }
    public function update(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);

        return redirect('/')->with('message', 'Todoを更新しました');
    }
    // 削除機能
    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todoを削除しました');
    }

    public function search(Request $request)
    {
    $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
    $categories = Category::all();

    return view('index', compact('todos', 'categories'));
    }

}