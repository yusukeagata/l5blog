<?php namespace App\Http\Controllers;
  
  use App\Article;
  use App\Http\Requests;
  use App\Http\Controllers\Controller;
  
  use Illuminate\Http\Request;
  
  class ArticlesController extends Controller
  {
  
     /**
      * @var Article
      */
     protected $article;
  
     /**
      * @param Article $article
      */
     public function __construct(Article $article)
     {
         $this->article = $article;
     }
  
     public function getIndex()
     {
      $articles = $this->article->all();
 
        return view('articles.index')->with(compact('articles'));
     }
  
     public function getShow($id)
    {
        $article = $this->article->find($id);
 
        return view('articles.show', compact('article'));
    }
  
     public function getCreate()
     {
        return view('articles.create');
     }
  
     public function postCreate(Request $request)
     {
        $data = $request->all();
        $this->article->fill($data);
        $this->article->save();
 
        return redirect()->to('articles/index');
     }
  
     public function getEdit($id)
    {
        $article = $this->article->find($id);
 
        return view('articles.edit')->withArticle($article);
    }
 
    /**
     * 記事の編集
     *
     * @param Request $request
     * @param         $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request, $id)
    {
        $article = $this->article->find($id);
        $data = $request->all();
        $article->fill($data);
        $article->save();
 
        return redirect()->to('articles/index');
    }
  
     public function postDelete($id)
    {
        $article = $this->article->find($id);
        $article->delete();
 
        return redirect()->to('articles/index');
    }
  
  }
