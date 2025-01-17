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
        if ($filters->has('q'))
            $properties = $properties->where('city', 'LIKE', "%" . $filters->get('q') . "%");

        // rooms
        if ($filters->has('room'))
            $properties = $properties->whereIn('room', $filters->get('room'));
        if ($filters->has('room_lte'))
            $properties  = $properties->orWhere('room', "<=", $filters->get('room_lte'));
        if ($filters->has('room_gte'))
            $properties  = $properties->orWhere('room', ">=", $filters->get('room_gte'));

        // bath
        if ($filters->has('bath'))
            $properties = $properties->whereIn('bath', $filters->get('bath'));
        if ($filters->has('bath_lte'))
            $properties  = $properties->orWhere('bath', "<=", $filters->get('bath_lte'));
        if ($filters->has('bath_gte'))
            $properties  = $properties->orWhere('bath', ">=", $filters->get('bath_gte'));

        // type
        // if ($filters->has('type'))
        //     $properties = $properties->where('type', $filters->get('type'));
        if ($filters->has('type'))
            $properties = $properties->whereIn('type', $filters->get('type'));

        // condition
        if ($filters->has('condition'))
            $properties = $properties->whereIn('condition', $filters->get('condition'));

        // equipment
        if ($filters->has('equipment'))
            $properties = $properties->where('equipment', $filters->get('equipment'));

        // more filters
        if ($filters->has('pets'))
            $properties = $properties->where('pet', 1);
        if ($filters->has('garden'))
            $properties = $properties->where('garden', 1);
        if ($filters->has('terrace'))
            $properties = $properties->where('terrace', 1);
        if ($filters->has('air_conditioning'))
            $properties = $properties->where('air_conditioning', 1);
        if ($filters->has('swimming_pool'))
            $properties = $properties->where('swimming_pool', 1);

        // publication date
        if ($filters->has('publication_date_gte'))
            $properties = $properties->where('created_at', '>=', $filters->get('publication_date_gte'));

        // price
        if ($filters->has('price_gte'))
            $properties = $properties->where('price', '>=', $filters->get('price_gte'));
        if ($filters->has('price_lte'))
            $properties = $properties->where('price', '<=', $filters->get('price_lte'));

        // Get the results and return them.
        return $properties->paginate(10);
    }
}
