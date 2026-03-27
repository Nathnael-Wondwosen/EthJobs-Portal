<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cv;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PDF; // Import PDF facade
use FrontendCandidatePageController;

class CvController extends Controller
{
    // Display the form for creating a new CV

    function index() : View {
        
        return view('frontend.candidate-dashboard.cv.index');
    }

    function show(string $slug): View {
        $user = auth()->user();
    
        if ($user && $user->candidateProfile && $user->candidateProfile->profile_complete && $user->candidateProfile->visibility) {
            $candidate = $user->candidateProfile;
        } else {
            // Handle the case where the user is not a candidate or their profile is incomplete or not visible
            abort(404);
        }
    
        return view('frontend.pages.candidate-details', compact('candidate'));
    }



}

