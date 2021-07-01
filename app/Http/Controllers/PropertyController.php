<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

use Illuminate\Support\Facades\Auth;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', ['property' => Property::latest()->first()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(Auth::user());
        // dd(Auth::check());
        $properties = PropertyType::with('features')->get();

        foreach($properties as $item)
        {
            $property[$item->type] = $item->features;
            $propertyTypeIDs[$item->type] = $item->property_type_id;
        }

        $property = collect($property);
        $propertyTypeIDs = collect($propertyTypeIDs);

        // dd($property);
        // dd($properties);

        // $property = PropertyType::with('features')
        //                 ->get()
        //                     ->mapWithKeys(function ($item, $key) {
        //                         return [$item['type'] => $item['features']];
        //                     });

        // dd($property);

        return view('add-property', ['property' => $property,
                                    'propertyTypeIDs' => $propertyTypeIDs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());

        $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users',
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $property = Property::create([

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
