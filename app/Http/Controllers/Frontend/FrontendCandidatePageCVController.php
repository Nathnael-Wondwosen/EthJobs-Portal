<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\View\View;

use function Ramsey\Uuid\v1;

class FrontendCandidatePageCVController extends Controller
{
    function index(Request $request) : View {

        $skills = Skill::all();
        $experiences = Experience::all();
        $query = Candidate::query();
        $query->where(['profile_complete' => 1, 'visibility' => 1]);

        if($request->has('skills') && $request->filled('skills')) {
            $ids = Skill::whereIn('id', $request->skills)->pluck('id')->toArray();
            $query->whereHas('skills', function($subquery) use ($ids) {
                $subquery->whereIn('skill_id', $ids);
            });
        }
        if($request->has('experience') && $request->filled('experience')) {
           $query->where('experience_id', $request->experience);
        }

        $candidates = $query->paginate(24);


        return view('frontend.pages.candidate-index', compact('candidates', 'skills', 'experiences'));
    }


    function showcv(int $id) : View {
    $candidate = Candidate::where(['profile_complete' => 1, 'visibility' => 1, 'user_id' => $id])->firstOrFail();
    return view('frontend.pages.generatecv', compact('candidate'));
}
}
