<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category = new Category();
        $category->name = $request->name;

        if ($request->hasFile('image')) {
            // Создаем уникальное имя для изображения
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            // Перемещаем изображение в папку public/images/categories
            $request->file('image')->move(public_path('images/categories'), $imageName);
            // Сохраняем относительный путь к изображению в базе данных
            $category->image = 'images/categories/' . $imageName;
        }

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Категория добавлена успешно!');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $category->name = $request->name;

        if ($request->hasFile('image')) {
            // Удаляем старое изображение, если оно есть
            if ($category->image) {
                @unlink(public_path($category->image));
            }

            // Создаем уникальное имя для нового изображения
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            // Перемещаем новое изображение в папку public/images/categories
            $request->file('image')->move(public_path('images/categories'), $imageName);
            // Сохраняем относительный путь к новому изображению в базе данных
            $category->image = 'images/categories/' . $imageName;
        }

        $category->save();

        return redirect()->route('admin.categories.index')->with('success', 'Категория обновлена успешно!');
    }

    public function destroy(Category $category)
    {
        // Удаление изображения, если оно есть
        if ($category->image) {
            @unlink(public_path($category->image));
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Категория удалена успешно.');
    }
}
