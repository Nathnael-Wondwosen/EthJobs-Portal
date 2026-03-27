<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

use App\Models\Candidate;
use App\Models\CandidateExperience;
use App\Models\CandidateEducation;
use App\Models\Experience;
use App\Models\Profession;
use App\Models\Skill;
use App\Models\Language;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $candidate = Candidate::with(['skills'])->where('user_id', auth()->user()->id)->first();
        $candidateExperiences = CandidateExperience::where('candidate_id', $candidate->id)->orderBy('id', 'DESC')->get();
        $candidateEducation = CandidateEducation::where('candidate_id', $candidate->id)->orderBy('id', 'DESC')->get();

        $experiences = Experience::all();
        $professions = Profession::all();
        $skills = Skill::all();
        $languages = Language::all();
        $countries = Country::all();
        $states = State::where('country_id', $candidate->country)->get();
        $cities = City::where('state_id', $candidate->state)->get();

        $data = compact('candidate', 'experiences', 'professions', 'skills', 'languages', 'candidateExperiences', 'candidateEducation', 'countries', 'states', 'cities');

        $pdf = PDF::loadView('Frontend.pages.generatePdf', $data);
        return $pdf->download('candidate_profile.pdf');
    }
}