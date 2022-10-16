<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Spatie\FlareClient\FlareMiddleware\CensorRequestHeaders;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,cat_name,except,idcategorie',
        ]);

        $category = new Category;
        $category->cat_name = $request->name;
        $category->cat_slug = $request->slug;
        $category->save();
        return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría se creó con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $category = Category::where('idcategorie', $category)->firstOrFail();
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,cat_slug,$category,idcategorie",
        ]);

        $category2 = Category::where('idcategorie', $category)->update(['cat_name' => $request->name, 'cat_slug' => $request->slug]);
        // $category2->cat_name = $category;
        // $category2->cat_name = $request->name;
        // $category2->cat_slug = $request->slug;
        // $category2->save();

        return redirect()->route('admin.categories.edit', $category)->with('info', 'La categoría se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $category = Category::where('idcategorie', $category)->delete();
        return redirect()->route('admin.categories.index')->with('info', 'La categoría se eliminó con éxito');
    }
}
