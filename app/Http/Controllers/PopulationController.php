<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Country;
use App\City;
use App\Type;
use App\Gender;
use App\Population;

class PopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::lists('name','id');
        $cities = City::lists('name','id');
        $types = Type::lists('name','id');
        $gender = Gender::lists('name','id');        

        // dd(Population::all()->toArray());
         return view('population.index', [
            'populations' => Population::all(),
            'countries'=>$countries,
            'cities'=>$cities,
            'types'=>$types,
            'gender'=>$gender
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'country_id' => 'required',
            'city_id' => 'required',
            'type_id' => 'required',
            'gender_id' => 'required',
            'total' => 'required'
        ]);

        $population = new Population;

        $population->country_id = $request->country_id;
        $population->city_id = $request->city_id;
        $population->type_id = $request->type_id;
        $population->gender_id = $request->gender_id;
        $population->total = $request->total;

        $population->save();

        return redirect('/population');
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
        Population::destroy($id);
        return redirect('/population');
    }

    /**
     * Display a listing of the resource for api
     *
     * @return \Illuminate\Http\Response
     */
    public function api()
    {
        /*$population_list = DB::table('population')
                            ->select('country_id', DB::raw('SUM(total) as total'))
                            ->groupBy('country_id')
                            ->get();*/        

        $population_list = Population::groupBy('country_id')
               ->selectRaw('*, sum(total) as sum')
               ->orderBy('sum', 'desc')  
               ->with('country')
               ->get();

        $populations = Population::all();

        $countries = Country::with('cities')->get();
        
        $cities = City::all();

        $types = Type::all();

        $gender = Gender::all();

         return [
            'population_list' => $population_list,
            'populations' => $populations,
            'countries' => $countries,
            'cities' => $cities,
            'types' => $types,
            'gender' => $gender
        ];
        
    }
}
