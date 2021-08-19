<?php

namespace App\Http\Controllers;

use App\Models\Dossiers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PieceJointe;

class DossiersUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dossiers = Dossiers::where('user_id', Auth::user()->id)->get();
        return view('users.dossiers.index', compact('dossiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dossiers = PieceJointe::where('user_id', Auth::user()->id)->get();
        return view('users.dossiers.demande', compact('dossiers'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // foreach ($request->doc as $docs){
        //     dump($docs['doc_file']);
        // }


        $this->validate($request, [
            'name_project' => 'required|min:3',
            'description_project' => 'required|min:20',
            'budget_oc' => 'required',
            'capitale_oc' => 'required',
            'capitale_demander' => 'required',
        ],[
            'name_project.required' => 'Veuillez entrer le nom de votre projet',
            'description_project.required' => 'Renseignez la description de votre projet',
            'budget_oc.required' => 'Veuillez entrer le budget de projet',
            'capitale_oc.required' => 'Veuillez entrer votre capitale',
            'capitale_demander.required' => 'Veuillez entrer le montant de demande',
            'name_project.min' => 'Le nom de votre doit avoir en moyenne :min caractères',
            'description_project.min' => 'La description de votre projet doit avoir en moyenne :min caractères',
        ]);

            $dossier = new Dossiers();
            $dossier->name =$request->name_project;
            $dossier->description =$request->description_project;
            $dossier->budget_oc = $request->budget_oc;
            $dossier->capitale_oc = $request->capitale_oc;
            $dossier->capitale_demander =$request->capitale_demander;
            $dossier->status = 0;
            $dossier->user_id =Auth::user()->id;
            $dossier->save();


            if ($request->doc != []){
                $pj= [];
                foreach ($request->doc as $docs){

                    $path_doc = "document_projet_fodac_".date('YmdHis').".".$docs['doc_file']->getClientOriginalExtension();
                    $docs['doc_file']->move(public_path("documents/"), $path_doc);

                    $pj[] = new PieceJointe([
                        'name_doc'=> $docs['doc_name'],
                        'type_doc'=> "Document",
                        'path_doc'=> $path_doc,
                        'user_id' => Auth::user()->id
                    ]);
                }
                $dossier->pieceJointe()->saveMany($pj);
             }

            if ($request->pj_id != []) {
                foreach ($request->pj_id as $document) {
                    $dossier->pieceJointe()->attach($document);
                }

            }

            // \LogActivity::addToLog('Message envoyé a :: '.$messages->destinataire_user->email);
            flashy()->success('Votre dossier a été enregistré avec success.');

        return redirect()->route('dossiers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $dossiers = ::findOrFail($id);
        $dossier = Dossiers::where('id', $id)->where('user_id', Auth::user()->id)->first();
        return view('users.dossiers.show', compact('dossier'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
