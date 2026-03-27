<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    // fields that are fillable (i.e., can be mass-assigned)
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'summary', // CV profile summary
        'work_experience', // Text field for work experience details
        'education', // Text field for educational qualifications
        'skills', // Text field for skills
        'certifications', // Text field for certifications
        'languages', // Text field for language proficiency
        'associations', // Text field for professional memberships
        'extra_training', // Text field for additional training or workshops
        'conferences', // Text field for industry conferences attended
        'publications', // Text field for research papers or articles authored
        'awards', // Text field for awards or honors received
        'photo', // Path to the profile photo (optional)
        'certificate', // Text field for certificates (optional)
        // Add other relevant fields here
    ];

    // Optional: Define any relationships (e.g., if a user has many CVs)
    // Example:
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    use HasFactory;
}
