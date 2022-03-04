<?php

namespace App\Http\Controllers;

use App\Models\Approuve_dossier;
use App\Models\Dossiers;
use App\Models\Notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FondDossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dossiers = Dossiers::where('status', 3)->get();
        return view('admin.dossiers.fondDossier', compact('dossiers'));
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

    public function createTest()
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
        $dossier = Dossiers::findOrFail($request->dossier_id);
        $dossier->approuve = $request->approuve;
        $dossier->fond_fodac = $request->fond_dossier;
        $dossier->save();

        $approve = new Approuve_dossier();
        $approve->dossiers_id = $dossier->id;
        $approve->user_id = Auth::user()->id;
        $approve->observation = $request->description;
        $approve->role = Auth::user()->account_type;
        $approve->save();

        $notify = new Notifications();
        $result = $dossier->approuve == 1 ? 'Approbation de fond pour ': 'Desapprobation de ';
        $notify->name = $result .'votre dossier '.$dossier->name. '.';
        $notify->type = 'Information';
        $notify->description = $request->description;
        $notify->status = 0;
        $notify->user_id = $dossier->user->id;
        $notify->group = Auth::user()->account_type;
        $notify->save();

        flashy()->success('Taitement effectué avec success !');

        $dossiers = Dossiers::where('status', 3)->get();
        return view('admin.dossiers.fondDossier', compact('dossiers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dossier = Dossiers::findOrFail($id);
        // dump($dossiers);
        return view('admin.dossiers.addFondDossier', compact('dossier'));
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
