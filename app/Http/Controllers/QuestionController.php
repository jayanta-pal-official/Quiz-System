<?php

namespace App\Http\Controllers;
use App\Models\question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuestionController extends Controller
{
    public function addQuestion(Request $request){
               // dd($request->all());

        $request-> validate([
            'question' => 'required',
            'opa' => 'required',
            'opb' => 'required',
            'opc' => 'required',
            'opd' => 'required',
            'ans' => 'required',
            
        ]);

        $q= new question();

        $q->question= $request->question;
        $q->a= $request->opa;
        $q->b= $request->opb;
        $q->c= $request->opc;
        $q->d= $request->opd;
        $q->ans= $request->ans;

        $q->save();
        Session:: put('added',"Question Successfully Added");
        return redirect()->route('question');
    }
    public function showQuestion(){
        $qs=question::all();
        return view('question')->with(['questions'=>$qs]);
    }
    public function updateQuestion(Request $request){
        // dd($request->all());

        
        $request-> validate([
            'question' => 'required',
            'opa' => 'required',
            'opb' => 'required',
            'opc' => 'required',
            'opd' => 'required',
            'ans' => 'required',
            'id' => 'required',
            
        ]);

        $q=question::find($request->id);

        $q->question= $request->question;
        $q->a= $request->opa;
        $q->b= $request->opb;
        $q->c= $request->opc;
        $q->d= $request->opd;
        $q->ans= $request->ans;

        $q->save();
        Session:: put('added',"Question Successfully Updated");
        return redirect()->route('question');

       
    }
    public function deleteQuestion($id){
        // $q=question::find($request->id);
        question::find($id)->delete();
        Session:: put('delete',"Question Successfully Deleted");
        return redirect()->route('question');

    }

    public function startQuiz(){
        Session::put('nextq','1');
        Session::put('wrongans','0');
        Session::put('correctans','0');
        $q=question::all()->first();
        return view('ansDesk')->with(['question'=>$q]);
    }
    public function submitAns(Request $request){
        
        $nextq=Session::get(key:'nextq');
        $wrongans=Session::get(key:'wrongans');
        $correctans=Session::get(key:'correctans');

        $request-> validate([
            'ans' => 'required',
            'dbans' => 'required'
          
            
        ]);
        $nextq+=1;

        if($request->dbans == $request->ans){
            $correctans+=1;
        }else{
            $wrongans+=1;
        }
        Session::put('nextq', $nextq);
        Session::put('wrongans', $wrongans);
        Session::put('correctans',$correctans);

        
        $i=0;
        $questions=question::all();
        foreach($questions as $question){
            $i++;
            if($questions-> count()< $nextq){
                return view('end');
            }
            if($i== $nextq){
                return view('ansDesk')->with(['question'=>$question]);
            }
        }

    }
}
