<?php

namespace App\Http\Controllers;

use App\Models\Dossiers;
use App\Models\Notifications;
use App\Models\PieceJointe;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class DossiersController extends Controller
{
    //middleware constructor


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dossiers = Dossiers::get();
        return view('admin.dossiers.index', compact('dossiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dossiers  $dossiers
     * @return \Illuminate\Http\Response
     */
    public function show(Dossiers $dossiers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dossiers  $dossiers
     * @return \Illuminate\Http\Response
     */
    public function edit(Dossiers $dossiers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dossiers  $dossiers
     * @return \Illuminate\Http\Response
     */
    public function traiteDossierUpdate(Request $request, $id)
    {
        $dossier = Dossiers::findOrFail($id);
        $dossier->status = 1;
        $dossier->save();

        $notify = new Notifications();
        $notify->name = 'Votre dossier '. $dossier->name .' est en cour de traitememt.';
        $notify->type = 'Information';
        $notify->description = 'Le traitement de votre dossier vient de debuter. Vous serez informez de tous ces avancement. Merci de rester a l\'écoute.';
        $notify->status = 0;
        $notify->user_id = $dossier->user->id;
        $notify->group = Auth::user()->account_type;
        $notify->save();

        flashy()->info('Vous avez debuter le traitement de ce dossier.');
        return view('admin.dossiers.show', compact('dossier'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dossiers  $dossiers
     * @return \Illuminate\Http\Response
     */
    public function traiteDossierShow($id)
    {
        $dossier = Dossiers::findOrFail($id);
        return view('admin.dossiers.show', compact('dossier'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dossiers  $dossiers
     * @return \Illuminate\Http\Response
     */
    public function dossierShow($id)
    {
        $dossier = Dossiers::findOrFail($id);
        return view('admin.dossiers.edit', compact('dossier'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dossiers  $dossiers
     * @return \Illuminate\Http\Response
     */
    public function addComplementDocStore(Request $request)
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
                $pj->user_id = $request->user_id;
                $pj->save();
                $dossier = Dossiers::findOrFail($request->dossier_id);
                $dossier->pieceJointe()->attach($pj->id);

                flashy()->success('Le complement de document a été enregistré avec success.');

                return redirect()->route('admin.allDossiers');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dossiers  $dossiers
     * @return \Illuminate\Http\Response
     */
    public function addComplementDoc($id)
    {
        $dossier = Dossiers::findOrFail($id);
        return view('admin.dossiers.addComplementDoc', compact('dossier'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dossiers  $dossiers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dossiers $dossiers)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dossiers  $dossiers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dossiers $dossiers)
    {
        //
    }

}
