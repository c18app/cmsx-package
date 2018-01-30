<?php

namespace Cms18\CmsX\Controllers\Admin;

use App\Http\Controllers\Controller;
use Cms18\CmsX\Models\Setting;
use Cms18\CmsX\Requests\StoreSettingPost;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('cmsx::admin.settings.index', ['settings' => Setting::orderBy('title', 'asc')->get()]);
    }

    public function create()
    {
        return view('cmsx::admin.settings.create', ['setting' => new Setting()]);
    }

    public function store(StoreSettingPost $request)
    {
        $setting = Setting::create($request->validated());
        return redirect()->route('settings.show', ['setting' => $setting]);
    }

    public function show(Setting $setting)
    {
        return view('cmsx::admin.settings.show', ['setting' => $setting]);
    }

    public function edit(Setting $setting)
    {
        return view('cmsx::admin.settings.edit', ['setting' => $setting]);
    }

    public function update(StoreSettingPost $request, Setting $setting)
    {
        $setting->fill($request->validated())->save();
        return redirect()->route('settings.show', ['setting' => $setting]);
    }

    public function destroy(Request $request, Setting $setting)
    {
        if($request->hash==sha1('hash-delete-setting-id-'.$setting->id)) {
            $setting->delete();
        } else {
            $request->session()->flash('error', 'bad token!');
        }
        return redirect()->route('settings.index');
    }
}
