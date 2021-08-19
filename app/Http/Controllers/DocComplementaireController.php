<?php

namespace App\Http\Controllers;

use App\Models\Dossiers;
use App\Models\PieceJointe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocComplementaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dossiers = Dossiers::where('user_id', Auth::user()->id)->where('status', '!=' , 3)->where('status', '!=', 4)->get();
        return view('users.doc.createComplement', compact('dossiers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'doc_name' => 'required',
            'doc_file' => 'file|mimes:pdf'
        ],[
            'doc_name.required' => 'Nom du document est obligatoire',
            'doc_file.required' => 'Document du projet',
            'doc_file.mimes' => 'Document du projet doit être un fichier de type <strong> PDF</strong>',
        ]);

        if ($request->doc_name && $request->file('doc_file')){

                $docprojet_fileName = "document_projet_fodac_".date('YmdHis').".".$request->file('doc_file')->getClientOriginalExtension();
                $path_doc = $request->file('doc_file')->move(public_path("documents/"), $docprojet_fileName);

                $pj = new PieceJointe();
                $pj->name_doc = $request->doc_name;
                $pj->type_doc = "Complement";
                $pj->path_doc = $docprojet_fileName;
                $pj->user_id =Auth::user()->id;
                $pj->save();

                $dossier = Dossiers::findOrFail($request->dossier_id);
                $dossier->pieceJointe()->attach($pj->id);

                flashy()->success('Votre document complementaire a été enregistrer avec success.');

                return redirect()->route('documents-administrative.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
