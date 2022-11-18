<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Flipbook;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class FlipbookController extends Controller
{
    public function index()
    {
        $flipbooks = Flipbook::where('status', '1')->get();
        return view('modul.index', compact('flipbooks'));
    }

    public function create()
    {
        // return view('flipbook::bookcreater');
        return view('modul.create');
    }

    public function store(Request $request)
    {
        // $image = array();
        // $files = $request->file('image');
        $namemodul = str_replace(' ', '', strtolower($request->book_name));
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                // $image_name = 'mdl-' . (rand(100, 1000));
                $image_name = $namemodul . '-' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                // $image_name = strtolower($file->getClientOriginalName());
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'modul/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }
        Flipbook::insert([
            'name' => $request->book_name,
            'desc' => $request->desc,
            'content' => implode(',', $image),
            'status' => 1,
        ]);
        return redirect()->route('flipbook.index');
    }

    public function show($id)
    {
        $flipbook = Flipbook::where('id', $id)->get()[0];
        $content = explode(",", $flipbook->content);
        return view('rudrarajiv.flipbooklaravel.showbook', compact('flipbook', 'content'));
    }

    // public function edit($id)
    // {
    //     $flipbook = DB::table('flipbook')->where('id', $id)->get()[0];
    //     $content = explode(",", $flipbook->content);
    //     return view('flipbook::editbook', compact('flipbook', 'content'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $fb = Flipbook::find($id);
    //     $input = $request->all();

    //     $fb->content .= ",";
    //     $i = 1;
    //     foreach ($request->files as $uploadedFile) {
    //         $filename  = time() . '_' . $i . '.' . $uploadedFile->getClientOriginalExtension();
    //         $i++;
    //         $file = $uploadedFile->move(public_path('rudra/fbook/pics/'), $filename);
    //         $path = 'rudra/fbook/pics/' . $filename;
    //         $fb->content .= $path . ",";
    //     }

    //     $fb->content = rtrim($fb->content, ",");
    //     $fb->name = $input['book_name'];
    //     $fb->desc = $input['desc'];
    //     $fb->save();
    //     return Redirect::route('flipbook.index');
    // }

    public function destroy($id)
    {
        $fb = Flipbook::find($id);
        $imgArr = explode(",", $fb->content);
        foreach ($imgArr as $img) {
            $image = public_path($img);
            if (file_exists($image)) {
                unlink($image);
            }
        }
        $fb->delete();
        return Redirect::route('flipbook.index');
    }
}
