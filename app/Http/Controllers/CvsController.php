<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cv;
use App\Http\Requests\cvRequest;
use Auth;

class CvsController extends Controller
{
    /**
     * permet d'afficher le formulaire de la création d'un cv .
     */

     

    public function __construct()
    {
        $this->middleware('auth');
    }

public function index() {
    if(!Auth::guest())
{
    $listecv= Cv::all();
    return view('cv.index',['cvs'=>$listecv]);
  }
}
public function create() {
    return view("cv.create");
}
public function store(cvRequest $request) {
   
    if ($request->input('presentation') !== null && $request-> input('titre') !== null ) {
        $cv = new Cv();
        $cv->presentation = $request->input('presentation');
        $cv->title = $request->input('titre');
        $cv->user_id=Auth::user()->id;
        $cv->save();

        
        echo "<script> echo('Processus complet avec succes !') !</script>";
    }
    else{
      return view('cv.create');
        echo "<script>alert('Remplir les Informations necessaire au formulaire !! ')</script>";
    }
   session()->flash('enregistrement' ,'Le cv a été bien ajouté' );
    return redirect('cvs',['cv'=>$cv->user->name ]);
  
}
    public function edit($id) { 
   $cv = Cv::find($id); 

   return view('cv.edit',['cv'=>$cv]); 
    }
    public function update(cvRequest $request,$id) {
        $cv = Cv::find($id);
        $cv->presentation = $request->input('presentation');
        $cv->title = $request->input('titre');
        $cv->save();
        session()->flash('edition','Bien edité !');
        return redirect('cvs');
    }

    public function destroy(Request $request,$id) {
        $cv = Cv::find($id);
        $cv->delete();
        return redirect('cvs'); 
        // $cv->delete();
        
        


  return redirect('cvs');
    }
}
