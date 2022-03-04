<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonials ; 
class MenageStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list = Testimonials::paginate(8) ;       
        return view("listeTestimondials")->with('list',$list) ;
    }

    public function setStatus(Request $request , $id) {
        $item = Testimonials::find($id) ; 
        // faire un test pour savoir qull btn a été cliqué
        $parametre = $request->input("parametre") ; 
        switch($parametre)
        {
            case "attente" :
                $item->status = "en attente" ;  
                break ; 
            case "approuve":
                $item->status = "approuvé" ;
                break ; 
            case "rejete":
                $item->status = "rejeté" ;
                break ;        
        }
        $item->save() ; 
        return redirect()->back()->with("msg","Bien fait") ; 
    }
    
}