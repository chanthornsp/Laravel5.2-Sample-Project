<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cates = Category::orderBy('id','desc')->get();
        return view('categories.index',['cates'=>$cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.cateCreate');       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'name'=>'required|min:3|max:50|unique:categories,name',
                'active'=>'boolean'
            ]);
        $category= $request->all();
        if(!$category['active']){
            $category['active'] = 0;
        }
        Category::create($category);

        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $name = str_slug($name,' ');
        /**
            * use Eloquent: Relationships to 
            * query articls by category
            * visit: https://laravel.com/docs/5.2/eloquent-relationships
            */

        $articles = Category::where('name',$name)
            ->where('active',1)
            ->firstOrFail();

            /**
            *Get Collection of article 
             *so you can add more qurey to articles
             */
        $articles= $articles->newsdata()
            ->data()            
            ->paginate(5);

        return view('articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = Category::findOrFail($id);
        return view('categories.cateEdit',['cate'=>$cate]);
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
       $cate = Category::findOrFail($id);
       /**
       * Do validation on update category
       * Documents: https://laravel.com/docs/5.2/validation
       */
        $this->validate($request,[
                'name'=>'required|min:3|max:50|unique:categories,name,'.$cate->id,
                'active'=>'boolean'
            ]);
        $input = $request->all();
        if (!isset($input['active'])) {
            $input['active'] = 0;
        }               
        $cate->update($input);
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::findOrFail($id);
        $cate->delete();
       return redirect('category');
    }
}
