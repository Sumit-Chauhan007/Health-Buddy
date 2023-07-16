<?php

namespace App\Http\Controllers;

use App\Models\AbcBlog;
use App\Models\ContactUsBlog;
use App\Models\MedicalServices;
use App\Models\TeamBlog;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function activeMedicalBlog($uuid){
        MedicalServices::where('blog_uuid', $uuid)->update(['status' => 'Active']);
        return redirect()->back()->with("success", "Blog Activated Successfully");
    }
    public function deactiveMedicalBlog($uuid){
        MedicalServices::where('blog_uuid', $uuid)->update(['status' => 'In-Active']);
        return redirect()->back()->with("success", "Blog De-Activated Successfully");
    }
    public function activeAbcBlog($uuid){
        AbcBlog::where('status', 'Active')->update(['status' => 'In-Active']);;
        AbcBlog::where('uuid', $uuid)->update(['status' => 'Active']);
        return redirect()->back()->with("success", "Blog Activated Successfully");
    }
    public function deactiveAbcBlog($uuid){
        AbcBlog::where('uuid', $uuid)->update(['status' => 'In-Active']);
        return redirect()->back()->with("success", "Blog De-Activated Successfully");
    }
    public function deleteMedical($uuid){
        MedicalServices::where('blog_uuid', $uuid)->delete();
        return redirect()->back()->with("success", "Blog Deleted Successfully");
    }
    public function deActiveContactBlog($uuid){
        ContactUsBlog::where('uuid', $uuid)->update(['status' => 'In-Active']);
        return redirect()->back()->with("success", "Blog De-Activated Successfully");
    }
    public function ActiveContactBlog($uuid){
        ContactUsBlog::where('status', 'Active')->update(['status' => 'In-Active']);
        ContactUsBlog::where('uuid', $uuid)->update(['status' => 'Active']);
        return redirect()->back()->with("success", "Blog Activated Successfully");
    }
    public function deleteContact($uuid){
        ContactUsBlog::where('uuid', $uuid)->delete();
        return redirect()->back()->with("success", "Blog Deleted Successfully");
    }
    public function deActiveTeamBlog($uuid){
        TeamBlog::where('uuid', $uuid)->update(['status' => 'In-Active']);
        return redirect()->back()->with("success", "Blog De-Activated Successfully");
    }
    public function ActiveTeamBlog($uuid){
        TeamBlog::where('uuid', $uuid)->update(['status' => 'Active']);
        return redirect()->back()->with("success", "Blog Activated Successfully");
    }
    public function deleteTeamBlog($uuid){
        TeamBlog::where('uuid', $uuid)->delete();
        return redirect()->back()->with("success", "Blog Deleted Successfully");
    }
    public function deleteAbc($uuid){
        AbcBlog::where('uuid', $uuid)->delete();
        return redirect()->back()->with("success", "Blog Deleted Successfully");
    }

}
