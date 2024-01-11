<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Laravel\Prompts\Note as PromptsNote;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function notes()
    {
        //$notes = Note::all(); // Nos saca todas las notas de la BBDD
        $notes = Note::paginate(5);
        return view('notes.notes', @compact('notes'));
    }

    public function detail($id) {
        $note = Note::findOrFail($id);
        return view('notes.detail', @compact('note'));
      }

      public function create(Request $request) {
   
        $request -> validate([ 'title' => 'required', 'text' => 'required' ]);
        $notaNueva = new Note;
        $notaNueva -> title = $request -> title;
        $notaNueva -> text = $request ->text;
        $notaNueva -> save();
        return back() -> with('mensaje', 'Nota agregada exitosamente');
    }
    
    public function newNote(){
        return view('notes.create');
    }

    public function edit($id) {
        $note = Note::findOrFail($id);
        return view('notes.edit', compact('note'));
      }
      public function update(Request $request, $id) {
        $request -> validate([
            'title' => 'required',
            'text' => 'required'
        ]);
        $notaActualizar = Note::findOrFail($id);
        $notaActualizar -> title = $request -> title;
        $notaActualizar -> text = $request -> text;
        $notaActualizar -> save();

        return back() -> with('mensaje', 'Nota actualizada');
      }
      
      public function delete($id) {
        $notaEliminar = Note::findOrFail($id);
        $notaEliminar -> delete();
        return back() -> with('mensaje', 'Nota Eliminada');
      }
      

      

}
