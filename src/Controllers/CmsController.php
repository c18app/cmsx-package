<?php

namespace C18app\Cmsx\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use C18app\Cmsx\Models\Page;
use C18app\Cmsx\Models\Article;

class CmsController extends Controller
{
    public function index() {
        return view('cmsx::frontend.homepage', ['pages' => Page::orderBy('id', 'desc')->get()]);
    }

    public function page($id)
    {
        $page = Page::findOrFail($id);
        $page->formatedContent = $this->prepareContent($page->content);
        return view('cmsx::cms.page', ['page' => $page]);
    }

    public function article($id)
    {
        $article = Article::findOrFail($id);
        $article->formatedContent = $this->prepareContent($article->content);

        return view('cmsx::cms.article', ['article' => $article]);
    }

    private function prepareContent($content) {
        $temp = preg_split("/\R\R/", $content);

        $result = [];
        foreach($temp as $item) {
            $result[] = '<p>'.nl2br(trim($item)).'</p>';
        }

        $result = implode("\n", $result);

        return $result;
    }
}
