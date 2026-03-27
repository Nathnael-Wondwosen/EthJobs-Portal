<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cv;
use Illuminate\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PDF; // Import PDF facade
use Illuminate\Support\Facades\Response;
use Illuminate\Http\RedirectResponse;

class CvController extends Controller
{
    // Display the form for creating a new CV

    function index() : RedirectResponse {
        
        // return view('frontend.candidate-dashboard.cv.index');
         return redirect()->to('http://localhost/job/CV');
    }


    // Display the submit form
    public function showSubmitForm(): View
    {
        return view('frontend.candidate-dashboard.cv.submit');
    }

    // Process the submitted form
    public function submit(Request $request)
    {
        // Process the form data
        // ...

        // Redirect back to the form or to a success page
        // ...
        return view('frontend.candidate-dashboard.cv.submit');
    }
        
  public function store(Request $request)
    {
    
$skills = [];
$skill_levels = [];
$hobbies = [];
$institutes = [];
$degrees = [];
$froms = [];
$tos = [];
$grades = [];
$titles = [];
$descriptions = [];

define('token', 'HGsZOXpfNC');
if ($token = isset($_POST['token']) ? $_POST['token'] : []) {
    $temp_profile = $_FILES['profile_image']['tmp_name'];
    $profile = $_FILES['profile_image']['name'];
    move_uploaded_file($temp_profile, 'images/' . $profile);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $profession = $_POST['profession'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $about_me = $_POST['about_me'];
    array_push($skills, $_POST['skill1']);
    array_push($skill_levels, intval($_POST['skill_level1']));
    array_push($hobbies, $_POST['hobby1']);
    array_push($institutes, $_POST['institute1']);
    array_push($degrees, $_POST['degree1']);
    array_push($froms, $_POST['from1']);
    array_push($tos, $_POST['to1']);
    array_push($grades, $_POST['grade1']);
    array_push($titles, $_POST['title1']);
    array_push($descriptions, $_POST['description1']);

    if (isset($_POST['skill2']) && !empty($_POST['skill2'])) {
        if (isset($_POST['skill_level2']) && !empty($_POST['skill_level2'])) {
            array_push($skills, $_POST['skill2']);
            array_push($skill_levels, intval($_POST['skill_level2']));
        }
    }
    if (isset($_POST['skill3']) && !empty($_POST['skill3'])) {
        if (isset($_POST['skill_level3']) && !empty($_POST['skill_level3'])) {
            array_push($skills, $_POST['skill3']);
            array_push($skill_levels, intval($_POST['skill_level3']));
        }
    }
    if (isset($_POST['skill4']) && !empty($_POST['skill4'])) {
        if (isset($_POST['skill_level4']) && !empty($_POST['skill_level4'])) {
            array_push($skills, $_POST['skill4']);
            array_push($skill_levels, intval($_POST['skill_level4']));
        }
    }
    if (isset($_POST['skill5']) && !empty($_POST['skill5'])) {
        if (isset($_POST['skill_level5']) && !empty($_POST['skill_level5'])) {
            array_push($skills, $_POST['skill5']);
            array_push($skill_levels, intval($_POST['skill_level5']));
        }
    }
    if (isset($_POST['hobby2']) && !empty($_POST['hobby2'])) {
        array_push($hobbies, $_POST['hobby2']);
    }
    if (isset($_POST['hobby3']) && !empty($_POST['hobby3'])) {
        array_push($hobbies, $_POST['hobby3']);
    }
    if (isset($_POST['hobby4']) && !empty($_POST['hobby4'])) {
        array_push($hobbies, $_POST['hobby4']);
    }
    if (isset($_POST['institute2']) && !empty($_POST['institute2'])) {
        if (isset($_POST['degree2']) && !empty($_POST['degree2'])) {
            if (isset($_POST['from2']) && !empty($_POST['from2'])) {
                if (isset($_POST['to2']) && !empty($_POST['to2'])) {
                    if (isset($_POST['grade2']) && !empty($_POST['grade2'])) {
                        array_push($institutes, $_POST['institute2']);
                        array_push($degrees, $_POST['degree2']);
                        array_push($froms, $_POST['from2']);
                        array_push($tos, $_POST['to2']);
                        array_push($grades, $_POST['grade2']);
                    }
                }
            }
        }
    }
    if (isset($_POST['institute3']) && !empty($_POST['institute3'])) {
        if (isset($_POST['degree3']) && !empty($_POST['degree3'])) {
            if (isset($_POST['from3']) && !empty($_POST['from3'])) {
                if (isset($_POST['to3']) && !empty($_POST['to3'])) {
                    if (isset($_POST['grade3']) && !empty($_POST['grade3'])) {
                        array_push($institutes, $_POST['institute3']);
                        array_push($degrees, $_POST['degree3']);
                        array_push($froms, $_POST['from3']);
                        array_push($tos, $_POST['to3']);
                        array_push($grades, $_POST['grade3']);
                    }
                }
            }
        }
    }
    if (isset($_POST['title2']) && !empty($_POST['title2'])) {
        if (isset($_POST['description2']) && !empty($_POST['description2'])) {
            array_push($titles, $_POST['title2']);
            array_push($descriptions, $_POST['description2']);
        }
    }
    if (isset($_POST['title3']) && !empty($_POST['title3'])) {
        if (isset($_POST['description3']) && !empty($_POST['description3'])) {
            array_push($titles, $_POST['title3']);
            array_push($descriptions, $_POST['description3']);
        }
    }
} else {
    header('location: /cvr');
}
    


    return view('frontend.candidate-dashboard.cv.submit');

}


}