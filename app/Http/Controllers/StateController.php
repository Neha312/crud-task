<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function Showstate()
    {
        $state = State::simplepaginate(5);
        $country = Country::all();
        return view('state/index', ['state' => $state], ['country' => $country]);
    }

    public function stateCreate(Request $request)
    {
        $state = new State();
        $state->country_id = $request->country_name;
        $state->state_name = $request->state_name;
        $state->save();
        return redirect('Showstate')->with('status', 'Inserted Succesfully');
    }
    public function stateEdit($id)
    {
        $state = State::findOrFail($id);
        return view('state/edit', ['state' =>  $state]);
    }
    public function stateUpdate(Request $request, $id)
    {
        $this->validate($request, ['state_name' => 'required|string']);
        $module = State::findOrFail($id)->update($request->only('state_name'));
        return redirect('Showstate')->with('status', 'Updated Succesfully');
    }
    public function stateDelete($id)
    {
        State::destroy($id);
        return redirect('Showstate')->with('status', 'Deleted Succesfully');
    }
}
