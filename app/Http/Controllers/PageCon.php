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
       $varPage = DB::table('pages')->get();
       return view('pages.showPage', compact('varPage'));
   }

   public function onePagey(Page $page)
   {
        $notes = Page::find($page->id)->notes;
        return view('pages.onePage', compact('notes','page'));
   }

   public function recPag(Request $request)
   {
    $validatedData = $request->validate([
        'title' => 'required | min:2',
        
    ]);
            $page = new Page;
            $page-> title = $request->title;
            $page-> save();
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
        $pagex-> delete();
        return back(); 
       }
       
   }

   public function delall(Page $pagex)
   {
        DB::table('notes')->where('page_id', '=', $pagex->id)->delete();
        $pagex-> delete();
        return redirect('../../table');
    }


}
