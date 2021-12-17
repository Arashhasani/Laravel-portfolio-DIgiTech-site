<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use function Symfony\Component\String\b;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $articles = Article::query();
        SEOMeta::setTitle('Articles');
        if (Gate::allows('crud', auth()->user())) {
            if (!is_null($keyword = $request['search'])) {
                $articles = $articles->where('title', 'LIKE', "%$keyword%")->orderBy('id', 'asc')->paginate(10);
            } else {
                $articles = Article::query()->orderBy('id', 'asc')->paginate(10);
            }
            return view('adminn.articles.all', compact('articles'));


        } elseif (Gate::allows('view', auth()->user())) {
            if (!is_null($keyword = $request['search'])) {
                $articles = $articles->where('title', 'LIKE', "%$keyword%")->orderBy('id', 'asc')->paginate(10);
            } else {
                $articles = Article::query()->orderBy('id', 'asc')->paginate(10);
            }
            return view('adminn.articles.all', compact('articles'));


        } else {
            return abort(403);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::allows('crud', auth()->user())) {
            SEOMeta::setTitle('Create Article');

            return view('adminn.articles.create');


        } else {
            return abort(403);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Gate::allows('crud', auth()->user())) {
            SEOMeta::setTitle('Create Article');

            $validdata = $request->validate([
                'title' => ['required', Rule::unique('articles', 'title')],
                'smallimage' => 'required',
                'bigimage' => 'required',
                'text' => 'required',
            ]);

            if (!is_null($request['published'])) {
                $validdata['is_published'] = 1;
            } else {
                $validdata['is_published'] = 0;
            }
            $validdata['count_view'] = 0;
            auth()->user()->articles()->create($validdata);

            return redirect(route('articles.index'));


        } else {
            return abort(403);
        }


        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        if (Gate::allows('crud', auth()->user())) {
            SEOMeta::setTitle('Edit Article');

            return view('adminn.articles.edit', compact('article'));


        } else {
            return abort(403);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        if (Gate::allows('crud', auth()->user())) {

            $validdata = $request->validate([
                'title' => ['required', Rule::unique('articles', 'title')->ignore($article['id'])],
                'text' => 'required',
            ]);

            if (!is_null($request['smallimage'])) {
                $validdata['smallimage'] = $request['smallimage'];
            }

            if (!is_null($request['bigimage'])) {
                $validdata['bigimage'] = $request['bigimage'];
            }
            $article->update($validdata);

            if (!is_null($request['published'])) {
                $article->forceFill([
                    'is_published' => 1
                ])->save();
            } else {
                $article->forceFill([
                    'is_published' => 0
                ])->save();
            }
            return redirect(route('articles.index'));


        } else {
            return abort(403);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->comments()->delete();
        $article->delete();
        return back();
        //
    }
}
