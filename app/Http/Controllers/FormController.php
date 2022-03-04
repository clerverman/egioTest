<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonials ; 
class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Testimonials::where("status","approuvé")->paginate(4) ;       
        return view("formulaire")->with('list',$list) ;
    }
 
    public function store(Request $request)
    {
        $titre = $request->input("titre") ; 
        $msg = $request->input("message") ;  
        $test = new Testimonials() ; 
        // les validations 
        // nb : je peux personnaliser les errors en ressource/lang
        $validatedData = $request->validate([
            'image' => 'mimes:Doc,docx,jpeg,png|max:1024', 
            'message' => 'required|max:300',
            'titre' => 'required|max:60'
        ],[
            'image.max' => 'L\'image ne doit passer une taille de :max MO.',
            'titre.max' =>'le titre ne doit pas passer le :max caractéres.',
            'message.max' =>'le message ne doit pas passer le :max caractéres.'
        ]);
        // test si l'image est saisie ou non (sinon une image par défaut par stockée dans la base de données)
        if($request->file('image')!=null) {
            $name = $request->file('image')->getClientOriginalName();  
            $request->image->move(public_path('images'), $name);
        }
        else 
        {
            $name = "img_vide.jpg" ; 
        }
        if ($titre != "" && $msg != "") {
            $test->titre = $titre ; 
            $test->message = $msg ;
            $test->image = $name ;   
            $test->save() ; 
             return redirect()->back()->with( "msg","Bien ajouté"); 
        }
    }
}