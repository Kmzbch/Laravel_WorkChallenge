<?php

namespace App\Http\Controllers;

use App\Lab;
use Illuminate\Http\Request;

class LabsController extends Controller
{
    /**
     * get and show all the labas
     */
    public function list()
    {
        $labs = Lab::all();
        return view('list', [
            'labs' => $labs,
        ]);
    }

    /**
     * GET for CREATE Lab
     */
    public function create()
    {
        $lab = new Lab;
        return view('create', [
            'lab' => $lab,
        ]);
    }

    /**
     * POST for CREATE Lab 
     */
    public function store(Request $request)
    {
        $lab = new Lab;
        $lab->fill($lab->all());
        $lab->save();
        return redirect('/labs');
    }



    public function show($id)
    {
        $lab = Lab::find($id);
        return view('labs.show', [
            'lab' => $lab,
        ]);
    }

    public function edit($id)
    {
        $lab = Lab::find($id);
        return view('labs.edit', [
            'lab' => $lab,
        ]);
    }

    public function update(Request $request, $id)
    {
        $lab = Lab::find($id);
        $lab->fill($request->all());
        $lab->save();
        return redirect('/labs');
    }

    public function destroy($id)
    {
        $lab = Lab::find($id);
        $lab->delete();
        return redirect('/labs');
    }


    //
}
