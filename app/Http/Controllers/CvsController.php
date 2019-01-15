<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use App\Cv;
use App\Experience;
use App\Http\Requests\cvRequest;
use Auth;
use Illuminate\Support\Facades;

class CvsController extends Controller
{
    /**
     * permet d'afficher le formulaire de la création d'un cv .
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function logout(){
        Auth::logout();
        return view('welcome');
    }

public function index() {
     if(Auth::user()->is_admin)
     {
        $listecv = Cv::all();      
     }
        else{
            $listecv = Auth::user()->cvs;
          }
        
        return view('cv.index',['cvs' => $listecv]);   
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

            if($request->hasFile('photo')){
                $cv->photo=$request->photo->store('image','local');
            }
        $cv->save();
        session()->flash('enregistrement' ,'Le cv a été bien ajouté' );
        // return redirect('cvs',['cv'=>$cv->user->name ]);
        return redirect('cvs');
        
       
    }
    else{
      return view('cv.create');
        echo "<script>alert('Remplir les Informations necessaire au formulaire !! ')</script>";
    }
 
  
}
    public function edit($id) { 
     $cv = Cv::find($id); 
     $this->authorize('update',$cv);
     return view('cv.edit',['cv'=>$cv]); 
    }
    public function update(cvRequest $request,$id) {
        $cv = Cv::find($id);
        $cv->presentation = $request->input('presentation');
        $cv->title = $request->input('titre');
        if($request->hasFile('photo')){
            $cv->photo=$request->photo->store('image');
        }
        $cv->save();
        session()->flash('edition','Bien edité !');
        return redirect('cvs');
    }

    public function destroy(Request $request,$id) {
        $cv = Cv::find($id);
        $this->authorize('delete',$cv);
        $cv->delete();
        return redirect('cvs'); 
     // $cv->delete();
       }
    public function show($id){
        return view('cv.show',['id'=>$id]);
    }

    
    public function getExperiences($id){
    $cv= Cv::find($id);
    return $cv->experiences()->orderby('debut','desc')->get();
    }
    public function addExperience(Request $request){
        $experience = new Experience;
        $experience->title=$request->title;
        $experience->body=$request->body;
        $experience->debut=$request->debut;
        $experience->fin=$request->fin;
        $experience->cv_id=$request->cv_id;
        $experience->save();
       return Response()->json(['etat'=>true,'id'=>$experience->id]);        
    }
    public function updateExperiences(Request $request){
        $experience = Experience::find($request->id);
        $experience->title=$request->title;
        $experience->body=$request->body;
        $experience->debut=$request->debut;
        $experience->fin=$request->fin;
        $experience->cv_id=$request->cv_id;
        $experience->save();
       return Response()->json(['etat'=>true]);
        

    }
    public function deleteExperiences($id){
        $experience= Experience::find($id);
        $experience->delete();
        return Response()->json(['etat'=>true]);
    }
}
