<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    public function projects(Request $request)
    {
        $search = $request->search;
        $projects = Project::when($search,function($q,$search){
            return $q->where('title','like',"%$search%");
        })->latest()->paginate(15);
        return view('admin.projects.index',compact('projects','search'));
    }

    public function create()
    {
        $categories = Category::where('status',1)->get();
        return view('admin.projects.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category'=> 'required|integer',
            'description' => 'required',
            'version_details' => 'required',
            'r_date' => 'required',
            'u_date' => 'after:r_date',
            'image'  => 'required|image|mimes:jpeg,png,jpeg,PNG,JPG|max:5080',
            'cc_link' => 'required|url',
            'demo_link' => 'url',
            'status' => 'required'
         ]);

         $project = new Project();
         $project->title = $request->title;
         $project->category_id = $request->category;
         $project->description = $request->description;
         $project->version_details = $request->version_details;
         $project->release_date = $request->r_date;
         $project->update_date = $request->u_date;
         $project->cc_link = $request->cc_link;
         $project->demo_link = $request->demo_link;
         $project->status = $request->status;
         if($request->image){
            $project->image = uploadImage($request->image,'public/sections/projects/','630x470');
         }
        $project->save();
        return back()->with('success','New project has been created');

    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $categories = Category::where('status',1)->get();
        return view('admin.projects.edit',compact('categories','project'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category'=> 'required|integer',
            'description' => 'required',
            'version_details' => 'required',
            'r_date' => 'required',
            'u_date' => 'after:r_date',
            'image'  => 'image|mimes:jpeg,png,jpeg,PNG,JPG|max:5080',
            'cc_link' => 'required|url',
            'demo_link' => 'url',
            'status' => 'required'
         ]);

         $project = Project::findOrfail($request->id);
         $project->title = $request->title;
         $project->category_id = $request->category;
         $project->description = $request->description;
         $project->version_details = $request->version_details;
         $project->release_date = $request->r_date;
         $project->update_date = $request->u_date;
         $project->cc_link = $request->cc_link;
         $project->demo_link = $request->demo_link;
         $project->status = $request->status;
         if($request->image){
            $project->image = uploadImage($request->image,'public/sections/projects/','630x470');
         }
        $project->save();
        return back()->with('success','Project has been updated');

    }

    public function remove($id)
    {
        $project = Project::findOrfail($id);
        $project->delete();
        return back()->with('success','Project has been removed');
    }

}
