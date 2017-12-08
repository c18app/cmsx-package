<?php

namespace Cms18\CmsX\Controllers\Admin;

use App\Http\Controllers\Controller;
use Cms18\CmsX\Models\Tag;
use Cms18\CmsX\Requests\StoreTagPost;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        $data = $request->validated();
        if(!isset($data['invisible'])) {
            $data['invisible'] = 0;
        }
        $tag = Tag::create($data);
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
        $data = $request->validated();
        if(!isset($data['invisible'])) {
            $data['invisible'] = 0;
        }

        $tag->fill($data)->save();
        return redirect()->route('tags.show', ['tag' => $tag]);
    }

    public function destroy(Request $request, Tag $tag)
    {
        if($request->hash==sha1('hash-delete-tag-id-'.$tag->id)) {
            $tag->pages()->detach();
            $tag->delete();
        } else {
            $request->session()->flash('error', 'bad token!');
        }
        return redirect()->route('tags.index');
    }
}
