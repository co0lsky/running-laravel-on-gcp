<?php

namespace App\Http\Controllers;


use App\Tracker;

class GetTracker extends Controller
{
    /**
     * Get tracker information.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $tracker = Tracker::where('user_id', $id)->first();

        if (!$tracker) {
            $code = $this->generateCode();

            $tracker = Tracker::firstOrCreate(['user_id' => $id, 'code' => $code]);
        }

        return response()->json([
            'user_id' => $tracker->user_id,
            'code' => $tracker->code,
        ]);
    }

    private function generateCode()
    {
        $code = str_random(10);

        if (Tracker::where('code', $code)->count() === 0) {
            return $code;
        }

        return $this->generateCode();
    }
}
