<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::get();
        return view('category.index', compact('categories'));
    }
    /**
     * store data entered inmodal to db
     */
    public function create(CategoryRequest $request)
    {
        Category::create([
            'name' => $request->category,
        ]);
        $status = true;
        $message = 'Stored successfully.';

        return Response::json(['status' => $status, 'message' => $message, 'data' => []]);
    }

    /**
     * append data dynamically to edit modal
     */
    public function edit(Category $category)
    {
        $html = view('category.includes.category-edit-modal', compact('category'))->render();
        return Response::json(['message' => $html]);
    }

    /**
     * update data
     */
    public function update(CategoryRequest $request)
    {
        $category = Category::where('id', $request->categoryId)->first();
        $category->update([
            'name' => $request->category,
            'slug' =>
        ]);
        $status = true;
        $message = 'Stored successfully.';

        return Response::json(['status' => $status, 'message' => $message, 'data' => []]);
    }

    /**
     * delete data
     */
    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }

    public function getSlug(string $name)
    {
        
    }
}
