<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SzakdogaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Szakdoga::all();
    }

public function store(Request $request)
{
    $szakdoga = new Szakdoga();
    $szakdoga->name = $request->name;
    $szakdoga->gihublink = $request->githublink;
    $szakdoga->oldallink = $request->oldallink;
    $szakdoga->tagokneve = $request->tagokneve;
    $szakdoga->save();

    return redirect('/szakdoga/list');
}

public function update(Request $request, $id)
    {
        $project = Szakdoga::find($id);
        $szakdoga->name = $request->name;
        $szakdoga->gihublink = $request->githublink;
        $szakdoga->oldallink = $request->oldallink;
        $szakdoga->tagokneve = $request->tagokneve;
        $project->save();

        return redirect('/szakdoga/list');
    }
    public function destroy($id)
    {
        Szakdoga::find($id)->delete();
        return redirect('/szakdoga/list');
    }

    public function list()
    {
        $szakdogas = Szakdoga::all();
        return view('szakdoga.list', ['szakdogas' => $szakdogas]);
    }
}