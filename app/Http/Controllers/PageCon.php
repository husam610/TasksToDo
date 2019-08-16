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
        return view('pages.onePage', compact('notes','id'));
   }

   public function recPag()
   {
    $validatedData = request()->validate([
        'title' => 'required | min:2',
        
    ]);
        Page::create(request()->all());
        // $page = new Page;
        // $page-> title = request('title');
        // $page-> save();
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
