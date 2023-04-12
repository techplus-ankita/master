<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;

class CastsController extends Controller
{
    public function index(Request $request)
    {
        $casts = Cast::get();

        if($request->has('view_deleted'))
        {
            $casts = Cast::onlyTrashed()->get();
        }
        return view('casts',compact('casts'));
    }
    public function delete($id)
    {
        Cast::find($id)->delete();

        return back()->with('success', 'Cast Deleted successfully');
    }
    public function restore($id)
    {
        Cast::withTrashed()->find($id)->restore();

        return back()->with('success', 'Cast Restore successfully');
    }

    public function restore_all()
    {
        Cast::onlyTrashed()->restore();

        return back()->with('success', 'All Cast Restored successfully');
    }

}
