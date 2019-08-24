<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Page;
use App\Note;

class PageCon extends Controller
{
   public function show()
   {
       $varPage = Page::all();
       return view('pages.showPage', compact('varPage'));
   }

   public function onePagey($id)
   {
        $notes = Page::find($id)->notes;
        $imgPage = Page::find($id)->url;
        return view('pages.onePage', compact('notes','id','imgPage'));
   }

   public function recPag(Request $request)
   {
    $validatedData = request()->validate([
        'title' => 'required | min:2',
        'url' => 'image| max:2048 | mimes:jpg,bmp,jpeg,png,gif',
        
    ]);
        if($request->url)
        {
        //giveing new name (the time + the suffix 'لاحقة الملف'):
        $imgName = time(). '.' . $request->url->getClientOriginalExtension(); 

        //send the img to the project data:
        $request->url->move(public_path('up_load'), $imgName);
        }
        //add the data to the table:
        $page = new Page;
        $page-> title = request('title');
        $request->url? $page-> url = $imgName : null;
        $page-> save();

        // this is another way to add data in the table:
        //Page::create(request()->all());

        return back();
       
   }

   public function delPag(Page $pagex)
   {
       if(count($pagex->notes))
       {
        return view('pages.deleteall', compact('pagex'));
       }
       else
       {
        //to delete the image from database and folder:
        $url = 'up_load/'.$pagex->url;
        unlink($url);
        $pagex-> delete();
        return back(); 
       }
       
   }

   public function delall(Page $pagex)
   {
        DB::table('notes')->where('page_id', '=', $pagex->id)->delete();
        $url = 'up_load/'.$pagex->url;
        unlink($url);
        $pagex-> delete();
        return redirect('../../table');
    }


}
