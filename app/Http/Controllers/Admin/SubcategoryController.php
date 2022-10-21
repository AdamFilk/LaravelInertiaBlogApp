<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
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
            ['name'=>'Subcategory','link'=> null],
         ],
        'page_title'=>'Subcategory']);
        return inertia('BlogSubcategory/Index',
            [
            'subcategories'=> Subcategory::with('category')->orderByDesc('id')->paginate(15),
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
            ['name'=>'Subcategory','link'=> '/admin/subcategory'],
            ['name'=>'Create','link'=> null],
         ],
        'page_title'=>'Subcategory Create']);
        return inertia('BlogSubcategory/Create',[
            'categories'=> Category::all()
        ]);
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
            'name'=>"required|string|unique:subcategories",
            'category_id'=>'required|integer',
        ],[
            'category_id'=> 'Need to select a category'
        ]);
        Subcategory::create($request->all());
        return redirect()->route('admin.subcategory.index')->with('success','Subcategory Created');
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
            ['name'=>'Subcategory','link'=> '/admin/subcategory'],
            ['name'=>'Edit','link'=> null],
         ],
        'page_title'=>'Subcategory Create']);
        $subcategory = Subcategory::find($id);
        return inertia('BlogSubcategory/Edit',[
            'subcategory'=>$subcategory,
            'categories'=> Category::all()
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
            'name'=>"required|string|unique:categories,name,".$id,
            'category_id'=>'required|integer',
        ],[
            'category_id'=> 'Need to select a category'
        ]);
        $subcategory = Subcategory::find($id);
        $subcategory->update($request->all());
        return redirect()->route('admin.subcategory.index')->with('success','Subcategory Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subcategory::find($id)->delete();
        return redirect()->route('admin.subcategory.index')->with('success','Subcategory Deleted');
    }
}
