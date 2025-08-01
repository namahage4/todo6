<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // indexアクションでcategory.blade.php表示
    public function index()
    {
        // $categoriesにCategoryの全てのデータ格納
        $categories = Category::all();
        // category.blade.phpとcategoriesのデータ表示
        return view('category', compact('categories'));
    }
    // フォームから送られた入力内容をcategoryテーブルに追加
    public function store(Request $request)
    {
        // dd($request->all());
        $category = $request->only(['name']);
        Category::create($category);

        return redirect('/categories')->with('message', 'categoryを作成しました');
    }
    // 更新機能
    public function update(Request $request)
    {
        // リクエストのcategoryだけ取得
        $category = $request->only(['name']);
        Category::find($request->id)->update($category);
        // /categoryにリダイレクト
        return redirect('/categories')->with('message', 'カテゴリを更新しました');
    }
    // 削除機能
    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect('/categories')->with('message', 'カテゴリを削除しました');
    }

    // $request->validate([
    //     'category_id' => 'required|exists:categories,id',
    // ]);
}
