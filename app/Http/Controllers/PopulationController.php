<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;

use App\Country;
use App\City;
use App\Type;
use App\Gender;
use App\Population;

use App\Http\Requests\StorePopulationPostRequest;

class PopulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
    public function store(StorePopulationPostRequest $request)
    {
        /*$this->validate($request, [
            'country_id' => 'required',
            'city_id' => 'required',
            'type_id' => 'required',
            'gender_id' => 'required',
            'total' => 'required'
        ]);*/

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
    public function getPopulationInformation()
    {
        /*$population_list = DB::table('population')
                            ->select('country_id', DB::raw('SUM(total) as total'))
                            ->groupBy('country_id')
                            ->get();*/        

        $list = Population::groupBy('country_id')
               ->selectRaw('*, sum(total) as sum')
               ->orderBy('sum', 'desc')  
               ->with('country')
               ->take(3)
               ->get();

         return $list;
        
    }

    /**
     * Get country population
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCountryPopulation()
    {
        $list = Population::groupBy('country_id')
               ->selectRaw('id,country_id, sum(total) as sum')
               ->orderBy('sum', 'desc')  
               ->with('country')
               ->get();
        return $list;
    }

    /**
     * Get city population by country
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getCityPopulationByCountry($id)
    {
        $list = Population::groupBy('city_id')
               ->selectRaw('id,country_id,city_id, sum(total) as sum')
               ->where('country_id',$id)
               ->orderBy('sum', 'desc')  
               ->with('city')
               ->get();
        return $list;
    }

    /**
     * Get gender population by city
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getGenderPopulationByCity($country_id,$city_id)
    {
        $list = Population::groupBy('gender_id')
                ->selectRaw('*, sum(total) as sum')
                ->where('country_id',$country_id)
                ->where('city_id',$city_id)
                ->orderBy('sum', 'desc')  
                ->with('gender')
                ->get();

        return $list;
    }

    /**
     * Get population for population type under gender
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTypePopulationByGender($country_id=null,$city_id=null,$gender_id=null)
    {   
        $query = Population::groupBy('type_id')
                ->selectRaw('*, sum(total) as sum')
                ->orderBy('sum', 'desc')  
                ->with('type');

        if ($country_id) $query = $query->where('country_id',$country_id);
        if ($city_id) $query = $query->where('city_id',$city_id);
        if ($gender_id) $query = $query->where('gender_id',$gender_id);

        $list = $query->get();               

        return $list;
    }

}