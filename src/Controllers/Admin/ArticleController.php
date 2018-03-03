<?php

namespace C18app\Cmsx\Controllers\Admin;

use App\Http\Controllers\Controller;
use C18app\Cmsx\Models\Article;
use C18app\Cmsx\Models\Tag;
use C18app\Cmsx\Requests\StoreArticlePost;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cmsx::admin.articles.index', ['articles' => Article::orderBy('order', 'asc')->get()]);
    }

    public function create()
    {
        return view('cmsx::admin.articles.create', ['article' => new Article()]);
    }

    public function store(StoreArticlePost $request)
    {
        $article = Article::create($request->validated())->sort();
        $this->syncTags($request, $article);

        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function show(Article $article)
    {
        return view('cmsx::admin.articles.show', ['article' => $article]);
    }

    public function edit(Article $article)
    {
        return view('cmsx::admin.articles.edit', ['article' => $article]);
    }

    public function update(StoreArticlePost $request, Article $article)
    {
        $article->fill($request->validated())->save();
        $this->syncTags($request, $article);

        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function destroy(Request $request, Article $article)
    {
        if ($request->hash == sha1('hash-delete-article-id-' . $article->id)) {
            $article->delete();
        } else {
            $request->session()->flash('error', 'bad token!');
        }
        return redirect()->route('articles.index');
    }

    private function syncTags($request, $article) {
        $tags_new = collect(explode(',', $request->input('tags')));
        $tags_list = Tag::all();
        foreach ($tags_new as $item) {
            if (trim($item) != '' && !$tags_list->where('title', $item)->count()) {
                Tag::create(['title' => $item]);
            }
        }

        $tags_sync = Tag::whereIn('title', $tags_new)->get();

        $article->tags()->sync($tags_sync);
    }
}
