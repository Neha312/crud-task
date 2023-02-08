<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countrys = Country::simplePaginate(5);
        return view('country/index', ['countrys' => $countrys]);
    }

    public function countryCreate(Request $request)
    {
        $country = Country::create($request->only('country_name'));
        return redirect('index')->with('status', 'Inserted Succesfully');
    }
    public function countryEdit($id)
    {
        $country = Country::findOrFail($id);
        return view('country/edit', ['country' =>  $country]);
    }
    public function countryUpdate(Request $request, $id)
    {
        $this->validate($request, ['country_name' => 'required|string']);
        $module = Country::findOrFail($id)->update($request->only('country_name'));
        return redirect('index')->with('status', 'Updated Succesfully');
    }
    public function countryDelete($id)
    {
        Country::destroy($id);
        return redirect('index')->with('status', 'Deleted Succesfully');
    }
}
