<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Throwable;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        if ($categories->isEmpty()) {
            return response()->json(['message' => 'No categories found'], 404);
        }
        return response()->json([
            'message' => 'Categories retrieved successfully',
            'data' => $categories
        ], 200);
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'priority' => 'required|integer',
            'icon' => 'required|string|max:255',
            'reservable' => 'required|boolean',
        ]);
        try {

            $category = Category::create([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'description' => $request->description,
                'priority' => $request->priority,
                'icon' => $request->icon,
                'reservable' => $request->reservable,
            ]);
            return response()->json([
                'message' => 'Category created successfully',
                'data' => $category
            ], 201);
        } catch (Throwable $th) {
            return response()->json([
                'message' => 'Failed to create category',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified category.
     */
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json([
            'message' => 'Category retrieved successfully',
            'data' => $category
        ], 200);
    }
    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'priority' => 'sometimes|required|integer',
            'icon' => 'sometimes|required|string|max:255',
            'reservable' => 'sometimes|required|boolean',
        ]);

        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        try {
            $category->update($request->only(['name', 'description', 'priority', 'icon', 'reservable']));
            return response()->json([
                'message' => 'Category updated successfully',
                'data' => $category
            ], 200);
        } catch (Throwable $th) {
            return response()->json([
                'message' => 'Failed to update category',
                'error' => $th->getMessage()
            ], 500);
        }
    }
    /**
     * Remove the specified category from storage.
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        try {
            $category->delete();
            return response()->json(['message' => 'Category deleted successfully'], 200);
        } catch (Throwable $th) {
            return response()->json([
                'message' => 'Failed to delete category',
                'error' => $th->getMessage()
            ], 500);
        }
    }

}
