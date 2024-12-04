<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    // Отображение списка туров
    public function index(Request $request)
    {
        $categoryId = $request->get('category_id'); // Получаем ID категории из запроса
    
        // Если указан ID категории, фильтруем туры по категории, иначе получаем все туры
        $tours = $categoryId ? Tour::where('category_id', $categoryId)->with('category')->get() : Tour::with('category')->get();
        
        // Получаем все категории для отображения в представлении
        $categories = Category::all();
    
        return view('user.tours.index', compact('tours', 'categories'));
    }
    

    // Показ формы создания нового тура
    public function create()
    {
        return view('user.tours.create'); // Возвращаем представление с формой создания
    }

    // Сохранение нового тура
    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Создаем новый тур
        Tour::create($request->all());

        // Перенаправляем на страницу с турами с сообщением об успехе
        return redirect()->route('user.tours.index')->with('success', 'Тур успешно создан!');
    }

    // Показ конкретного тура
    public function show(Tour $tour)
    {
        return view('user.tours.show', compact('tour')); // Возвращаем представление с информацией о туре
    }

    // Показ формы для редактирования тура
    public function edit(Tour $tour)
    {
        return view('user.tours.edit', compact('tour')); // Возвращаем представление с формой редактирования
    }

    // Обновление тура
    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);

        // Валидация
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Правило для изображения
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

    // Удаление тура
    public function destroy(Tour $tour)
    {
        $tour->delete(); // Удаляем тур
        // Перенаправляем на страницу с турами с сообщением об успехе
        return redirect()->route('user.tours.index')->with('success', 'Тур успешно удален!');
    }

}
