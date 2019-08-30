<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categories;
use App\Popular_categories;
class NewsCategoriesController extends Controller
{
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function __construct(){
$this->middleware('auth');
}
public function index()
{
$categories = Categories :: where('owner_id', auth()->id())->get();
return view('categories.index', compact('categories'));
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('categories.create');
}
/**
* Store a newly created resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @return \Illuminate\Http\Response
*/
public function store(Request $request)
{

$attributes = request()->validate([
'title' => ['required', 'min:3']
]);
Categories::create($attributes + ['owner_id' => auth()->id()]);
return redirect('/categories');
}
/**
* Display the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function show(Categories $category)
{
abort_if($category->owner_id !== auth()->id(), 403);
//inserting the number of views on the categories
$popular_categories = new Popular_categories;
$popular_categories->owner_id = auth()->id();
$popular_categories->category_id = $category->id;
$popular_categories->save();

return view('categories.show', compact('category'));
}
/**
* Show the form for editing the specified resource.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function edit(Categories $category)
{
return view('categories.edit', compact('category'));
}
/**
* Update the specified resource in storage.
*
* @param  \Illuminate\Http\Request  $request
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function update(Categories $category)
{
$category->update(request(['title']));
return redirect('/categories');
}
/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy(Categories $category)
{
$category->delete();
return redirect('/categories');
}
}