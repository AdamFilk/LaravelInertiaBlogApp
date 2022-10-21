<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->inertiaShareData('nav_data', 
        ['breadcrumb'=>
         [
            ['name'=>'Category','link'=> null],
         ],
        'page_title'=>'Category']);
        return inertia('BlogCategory/Index',
            [
            'categories'=> Category::orderByDesc('id')->paginate(15)
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->inertiaShareData('nav_data', 
        ['breadcrumb'=>
         [
            ['name'=>'Category','link'=> '/admin/category'],
            ['name'=>'Create','link'=> null],
         ],
        'page_title'=>'Category Create']);
        return inertia('BlogCategory/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>"required|string|unique:categories"
        ]);
        Category::create($request->all());
        return redirect()->route('admin.category.index')->with('success','Category Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->inertiaShareData('nav_data', 
        ['breadcrumb'=>
         [
            ['name'=>'Category','link'=> '/admin/category'],
            ['name'=>'Edit','link'=> null],
         ],
        'page_title'=>'Category Create']);
        $category = Category::find($id);
        return inertia('BlogCategory/Edit',[
            'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'=>"required|string|unique:categories,name,".$id
        ]);
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('admin.category.index')->with('success','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('admin.category.index')->with('success','Category Deleted');
    }
}
