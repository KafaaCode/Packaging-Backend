<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        // $this->middleware('permission:create-categories', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit-categories', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete-categories', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = Category::all(); // or use pagination if there are many categories
        return view('admin.categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    public function create()
    {
        $countries = Country::all();
        $specializations = Specialization::all();
        return view('admin.categories.create', compact('countries', 'specializations'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country_id' => 'required|exists:countries,id',
            'specialization_id' => 'required|exists:specializations,id',
        ]);

        Category::create([
            'name' => $request->input('name'),
            'image' => $request->file('image')->store('categories', 'public'),
            'country_id' => $request->input('country_id'),
            'specialization_id' => $request->input('specialization_id'),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully');
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $countries = Country::all();
        $specializations = Specialization::all();
        return view('admin.categories.edit', compact('category', 'countries', 'specializations'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,' . $id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'country_id' => 'required|exists:countries,id',
            'specialization_id' => 'required|exists:specializations,id',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        if ($request->hasFile('image')) {
            $category->image = $request->file('image')->store('categories', 'public');
        }
        $category->country_id = $request->input('country_id');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }


}