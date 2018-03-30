<?php

namespace C18app\Cmsx\Controllers\Admin;

use App\Http\Controllers\Controller;
use C18app\Cmsx\Models\Page;
use C18app\Cmsx\Models\Tag;
use C18app\Cmsx\Requests\StorePagePost;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware([
            'auth',
            'C18app\Cmsx\Middleware\Admin'
        ]);
    }

    public function index()
    {
        return view(Config('cmsx.app.template-admin').'::pages.index', ['pages' => Page::orderBy('order', 'asc')->get()]);
    }

    public function create()
    {
        return view(Config('cmsx.app.template-admin').'::pages.create', ['page' => new Page()]);
    }

    public function store(StorePagePost $request)
    {
        $page = Page::create($request->validated())->sort();
        $this->syncTags($request, $page);

        return redirect()->route('pages.show', ['page' => $page]);
    }

    public function show(Page $page)
    {
        return view(Config('cmsx.app.template-admin').'::pages.show', ['page' => $page]);
    }

    public function edit(Page $page)
    {
        return view(Config('cmsx.app.template-admin').'::pages.edit', ['page' => $page]);
    }

    public function update(StorePagePost $request, Page $page)
    {
        $page->fill($request->validated())->save();
        $this->syncTags($request, $page);

        return redirect()->route('pages.show', ['page' => $page]);
    }

    public function destroy(Request $request, Page $page)
    {
        if ($request->hash == sha1('hash-delete-page-id-' . $page->id)) {
            $page->delete();
        } else {
            $request->session()->flash('error', 'bad token!');
        }
        return redirect()->route('pages.index');
    }

    private function syncTags($request, $page) {
        $tags_new = collect(explode(',', $request->input('tags')));
        $tags_list = Tag::all();
        foreach ($tags_new as $item) {
            if (trim($item) != '' && !$tags_list->where('title', $item)->count()) {
                Tag::create(['title' => $item]);
            }
        }

        $tags_sync = Tag::whereIn('title', $tags_new)->get();

        $page->tags()->sync($tags_sync);
    }
}
