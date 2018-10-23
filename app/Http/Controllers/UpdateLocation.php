<?php

namespace App\Http\Controllers;


use App\Tracker;
use App\TrackerLocation;
use Illuminate\Http\Request;

class UpdateLocation extends Controller
{
    /**
     * Update location
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
            'name' => 'required',
            'address' => '',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        $tracker = Tracker::where('user_id', $id)->firstOrFail();

        $lastLocation = new TrackerLocation([
            'name' => $request->get('name'),
            'address' => $request->get('address', ''),
            'lat' => $request->get('lat'),
            'lng' => $request->get('lng'),
        ]);

        $tracker->locations()->save($lastLocation);

        return response()->json([
            'user_id' => $tracker->user_id,
            'code' => $tracker->code,
            'last_location' => [
                'name' => $lastLocation->name,
                'address' => $lastLocation->address,
                'lat' => $lastLocation->lat,
                'lng' => $lastLocation->lng,
            ]
        ], 201);
    }
}
