<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // indexアクションでindex.blade.phpを呼び出し
    public function index()
    {
        // $todosにTodoの全てのデータ格納
        $todos = Todo::all();
        // index.blade.phpとtodosのデータ表示
        return view('index', compact('todos'));
    }
    // リクエストを受け取りデータ保存、/にリダイレクト
    public function store(TodoRequest $request)
    {
        // リクエストのcontentだけ取得
        $todo = $request->only(['content']);
        Todo::create($todo);

        // /にリダイレクト
        return redirect('/')->with('message', 'Todoを作成しました');
    }
    // データ編集ページの表示
    public function edit(TodoRequest $request)
    {
        $todos = Todo::find($request->id);
        return view('edit', ['form' => $todos]);
    }

    // 更新機能
    public function update(TodoRequest $request)
    {
        $form = $request->all();
        Todo::find($request->id)->update($form);
        return redirect('/')->with('message', 'Todoを更新しました');
    }
    // 削除機能
    public function destroy(Request $request)
{
    Todo::find($request->id)->delete();
    return redirect('/')->with('message', 'Todoを削除しました');
}


}