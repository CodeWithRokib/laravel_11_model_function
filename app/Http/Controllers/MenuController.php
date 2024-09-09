<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\Menu;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get paginated results from the database, directly from the query builder
        $menus = Menu::latest()->paginate(10);  // This ensures the latest products are displayed
        $titles = DB::table('menus')->pluck('name');
 
        foreach ($titles as $title) {
            echo $title;
        }
    
        return view('practice.menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('practice.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request): RedirectResponse
    {
        try {
            // $validatedData = $request->validated();
            DB::beginTransaction();
            $product = (new Menu())->storeMenu($request);
            DB::commit();
            return redirect()->route('menus.index')->with('success', 'Menu created successfully!');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu): RedirectResponse
    {
        try {
            // $validatedData = $request->validated();
            DB::beginTransaction();
            (new Menu())->updateMenu($request, $menu);
            DB::commit();
            return redirect()->route('menus.index')->with('success', 'Menu created successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        try {
            // $validatedData = $request->validated();
            DB::beginTransaction();
            (new Menu())->deleteMenu($menu);
            DB::commit();
            return redirect()->route('menus.index')->with('success', 'Menu created successfully!');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create product: ' . $e->getMessage());
        }
    }
}
