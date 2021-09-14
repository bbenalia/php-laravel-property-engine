<?php

namespace App\Http\Search;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertySearch
{
    public static function apply(Request $filters)
    {
        $properties = new Property;

        // Search for a property based on their title.
        // if ($filters->has('type_home')) {
        //     $properties  = $properties->where('type_home', $filters->get('type_home'));
        // }

        // Search for a property based on their title.
        if ($filters->has('q')) {
            $properties  = $properties->where('title', 'LIKE', "%" . $filters->get('q') . "%");
        }

        // Search for a property based on their search.
        if ($filters->has('room_gte'))
            $properties  = $properties->where('room', ">=", $filters->get('room_gte'));
        // if ($filters->has('room_lte'))
        //     $properties  = $properties->where('room', "<=", $filters->get('room_lte'));
        if ($filters->has('room'))
            $properties  = $properties->where('room', $filters->get('room'));

        // // Search for a property based on their bath.
        // if ($filters->has('bath_gte'))
        //     $properties  = $properties->where('bath', ">=", $filters->get('bath_gte'));
        // if ($filters->has('bath_lte'))
        //     $properties  = $properties->where('bath', "<=", $filters->get('bath_lte'));
        // if ($filters->has('bath'))
        //     $properties  = $properties->where('bath', "<=", $filters->get('bath'));

        // Get the results and return them.
        return $properties->get();
    }
}
