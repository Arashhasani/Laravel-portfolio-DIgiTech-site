<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $articles=Article::query()->orderBy('id','desc')->where('is_published',1)->paginate(4);
        SEOMeta::setTitle('Home');
        return view('webb.index',compact('articles'));

    }


    public function articledetail(Article $article)
    {
        SEOMeta::setTitle($article['title']);

        $count=$article['count_view']+1;
        $article->update([
            'count_view'=>$count
        ]);
        return view('webb.singlearticle',compact('article'));


    }


    public function articles(Request $request)
    {
        $articles=Article::query();
        SEOMeta::setTitle('Articles');
        if (!is_null($keyword=$request['search'])){

            $articles=$articles->where('title','LIKE',"%$keyword%")->orderBy('id','desc')->paginate(8);
            return view('webb.articles',compact('articles'));

        }
        $articles=Article::query()->orderBy('id','desc')->where('is_published',1)->paginate(8);
        return view('webb.articles',compact('articles'));


    }
    //
}
