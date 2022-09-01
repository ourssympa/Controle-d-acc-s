<?php

namespace App\Http\Controllers;

use App\Models\Mouvement;
use App\Models\Personne as ModelsPersonne;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class personne extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=ModelsPersonne::all();
        $nbruser = $datas->count();
        $nbractive =  Mouvement::where('status',0)->get()->count();
         $a = date('Y-m-d');
         $nbrmvm = Mouvement::Where('date_entre', 'like', '%' .$a. '%')->get()->count();
       // dd($nbractive);
        return view('index',compact('datas','nbractive','nbruser','nbrmvm'));
    }
    public function create()
    {
        return view('createPersonne');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ModelsPersonne::create($request->all());
        return redirect()->route('index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personne = ModelsPersonne::find($id);
        $qr=json_encode($personne);
        $mouvement = Mouvement::where('personne_id',$id)->orderBy('id', 'DESC')->get();
        return view('showPersonne',compact('personne','mouvement','qr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = ModelsPersonne::find($id);
        return view('edit',compact('user'));
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
        $user = ModelsPersonne::find($id);
        $user->update($request->all());
        return redirect()->route('personne.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Warning($id)
    {
        $user = ModelsPersonne::find($id);
        return view('warning',compact('user'));
    }
     public function destroy($id)
    {
        $user = ModelsPersonne::find($id);
        $user->delete();
        return redirect()->route('personne.index');
    }
}
