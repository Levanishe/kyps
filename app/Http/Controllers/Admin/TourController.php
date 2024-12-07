<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::all();
        return view('admin.tours.index', compact('tours'));
    }

    public function show($id)
    {
        $tour = Tour::findOrFail($id);
        return view('admin.tours.show', compact('tour'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.tours.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'category_id' => 'required|exists:categories,id',
            'route' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'dates' => 'required|string', // Можно использовать json, если вы решите хранить массив
        ]);

        $tour = new Tour();
        $tour->name = $request->name;
        $tour->description = $request->description;
        $tour->price = $request->price;
        $tour->category_id = $request->category_id;
        $tour->route = $request->route;
        $tour->duration = $request->duration;
        $tour->dates = $request->dates; // Если вы используете json, вам нужно будет преобразовать его в массив

        if ($request->hasFile('image')) { 
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName(); 
            // Перемещаем изображение в папку public/images/tours 
            $request->file('image')->move(public_path('images/tours'), $imageName); 
            $tour->image = 'images/tours/' . $imageName; 
        }

        $tour->save();

        return redirect()->route('admin.tours.index')->with('success', 'Тур успешно создан.');
    }

    public function edit($id)
    {
        $tour = Tour::findOrFail($id);
        $categories = Category::all();
        return view('admin.tours.edit', compact('tour', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'category_id' => 'required|exists:categories,id',
            'route' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'dates' => 'required|string', // Можно использовать json, если вы решите хранить массив
        ]);

        if ($request->hasFile('image')) {
            // Удаляем старое изображение, если оно есть
            if ($tour->image) {
                Storage::delete($tour->image);
            }
            
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName(); 
            // Перемещаем изображение в папку public/images/tours 
            $request->file('image')->move(public_path('images/tours'), $imageName);
            $tour->image = 'images/tours/' . $imageName; 
        }

        $tour->name = $request->input('name');
        $tour->description = $request->input('description');
        $tour->price = $request->input('price');
        $tour->category_id = $request->input('category_id');
        $tour->route = $request->input('route');
        $tour->duration = $request->input('duration');
        $tour->dates = $request->input('dates'); // Если вы используете json, вам нужно будет преобразовать его в массив

        $tour->save();

        return redirect()->route('admin.tours.index')->with('success', 'Тур успешно обновлён.');
    }

    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);

        if ($tour->image) {
            Storage::delete($tour->image);
        }

        $tour->delete();

        return redirect()->route('admin.tours.index')->with('success', 'Тур успешно удален.');
    }
}
