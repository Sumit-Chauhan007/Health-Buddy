<?php

namespace App\Http\Controllers;

use App\Models\AbcBlog;
use App\Models\ContactUsBlog;
use App\Models\ContactUse;
use App\Models\FirstBlog;
use App\Models\MedicalServices;
use App\Models\Starting;
use App\Models\TeamBlog;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class BLogController extends Controller
{
    public function firstBlog()
    {
        $blog = FirstBlog::first();
        return view('admin.firstBlog.blog', compact('blog'));
    }
    public function addFirstBlog()
    {
        return view('admin.firstBlog.addBlog');
    }
    public function addNewFirstBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading1' => 'required|min:3|max:50',
            'heading2' => 'required|min:3|max:50',
            'description1' => 'required|string',
            'description2' => 'required|string',
        ]);
        if ($validator->passes()) {
            $blog = FirstBlog::first();
            if ($blog) {
                $data = FirstBlog::first();
            } else {
                $data = new FirstBlog();
                $data->blog_uuid = Str::uuid();
            }
            $data->description1 = $request->description1;
            $data->description2 = $request->description2;
            $data->heading1 = $request->heading1;
            $data->heading2 = $request->heading2;
            $save = $data->save();
            if ($save) {
                return response()->json(['success' => 'first-blog']);
            }
        }
        // return response()->json($validator->errors());
        return response()->json(['error' => $validator->errors()]);
    }
    
    public function MedicalBlog()
    {
        $MedicalBlogs = MedicalServices::orderBy('created_at', 'desc')->get();
        return view('admin.medical.medical',compact('MedicalBlogs'));
    }
    public function editMedicalService($uuid)
    {
        $MedicalBlogs = MedicalServices::where('blog_uuid',$uuid)->first();
        return view('admin.medical.edit',compact('MedicalBlogs'));
    }
    public function editAbcService($uuid)
    {
        $AbcBlog = AbcBlog::where('uuid',$uuid)->first();
        return view('admin.abc.edit',compact('AbcBlog'));
    }
    public function editContact($uuid)
    {
        $Contact = ContactUsBlog::where('uuid',$uuid)->first();
        return view('admin.contactBlog.edit',compact('Contact'));
    }
    public function editTeam($uuid)
    {
        $Team = TeamBlog::where('uuid',$uuid)->first();
        return view('admin.team.edit',compact('Team'));
    }
    public function editTestimonial($uuid)
    {
        $testimonial = Testimonial::where('uuid',$uuid)->first();
        return view('admin.testimonials.edit',compact('testimonial'));
    }
    public function AbcBlog()
    {
        $AbcBlog = AbcBlog::orderBy('created_at', 'desc')->get();
        return view('admin.abc.abc',compact('AbcBlog'));
    }
    public function ContactBlog()
    {
        $ContactUs = ContactUsBlog::orderBy('created_at', 'desc')->get();
        return view('admin.contactBlog.contactBlog',compact('ContactUs'));
    }
    public function TeamBlog()
    {
        $teams = TeamBlog::orderBy('created_at', 'desc')->get();
        return view('admin.team.team',compact('teams'));
    }

    public function Testimonial()
    {
        $Testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.testimonialS.testimonial',compact('Testimonials'));
    }

    public function addMedicalBlog()
    {
        return view('admin.medical.addBlog');
    }
    public function addAbcBlog()
    {
        return view('admin.abc.addBlog');
    }
    public function addContactBlog()
    {
        return view('admin.contactBlog.addBlog');
    }
    public function addTeamBlog()
    {
        return view('admin.team.addBlog');
    }
    public function addTestimonial()
    {
        return view('admin.testimonialS.addBlog');

    }
    public function actTest($uuid)
    {
        Testimonial::where('uuid', $uuid)->update(['status' => 'Active']);
        return redirect()->back()->with("success", "Testimonial Activated Successfully");
    }

    public function deactTest($uuid)
    {
        Testimonial::where('uuid', $uuid)->update(['status' => 'in-active']);
        return redirect()->back()->with("success", "Testimonial De-Activated Successfully");
    }
    public function deleteTest($uuid)
    {
        Testimonial::where('uuid', $uuid)->delete();
        return redirect()->back()->with("success", "Testimonial Deleted Successfully");
    }

    public function addNewMedicalBlog(Request $request)
    {
        $uuid = $request->uuid;
      
        $rules = [
            'heading' => 'required|min:3|max:50',
            'description' => 'required|string|max:1000',
        ];

        if (!$uuid) {
            $rules['image'] = 'required|mimes:png|max:2000';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
       if($uuid){
           $data = MedicalServices::where('blog_uuid',$uuid)->first();

       }
       else{
           $data = new MedicalServices();
           $data->blog_uuid = Str::uuid();

       }   
            $image = $request->image;
            if ($image) {
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $image->move('assets/images/Medical',$imagename);
                $data->image = $imagename;
                }
            $data->description = $request->description;
            $data->heading = $request->heading;
            $save = $data->save();
            if($save){
                return response()->json(['success'=>'/medical-services-blog']);
            }
        }
        // return response()->json($validator->errors());
        return response()->json(['error'=>$validator->errors()]);

    }
    public function addNewAbcBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading1' => 'required|min:3|max:50',
            'heading2' => 'required|min:3|max:50',
            'heading3' => 'required|min:3|max:50',
            'description1' => 'required|string|max:1000',
            'description2' => 'required|string|max:1000',
            'description3' => 'required|string|max:1000',
        ]);
        if ($validator->passes()) {
            $uuid = $request->uuid;
                if($uuid){
                    $data =  AbcBlog::where('uuid', $uuid)->first();

                }
                else{
                    $data = new AbcBlog();
                $data->uuid = Str::uuid();
                }
                AbcBlog::where('status','Active')->update(['status' => 'In-Active']);
            $data->description1 = $request->description1;
            $data->description2 = $request->description2;
            $data->description3 = $request->description3;
            $data->heading1 = $request->heading1;
            $data->heading2 = $request->heading2;
            $data->heading3 = $request->heading3;
            $save = $data->save();
            if($save){
                return response()->json(['success'=>'/abc-blog']);
            }
        }
        // return response()->json($validator->errors());
        return response()->json(['error'=>$validator->errors()]);

    }
    public function addNewContactBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'heading' => 'required|min:3|max:50',
            'description1' => 'required|string|max:1000',
            'description2' => 'required|string|max:1000',
            'description3' => 'required|string|max:1000',
        ]);
        if ($validator->passes()) {
            $uuid = $request->uuid;
            if($uuid){
                $data = ContactUsBlog::where('uuid', $uuid)->first();
            }
            else{
                $data = new ContactUsBlog();
                $data->uuid = Str::uuid();
            }

                ContactUsBlog::where('status','Active')->update(['status' => 'In-Active']);
            $data->description1 = $request->description1;
            $data->description2 = $request->description2;
            $data->description3 = $request->description3;
            $data->heading = $request->heading;
            $save = $data->save();
            if($save){
                return response()->json(['success'=>'/contact-blog']);
            }
        }
        // return response()->json($validator->errors());
        return response()->json(['error'=>$validator->errors()]);

    }
    public function addNewTeamBlog(Request $request)
    { $uuid = $request->uuid;
      
        $rules = [
            'name' => 'required|min:3|max:30',
            'description' => 'required|string',
            'designation' => 'required|string',
        ];

        if (!$uuid) {
            $rules['image'] = 'required|mimes:png|max:2000';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
            if($uuid){
                $data = TeamBlog::where('uuid', $uuid)->first();
            }
            else{
                $data = new TeamBlog();
                $data->uuid = Str::uuid();
            }
                $image = $request->image;
                if ($image) {
                    $imagename = time().'.'.$image->getClientOriginalExtension();
                    $image->move('assets/images/team',$imagename);
                    $data->image = $imagename;
                    }
                $data->name = $request->name;
                $data->description = $request->description;
                $data->designation = $request->designation;
                $save = $data->save();
            if($save){
                return response()->json(['success'=>'/team-blog']);
            }
        }
        // return response()->json($validator->errors());
        return response()->json(['error'=>$validator->errors()]);

    }

    public function addNewTestimonial(Request $request)
    { $uuid = $request->uuid;
        $rules = [
            'Name' => 'required|min:3|max:30',
            'description' => 'required|string',
            'Designation' => 'required|string',
        ];

        if (!$uuid) {
            $rules['image'] = 'required|mimes:png|max:2000';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->passes()) {
           if($uuid){
               $data = Testimonial::where('uuid', $uuid)->first();

           }
           else{
            $data = new Testimonial();
            $data->uuid = Str::uuid();
           }
            $image = $request->image;
            if ($image) {
                $imagename = time().'.'.$image->getClientOriginalExtension();
                $image->move('assets/images/testimonial',$imagename);
                $data->image = $imagename;
                }
            $data->name = $request->Name;
            $data->description = $request->description;
            $data->designation = $request->Designation;
            $save = $data->save();
            if($save){
                return response()->json(['success'=>'/testimonial']);
            }
        }
        // return response()->json($validator->errors());
        return response()->json(['error'=>$validator->errors()]);

    }

}
