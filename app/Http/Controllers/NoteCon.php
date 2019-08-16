<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;
use App\Page;


class NoteCon extends Controller
{
    public function recNote(Page $id)
   {
     $validatedData = request()->validate([
          'newNote' => 'required | min:3',
          
     ],[
          'newNote.required' => ' الرجاء تعبئة الحقل اولاً ',
          'newNote.min' => ' يرجى كتابة مالا يقل عن ٣ حروف '
     ]);

     $note =new Note;
     $note-> text = request('newNote');
     $id->notes()->save($note);
     return back();
   }

   public function delNote(Note $page){
          $page->delete();
          return back();
   }

   public function edit(Note $note){
        return view('notes.edit',compact('note'));
   }

   public function update(Request $request, Note $note){
        $note-> text = $request -> get('editNote');
        $note->save();
          //echo $note->text;
        return redirect('table/'. $note->page_id);

   }






}
