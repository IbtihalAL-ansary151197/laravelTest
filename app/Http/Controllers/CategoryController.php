<?php

namespace App\Http\Controllers;

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
        $category = category::all();
        return view('Category.Show_Category', compact('category'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Category.add_Category');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $Category = new Category;
       $Category->Name = $request->input('Name');
       $Category->Status = $request->input('Status');

       $Category->save();
       return redirect()->route('category.create')->with('Messages', 'Category data added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       return view('Category.EditCategory', compact('category'));

    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    
    {
        $Category = Category::findOrFail($id);
        $Category->Name = $request->input('Name');
        $Category->Status = $request->input('Status');
        $Category->update();

        return redirect()->route('category.index')->with('Messages', 'Category data updated successfully');
 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();

        return redirect()->route('category.index')->with('MessagesDeleted', 'Category data deleted successfully');
 

    }

    public function trash()
    {
        return view('category.restoreCategoory', [
            'categories' => Category::withTrashed()->whereNotNull('deleted_at')->get()
        ]);
    }


    public function restore($id)
{
    Category::withTrashed()->findOrFail($id)->restore();

       
        return redirect()->route('category.index')->with('messagesRestore','Category data added successfully');
 

    }
}
