<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SubCategoryRequest;

class SubCategoryController extends Controller
{

    public function index()
    {
        $cms_content = [
            'module'       => __('SubCategory'),
            'module_url'   => route('subcategories.index'),
            'active_title' => __('List'),
            'button_type'  => 'create',
            'button_title' => __('SubCategory Create'),
            'button_url'   => route('subcategories.create'),
        ];
        $subcategories = SubCategory::all();
        return view('practice.subcategory.index', compact('subcategories','cms_content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('practice.subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubCategoryRequest $request): RedirectResponse
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $subcategories = (new SubCategory())->storeSubCategory($request);
            DB::commit();
            return redirect()->route('subcategories.index')->with('success', 'SubCategory created successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subcategory)
    {
        $categories = Category::all();
        return view('practice.subcategory.edit',compact('categories','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, SubCategory $subcategory)
    {
        try {
           DB::beginTransaction();
           (new SubCategory())->updateSubCategory($request, $subcategory);
           DB::commit();
           return redirect()->route('subcategories.index')->with('success', 'SubCategory updated successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subcategory)
    {
        try {
            DB::beginTransaction();
            (new SubCategory())->deleteSubCategory($subcategory);
            DB::commit();
            return redirect()->back()->with('success','Sub Category Deleted Successfully');

        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }
}
