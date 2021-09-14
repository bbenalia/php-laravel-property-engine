<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
// use Validator;
use Illuminate\Support\Facades\Validator;
use App\Models\Property;
use App\Http\Resources\Property as PropertyResource;
use App\Http\Search\PropertySearch;

class PropertyController extends BaseController
{
    public function index(Request $request)
    {
        // $title = $request->get('title');
        
        // $properties = Property::all();

        // $properties = Property::where('title', 'LIKE', "%$title%")->get();

        // $properties = new Property;
        // $properties = $properties->where('title', 'LIKE', "%" . $request->get('q') . "%");
        // $properties = $properties->get();

        $properties = PropertySearch::apply($request);

        return
            $this->sendResponse(
                PropertyResource::collection($properties),
                'Property fetched.'
            );
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'street' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $property = Property::create($input);
        return $this->sendResponse(
            new PropertyResource($property),
            'Property created.'
        );
    }

    public function show($id)
    {
        $property = Property::find($id);
        if (is_null($property)) {
            return $this->sendError('Property does not exist.');
        }
        return $this->sendResponse(
            new PropertyResource($property),
            'Property fetched.'
        );
    }

    public function update(Request $request, Property $property)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'street' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        $property->street = $input['street'];
        $property->description = $input['description'];
        $property->created_at = $input['created_at'];
        $property->save();
        return $this->sendResponse(
            new PropertyResource($property),
            'Property updated.'
        );
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return $this->sendResponse([], 'Property deleted.');
    }
}
