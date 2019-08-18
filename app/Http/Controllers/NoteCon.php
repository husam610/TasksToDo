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
          //Way num.1: with this way we don't have to insert "page_id" because it by default takes the id, But we should save the data at the end.

     // $note =new Note;
     // $note-> text = request('newNote');
     // $id->notes()->save($note);
     
          // Way num.2: with this way have to put every field here and in its Model (protected).
     Note::create([
          'text'=> request('newNote'),
          'page_id' => $id->id
     ]);
     
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
