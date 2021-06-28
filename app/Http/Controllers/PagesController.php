<?php

namespace App\Http\Controllers;

use App\Models\Supports;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function supports()
    {
        return view('users.supports.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function supportStore(Request $request)
    {
        $this->validate($request, [
            'objet' => 'required|min:3',
            'message' => 'required|min:10',
        ],[
            'objet.required' => 'Veuillez entrer l\'objet de votre message.',
            'message.required' => 'Renseignez le champ message',
            'objet.min' => 'L\'objet de votre message doit avoir en moyenne :min caractères',
            'message.min' => 'Le contenue de votre message doit avoir en moyenne :min caractères',
        ]);

            $support = new Supports();
            $support->objet =$request->objet;
            $support->message =$request->message;
            $support->to = 'Admin';
            $support->user_id =Auth::user()->id;
            $support->save();


            // \LogActivity::addToLog('Message envoyé a :: '.$messages->destinataire_user->email);

        flash('Le message a été envoyé avec succès!')->success()->important();

        return redirect()->route('supports');
    }
}
