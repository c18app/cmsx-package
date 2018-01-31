<?php

namespace C18app\CmsX\Controllers\Admin;

use App\Http\Controllers\Controller;
use C18app\CmsX\Models\Page;
use C18app\CmsX\Models\Tag;
use C18app\CmsX\Requests\StorePagePost;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cmsx::admin.pages.index', ['pages' => Page::orderBy('order', 'asc')->get()]);
    }

    public function create()
    {
        return view('cmsx::admin.pages.create', ['page' => new Page()]);
    }

    public function store(StorePagePost $request)
    {
        $page = Page::create($request->validated())->sort();
        $this->syncTags($request, $page);

        return redirect()->route('pages.show', ['page' => $page]);
    }

    public function show(Page $page)
    {
        return view('cmsx::admin.pages.show', ['page' => $page]);
    }

    public function edit(Page $page)
    {
        return view('cmsx::admin.pages.edit', ['page' => $page]);
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
            if (!$tags_list->where('title', $item)->count()) {
                Tag::create(['title' => $item]);
            }
        }

        $tags_sync = Tag::whereIn('title', $tags_new)->get();

        $page->tags()->sync($tags_sync);
    }
}
