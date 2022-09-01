<?php

namespace App\Http\Controllers;
use App\Models\Mouvement as ModelsMouvement;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class mouvement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = ModelsMouvement::where('status',0)->orderBy('id','DESC')->get();
        return View('active',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //detournement de create pour liste de tous les mouvements de la journee
    public function create()
    {
        $a = date('Y-m-d');
       // dd($a);
        $datas = ModelsMouvement::Where('date_entre', 'like', '%' .$a. '%')->orderBy('id','DESC')->get();
        return view('etatMouvement',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['date_entre'] = date('Y-m-d H:i:s');
        $request['status'] = 0;
        //dd($request->all());
        ModelsMouvement::create($request->all());
        return redirect()->route('personne.show',$request->personne_id);
    }

    public function sortie($id)
    {
        $mvm =ModelsMouvement::find($id);
        $mvm->date_sortie = date('Y-m-d H:i:s');
        $mvm->mouvement2 = 'sortie';
        $mvm->status= 1;
        $mvm->save();
        //return redirect()->route('personne.show',$mvm->personne_id);
        return redirect()->back();
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
