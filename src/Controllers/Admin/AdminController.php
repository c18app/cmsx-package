<?php

namespace C18app\CmsX\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('cmsx::admin.dashboard');
    }

    public function sort(Request $request, $type)
    {
        $ids = $request->input('ids');
        $modelClass = 'C18app\CmsX\Models\\' . $type;
        $model = new $modelClass();
        $model->sort($ids);
        return response()->json(['status' => 'ok']);

    }
}
