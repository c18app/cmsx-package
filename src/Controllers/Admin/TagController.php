<?php

namespace C18app\Cmsx\Controllers\Admin;

use App\Http\Controllers\Controller;
use C18app\Cmsx\Models\Tag;
use C18app\Cmsx\Requests\StoreTagPost;
use Illuminate\Http\Request;

class TagController extends Controller
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
        return view('cmsx::admin.tags.index', ['tags' => Tag::orderBy('title', 'asc')->get()]);
    }

    public function create()
    {
        return view('cmsx::admin.tags.create', ['tag' => new Tag()]);
    }

    public function store(StoreTagPost $request)
    {
        $tag = Tag::create($request->validated());
        return redirect()->route('tags.show', ['tag' => $tag]);
    }

    public function show(Tag $tag)
    {
        return view('cmsx::admin.tags.show', ['tag' => $tag]);
    }

    public function edit(Tag $tag)
    {
        return view('cmsx::admin.tags.edit', ['tag' => $tag]);
    }

    public function update(StoreTagPost $request, Tag $tag)
    {
        $tag->fill($request->validated())->save();
        return redirect()->route('tags.show', ['tag' => $tag]);
    }

    public function destroy(Request $request, Tag $tag)
    {
        if($request->hash==sha1('hash-delete-tag-id-'.$tag->id)) {
            $tag->pages()->detach();
            $tag->articles()->detach();
            $tag->delete();
        } else {
            $request->session()->flash('error', 'bad token!');
        }
        return redirect()->route('tags.index');
    }
}
