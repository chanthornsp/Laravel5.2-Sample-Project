<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Category;
use App\NewsData;
use Illuminate\Support\Facades\Auth;
class ArticleController extends Controller
{

    public function __construct(){
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
        *pagination limit 5 articles per page
        *Documents: https://laravel.com/docs/5.2/pagination
        *-------------------------------------
        * NewsData::data --use Dynamic Scopes 
        */
        $articles = NewsData::data()->paginate(5);       
        return view('articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');

        return view('articles.articleCreate',['categories'=>$categories]);
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
            'title'=>'required|min:5|max:150|unique:articles,title',
            'body'=>'required|min:5',
            'active'=>'boolean',
            'cate_id'=> 'exists:categories,id|required',
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;
        $article = new Article($input);

        $cate = Category::findOrFail($request->cate_id);

        $cate->article()->save($article);

        return redirect('article');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('active',1)->findOrFail($id);
        $article = Category::where('active',1)->findOrFail($article->cate_id);
       
        $article= $article->article()->findOrFail($id);
        return view('articles.show')->with(['article'=>$article]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::lists('name','id');
        $article = Article::findOrFail($id);
        return view('articles.articleEdit')->with(['article'=>$article,'categories'=>$categories]);
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

        // $account = App\Account::find(10);
        // $user->account()->associate($account);
        // $user->save();


       $articles = Article::findOrFail($id);
       $articles->user_id = Auth::user()->id;

       $this->validate($request,[
            'title'=>'required|min:5|max:150|unique:articles,title,'.$articles->id,
            'body'=>'required|min:5',
            'active'=>'boolean',
            'cate_id'=> 'exists:categories,id|required',
        ]);
        
        $input = $request->all();

       
       if (!$request->active) {
           $input['active'] = 0;            
       }
       $articles->update($input);  

        return redirect('article');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('article');
    }
}
