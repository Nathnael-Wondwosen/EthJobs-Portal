<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;


/** here is some of the added */
use App\Http\Requests\Admin\UserCreateRequest;
use App\Models\Benefits;
use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobBenefits;
use App\Models\JobCategory;
use App\Models\JobRole;
use App\Models\JobSkills;
use App\Models\JobTag;
use App\Models\JobType;
use App\Models\SalaryType;
use App\Models\Skill;
use App\Models\State;
use App\Models\Tag;
use App\Services\Notify;
use App\Traits\Searchable;

use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class UsersController extends Controller
{
    use Searchable;

    function __construct()
    {
        $this->middleware(['permission:user']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $query = User::query();
            $this->search($query, ['name', 'email','role']);
            $users = $query->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(UserCreateRequest $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            // Add validation rules for other fields
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;

        // Check if email_verified field is set and the value is '1' (verified)
        if ($request->has('email_verified') && $request->email_verified === '1') {
            // Set the current date and time in the 'email_verified_at' field
            $user->email_verified_at = '2024-04-10 09:13:09';
        }


        $user->save();

        Notify::createdNotification();
        return to_route('admin.users.index');
       
        
    }

    

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */

public function update(Request $request, string $id)
{
    $request->validate([
        'name' => ['required', 'max:255'],
        'role' => ['required', 'in:Company,Candidate'],
    ]);

    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
    $user->role = $request->role;
    $user->save();

    Notify::updatedNotification();
    return to_route('admin.users.index');

    
}

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // // validation
        $userExist = User::where('user_id', $id)->exists();

        // if($usersExist) {
        return response(['message' => 'This item is already been used can\'t delete!'], 500);
        // }

        try {
            User::findOrFail($id)->delete();
            Notify::deletedNotification();
            return response(['message' => 'success'], 200);

        }catch(\Exception $e) {
            logger($e);
            return response(['message' => 'Something Went Wrong Please Try Again!'], 500);
        }
    }
}
