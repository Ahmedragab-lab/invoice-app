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
        $id = $request->id;

        $this->validate($request, [

            'section_name' => 'required|max:255|unique:sections,section_name,'.$id,
            'description'  => 'required',
        ],[

            'section_name.required' =>'يرجي ادخال اسم القسم',
            'section_name.unique'   =>'اسم القسم مسجل مسبقا',
            'description.required'  =>'يرجي ادخال البيان',

        ]);

        $sections = sections::find($id);
        $sections->update([
            'section_name' => $request->section_name,
            'description' => $request->description,
        ]);

        session()->flash('edit','تم تعديل القسم بنجاج');
        return redirect('/sections');
    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        sections::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/sections');
    }
}
