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
        $temp = preg_split('/\R/', trim($content));

        $result = [];
        $break_lines = 0;
        foreach($temp as $k => $item) {
            if(strlen(trim($item))) {
                $break_lines = 0;
                if(substr(trim($item), 0, 1) == '<' && substr(trim($item), -1) == '>') {
                    $result[] = trim($item);
                } else {
                    $result[] = '<p>'.trim($item).'</p>';
                }

            } else {
                $break_lines++;
                if($break_lines < 2) {
                    continue;
                }
                $result[] = '<p class="empty-paragraph">&nbsp;</p>';
            }
        }

        $result = implode("\n", $result);

        return $result;
    }
}
