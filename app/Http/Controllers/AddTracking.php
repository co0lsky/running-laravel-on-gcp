<?php

namespace App\Http\Controllers;


use App\Tracker;
use App\Tracking;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AddTracking extends Controller
{
    /**
     * Add new tracking
     *
     * @param Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request,$id)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $tracker = Tracker::where('user_id', $id)->firstOrFail();

        $code = $request->get('code');

        $trackingTracker = Tracker::where('code', $code)->firstOrFail();

        $tracking = new Tracking([
            'tracking_tracker_id' => $trackingTracker->id,
        ]);

        try {
            $tracker->trackings()->save($tracking);
        } catch (QueryException $exp) {
        }


        $lastLocation = $trackingTracker->locations()->orderBy('id', 'desc')->first();

        return response()->json([
            'user_id' => $trackingTracker->user_id,
            'code' => $trackingTracker->code,
            'last_location' => $lastLocation
                ? [
                    'name' => $lastLocation->name,
                    'address' => $lastLocation->address,
                    'lat' => $lastLocation->lat,
                    'lng' => $lastLocation->lng,
                    ]
                : []
        ], 201);
    }
}
