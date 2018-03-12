<?php

namespace C18app\Cmsx\Controllers\Admin;

use App\Http\Controllers\Controller;
use C18app\Cmsx\Models\Translate;
use C18app\Cmsx\Requests\StoreTranslatePost;
use Illuminate\Http\Request;

class TranslateController extends Controller
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
        return view('cmsx::admin.translates.index', ['translates' => Translate::orderBy('title', 'asc')->get()]);
    }

    public function create()
    {
        return view('cmsx::admin.translates.create', ['translate' => new Translate()]);
    }

    public function store(StoreTranslatePost $request)
    {
        $translate = Translate::create($request->validated());
        return redirect()->route('translates.show', ['translate' => $translate]);
    }

    public function show(Translate $translate)
    {
        return view('cmsx::admin.translates.show', ['translate' => $translate]);
    }

    public function edit(Translate $translate)
    {
        return view('cmsx::admin.translates.edit', ['translate' => $translate]);
    }

    public function update(StoreTranslatePost $request, Translate $translate)
    {
        $translate->fill($request->validated())->save();
        return redirect()->route('translates.show', ['translate' => $translate]);
    }

    public function destroy(Request $request, Translate $translate)
    {
        if($request->hash==sha1('hash-delete-translate-id-'.$translate->id)) {
            $translate->delete();
        } else {
            $request->session()->flash('error', 'bad token!');
        }
        return redirect()->route('translates.index');
    }
}
