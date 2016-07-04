<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Population;
use App\Country;
use App\City;
use App\Gender;
use App\Type;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /*$population_list = DB::table('population')
                            ->select('country_id', DB::raw('SUM(total) as total'))
                            ->groupBy('country_id')
                            ->get();*/
        // $population_list = Population::all();

        $population_list = Population::groupBy('country_id')
               ->selectRaw('*, sum(total) as sum')
               ->orderBy('sum', 'desc')                       
               ->get();                            

        // dd($population_list);

        $countries = Country::all();
        $cities = City::all();
        $gender = Gender::all();
        $types = Type::all();
        
        return view('home.index',[
            'population_list'=>$population_list,
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
        //
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
        //
    }
}
