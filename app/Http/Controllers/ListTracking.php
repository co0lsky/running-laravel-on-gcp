<?php

namespace App\Http\Controllers;


use App\Tracker;

class ListTracking extends Controller
{
    /**
     * List all trackings
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $tracker = Tracker::where('user_id', $id)->firstOrFail();

        $trackings = $tracker->trackings()->get();

        $mapped = $trackings->map(function ($item) {
            $lastLocation = $item->lastLocation();

            $tracker = $item->tracker()->first();

            return [
                'user_id' => $tracker->user_id,
                'code' => $tracker->code,
                'last_location' => $lastLocation
                ? [
                    'name' => $lastLocation->name,
                    'address' => $lastLocation->address,
                    'lat' => $lastLocation->lat,
                    'lng' => $lastLocation->lng,
                        ]
                : []
            ];
        });

        return response()->json($mapped);
    }
}
