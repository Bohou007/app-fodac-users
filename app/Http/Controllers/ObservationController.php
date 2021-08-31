<?php

namespace App\Http\Controllers;

use App\Models\Dossiers;
use App\Models\Notifications;
use App\Models\Observation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObservationController extends Controller
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
        $dossier->status = $request->decision;
        $dossier->save();

        $notify = new Notifications();

        $result = getResult($dossier->id);
            $notify->name = 'Votre dossier'. $dossier->name . $result;
            $notify->type = 'Information';
            $notify->description = $request->content;
            $notify->status = 0;
            $notify->user_id = $dossier->user->id;
            $notify->group = Auth::user()->account_type;
            $notify->save();

        $observation = new Observation();
        $observation->decision = $dossier->status;
        $observation->content = $request->content ;
        $observation->dossiers_id = $request->dossier_id;
        $observation->user_id = Auth::user()->id;
        $observation->save();

        flashy()->success('Le traitement du dossier a été un success.');

        return redirect()->route('admin.allDossiers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function show(Observation $observation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function edit(Observation $observation)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


            $dossier = Dossiers::findOrFail($request->dossier_id);
            $dossier->status = $request->decision;
            $dossier->save();

            $notify = new Notifications();

            $result = getResult($dossier->id);
            $notify->name = 'Votre dossier'. $dossier->name . $result;
            $notify->type = 'Information';
            $notify->description = $request->content;
            $notify->status = 0;
            $notify->user_id = $dossier->user->id;
            $notify->group = Auth::user()->account_type;
            $notify->save();

            $observation = Observation::findOrFail($id);
            $observation->decision = $dossier->status;
            $observation->content = $request->content ;
            $observation->dossiers_id = $request->dossier_id;
            $observation->user_id = Auth::user()->id;
            $observation->save();
            flashy()->success('La modification du traitement du dossier a été un success.');

            return redirect()->route('admin.allDossiers');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Observation  $observation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Observation $observation)
    {

    }
}
