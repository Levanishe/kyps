<?php

namespace App\Http\Controllers;

use App\Models\Tour; // Не забудьте импортировать модель Tour
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTourController extends Controller
{
    // Метод для отображения списка туров
    public function index()
    {
        $tours = Tour::all(); // Получаем все туры
        return view('admin.tours.index', compact('tours'));
    }

    // Метод для отображения формы создания нового тура
    public function create()
    {
        return view('admin.tours.create'); // Отображаем форму создания
    }

    // Метод для сохранения нового тура
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        $tour = new Tour();
        $tour->name = $request->name;
        $tour->description = $request->description;
        $tour->price = $request->price;
    
        // Обработка изображения
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/tours', 'public'); // Сохранение изображения
            $tour->image = $imagePath; // Сохранение пути к изображению
        }
    
        $tour->save();
    
        return redirect()->route('admin.tours.index')->with('success', 'Тур успешно создан.');
    }

    // Метод для отображения формы редактирования тура
    public function edit($id)
    {
        $tour = Tour::findOrFail($id); // Находим тур по ID
        return view('admin.tours.edit', compact('tour'));
    }

    // Метод для обновления тура
    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);
        
        // Валидация
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Правило для изображения
        ]);

        // Сохранение изображения
        if ($request->hasFile('image')) {
            // Удаление старого изображения, если оно существует
            if ($tour->image) {
                Storage::delete($tour->image);
            }
            // Сохранение нового изображения
            $path = $request->file('image')->store('images/tours'); // Сохранение изображения в папку public/images/tours
            $tour->image = $path; // Сохранение пути к изображению в базе данных
        }

        // Обновление других полей
        $tour->name = $validated['name'];
        $tour->description = $validated['description'];
        $tour->save();

        return redirect()->route('admin.tours.index')->with('success', 'Тур обновлен успешно!');
    }
}
