<?php

namespace App\Http\Controllers;

use App\Http\Requests\VaccineRegisterRequest;
use App\Jobs\ProcessVaccineScheduleMail;
use App\Models\User;
use App\Models\VaccineCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class RegistrationController extends Controller
{
     public function showForm()
    {
        $centers = VaccineCenter::all();
        return View('pages.registration_page', compact('centers'));
    }

    public function register(VaccineRegisterRequest $request)
    {
        $validated = $request->validate([
            'nid' => 'required|unique:users,nid',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'name' => 'required',
            'vaccine_center_id' => 'required|exists:vaccine_centers,id',
        ]);



      
        $vaccineCenter = VaccineCenter::find($validated['vaccine_center_id']);
        
       
        if (in_array($vaccineCenter->name, ['Center A', 'Center B'])) {
           
            
            $registeredCount = User::where('vaccine_center_id', $vaccineCenter->id)->count();
          

            
            if ($registeredCount >= $vaccineCenter->daily_limit) {
                return redirect()->back()->with("success","Registration limit for $vaccineCenter->name has been reached.");
               
            }
        }

            $name= $validated['name'];
            $email=$validated['email'];
            $phone=$validated['phone'];
            $nid=$validated['nid'];
            $vaccine_center_id=$validated['vaccine_center_id'];
            DB::table('users')->insert([
                    'name'=>$name,
                    'phone'=>$phone,
                    'email'=>$email,
                    'nid'=>$nid,
                    'vaccine_center_id'=>$vaccine_center_id
                ]);
                $user=User::where('email',$email)->first();
                // ProcessVaccineScheduleMail::dispatch($user);
                return redirect()->back()->with('success',"hello, $user->name your registration has been completed");
    
    }
}
