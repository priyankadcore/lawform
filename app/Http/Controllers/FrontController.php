<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Setting;
use App\Models\Property;
use App\Models\TeamMember;
use App\Models\Blog;

class FrontController extends Controller
{
    public function index()
    {
        $home_sliders = Slider::all();
        $services = Service::where('status', 1)->get();
        $settings = Setting::first();
        $properties = Property::with(['propertyType','propertyStatus','country','state','city'])->where('status', 1)->take(6)->get();
        $teamMembers = TeamMember::where('status', 'active')->get();
        $socialLinks = json_decode($settings->social_links, true) ?? [];
        $blogs = Blog::with('author')->where('status', 1)->take(3)->get();

        return view('index',compact('home_sliders','settings','services','properties','teamMembers','socialLinks','blogs'));
    }
    public function second()
    {
        return view('second');
    }
    public function third()
    {
        return view('third');
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact'); 
    }
    public function services()
    {
        return view('services');
    }
    public function properties()
    {
        return view('properties');
    }
    public function propertyDetail($id)
    {
        return view('property_detail', ['id' => $id]);
    }

    public function ourTeam()
    {
        return view('our_team');
    }
    public function blog()
    {
        return view('blog');
    }
    public function blogDetail($id)
    {
        return view('blog_detail', ['id' => $id]);
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        return view('search_results', ['query' => $query]);     
    }

    public function propertyList()
    {
        return view('property_listing');
    }
}
