<?php

namespace Cms18\CmsX\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cms18\CmsX\Models\Page;

class CmsController extends Controller
{
    public function index() {
        return view('cmsx::frontend.homepage', ['pages' => Page::orderBy('id', 'desc')->get()]);
    }

    public function page($id)
    {
        $page = Page::findOrFail($id);
        return view('cmsx::cms.page', ['page' => $page]);
    }
}
