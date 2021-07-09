<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use App\Models\PropertyMedia;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

use App\Classes\CustomMethods;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', ['properties' => Property::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properties = PropertyType::with('features')->get();

        foreach($properties as $item)
        {
            $property[$item->type] = $item->features;
        }

        $property = collect($property);

        return view('add-property', ['property' => $property]);
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
            'city' => 'required',
            'town' => 'required',
            'address' => 'required',
            'contactPhoneNumber' => 'required',
            'contactEmail' => 'required|email',
            'type' => 'required',
            'rent' => 'required|numeric',
        ]);

        $property = Property::create([
            'user_id' => Auth::user()->id,
            'city' => $request->city,
            'town' => $request->town,
            'address' => $request->address,
            'gps_location' => $request->gpsLocation,
            'contact_phone_number' => $request->contactPhoneNumber,
            'contact_email' => $request->contactEmail,
            'type' => $request->type,
            'rent' => $request->rent,
            'description' => $request->description,
            'is_rent_negotiable' => $request->negotiable, //test what happens in database when negotiable os not ticked
        ]);

        $attachArray = [];

        if($request->checkedFeatures) 
        {
            foreach ($request->only('checkedFeatures')['checkedFeatures'] as $key => $value )
            {
                $attachArray[$value] = ['number' => null] ;
            }   
        }

        if($request->pickedFeatures) 
        {
            foreach ($request->only('pickedFeatures') as $key => $value )
            {
                $attachArray[$value] = ['number' => null] ;
            }
        }

        if($request->inputFeatures) 
        {
            foreach ($request->only('inputFeatures')['inputFeatures'] as $key => $value )
            {
                $attachArray[$key] = ['number' => $value ?? 1] ;
            }
        }
        
        $property->features()->attach($attachArray); //*refresh propery before returning (if it will be returned)

        foreach ($request->only('media')['media'] as $key => $value )
        {
            $newStoragePath = Auth::user()->id.'/'.$property->property_id.'/'.$value;

            Storage::disk('public')->move('filepond/tmp/'.$value, $newStoragePath);

            $propertyMediaInsertArray[] = [
                                            'property_id' => $property->property_id, 
                                            'path' => $newStoragePath,
                                            'mime_type' => Storage::disk('public')->mimeType($newStoragePath),
                                            'extension' => pathinfo(storage_path('app/public').'/'.$newStoragePath, PATHINFO_EXTENSION),
                                            'size_in_bytes' => Storage::disk('public')->size($newStoragePath),
                                            'formatted_size' => CustomMethods::formatSizeUnits(Storage::disk('public')->size($newStoragePath)),
                                            'created_at' => date('Y-m-d H:i:s'),
                                            'updated_at' => date('Y-m-d H:i:s')
                                          ]; 
        }

        PropertyMedia::insert($propertyMediaInsertArray);
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
