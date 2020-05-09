<?php

namespace App\Http\Controllers;

use App\Lab;
use Illuminate\Http\Request;

class LabsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewMap()
    {
        $labs = Lab::all();
        return view('viewMap', [
            'labs' => $labs,
        ]);
    }

    /**
     * get and show all the labas
     */
    public function list()
    {
        // $labs = Lab::all();
        // return view('list', [
        //     'labs' => $labs,
        // ]);
        $labs = Lab::paginate(5);
        return view('list')->with([
            'labs' => $labs,
            'searchQuery' => ''
        ]);
    }

    public function search(Request $request)
    {
        $term = null;

        if ($request->has('searchQuery')) {
            $term = $request->get('searchQuery');
        }

        // filter by keyword
        $labs = Lab::where('name', 'LIKE', "%{$term}%")
            ->orWhere('location', 'LIKE', "%{$term}%");

        return view('list')->with(
            [
                'labs' => $labs->paginate(5),
                'searchQuery' => $term
            ]
        );
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
        $lab->name = $request->name;
        $lab->location = $request->location;

        error_log('Some message here.');

        error_log($request->name);
        error_log($request->location);

        // $lab->fill($lab->all());
        $lab->save();
        return redirect('/list');
    }


    public function show($id)
    {
        $lab = Lab::find($id);
        return view('show', [
            'lab' => $lab,
        ]);
    }

    public function edit($id)
    {
        $lab = Lab::find($id);
        return view('edit', [
            'lab' => $lab,
        ]);
    }

    public function update(Request $request, $id)
    {
        $lab = Lab::find($id);

        $lab->name = $request->name;
        $lab->location = $request->location;
        error_log($id);
        // $lab->fill($request->all());
        $lab->save();
        return redirect('/list');
    }

    public function delete($id)
    {
        $lab = Lab::find($id);
        $lab->delete();
        return redirect('/list');
    }

    //
}
