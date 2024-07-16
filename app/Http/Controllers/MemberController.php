<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $teamlist=TeamMember::all();

        return view('index',['teamlist'=>$teamlist]);
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
       $data=$request->validate([
                "firstname"=>"required",
                "lastname"=>"required",
                'image' => 'nullable',
                "university"=>"required",
                "department"=>"required",
                "expertise"=>"required"
        ]);
        if($request->hasFile('image')){
            $data['image']=$request->file('image')->store('member_photo','public');
        }
        TeamMember::create($data);
        return redirect(route('member.list'))->with('success', 'The Member info added successfully');
    }
    public function edit(TeamMember $teamMember){
        return view('edit',['specmember'=>$teamMember]);

    }
    public function update(TeamMember $teamMember, Request $request){
        $data=$request->validate([
            "firstname"=>"required",
            "lastname"=>"required",
            "university"=>"required",
            "department"=>"required",
            "expertise"=>"required"
    ]);
    $teamMember->update($data);
    return redirect(route('member.list'));
    }
public function destroy(TeamMember $teamMember){
    $teamMember->delete();
    return redirect(route('member.list'));

}
    //
}
