<?php

namespace C18app\Cmsx\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use C18app\Cmsx\Models\Page;
use C18app\Cmsx\Models\Article;

class CmsController extends Controller
{
    public function index() {
        return view(Config('cmsx.app.template').'::frontend.homepage', ['pages' => Page::orderBy('id', 'desc')->get()]);
    }

    public function page($id)
    {
        $page = Page::findOrFail($id);
        $page->formatedContent = $this->prepareContent($page->content);
        return view(Config('cmsx.app.template').'::cms.page', ['page' => $page]);
    }

    public function article($id)
    {
        $article = Article::findOrFail($id);
        $article->formatedContent = $this->prepareContent($article->content);

        return view(Config('cmsx.app.template').'::cms.article', ['article' => $article]);
    }

    private function prepareContent($content) {
        $temp = preg_split("/\R/", $content);

        $result = [];
        foreach($temp as $item) {
            $result[] = '<p>'.(strlen(trim($item))?trim($item):'&nbsp;').'</p>';
        }

        $result = implode("\n", $result);

        return $result;
    }
}
