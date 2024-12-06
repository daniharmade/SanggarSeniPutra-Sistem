<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SjfScheduling;

class SjfSchedulingController extends Controller
{
    public function schedule()
    {
        $jobs = SjfScheduling::orderBy('waktu_kedatangan')->get();

        $time = 0;
        foreach ($jobs as $job) {
            if ($time < $job->waktu_kedatangan) {
                $time = $job->waktu_kedatangan;
            }

            $job->mulai_eksekusi = $time;
            $job->selesai_eksekusi = $time + $job->lama_eksekusi;
            $job->turn_around = $job->selesai_eksekusi - $job->waktu_kedatangan;
            $time += $job->lama_eksekusi;

            $job->save();
        }

        return view('pages.admin.sjf-schedule.index', compact('jobs'));
    }
}
