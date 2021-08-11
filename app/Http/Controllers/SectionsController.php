<?php

namespace App\Http\Controllers;

use App\Models\Sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
    public function index()
    {
        $sections=Sections::all();
        return view('sections.sections',compact('sections'));
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'section_name' => 'required|unique:sections|max:255',
            ],
            [
                'section_name.required' =>'يرجي ادخال اسم القسم',
                'section_name.unique' =>'اسم القسم مسجل مسبقا',
            ]);

            sections::create([
                'section_name' => $request->section_name,
                'description'  => $request->description,
                'Created_by'   => (Auth::user()->name),

            ]);
            session()->flash('Add', 'تم اضافة القسم بنجاح ');
            return redirect('/sections');

    }
    public function show(Sections $sections)
    {
        //
    }
    public function edit(Sections $sections)
    {
        //
    }
    public function update(Request $request, Sections $sections)
    {
        //
    }
    public function destroy(Sections $sections)
    {
        //
    }
}
