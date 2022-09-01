<?php

namespace App\Http\Controllers;

use App\Models\Mouvement;
use Illuminate\Http\Request;

class Qr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('qrcreate');
    }
    public function mouvement(Request $request)
    {
        $data = json_decode($request->data);
        $id = $data->id;

        $mouvement = Mouvement::where('personne_id', $id)->where('status', 0)->first();
        if (isset($mouvement)) {
           $mouvement['mouvement2']='sortie';
           $mouvement['date_sortie']=date('Y-m-d H:i:s');
           $mouvement['status']=1;

           $mouvement->save();
           return redirect()->route('personne.show', $id);
        }
        else {
            $request['date_entre'] = date('Y-m-d H:i:s');
            $request['status'] = 0;
            //dd($request->all());
            Mouvement::create([
                'date_entre' => date('Y-m-d H:i:s'),
                'status' => 0,
                'personne_id' => $id,
                'mouvement1' => 'entre',
            ]);
            return redirect()->route('personne.show', $id);
        }
    }
}
