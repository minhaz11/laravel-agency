@extends('layouts.app')

@section('title')
Create Project
@endsection

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-header d-flex justify-content-between">
                       <h4>
                        Create New Project
                       </h4>
                       <a href="@route('manage.projects')" class="btn btn-primary">Back</a>
                    </div>
                    <div class="card-body">
                        <form action="@route('project.store')" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="mb-2 fw-bold">Category</label>
                                    <select name="category" class="form-control">
                                        <option value="">Select Category</option>
                                       @foreach ($categories as $item)
                                           <option value="{{$item->id}}">{{$item->name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                              
                                <div class="form-group mb-3 col-md-12">
                                    <label class="mb-2 fw-bold">Project Name</label>
                                    <input  class="form-control" type="text" name="title" required value="{{old('title')}}">
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <label class="mb-2 fw-bold">Project Description</label>
                                    <textarea name="description" class="form-control" id="summernote" rows="10">{{old('description')}}</textarea>
                                </div>

                                <div class="form-group mb-4 col-md-6">
                                    <label class="mb-2 fw-bold">Image</label>
                                    <img src="{{asset('public/assets/images/default.png')}}" class="card-img-top imageShow mb-3" width="100%" height="250px" alt="singleminded">
                                    <input class="form-control imageUpload" type="file" name="image" required>
                                </div>

                                <div class="form-group mb-4 col-md-6">
                                    <label class="mb-2 fw-bold">Version Details</label>
                                    <textarea name="version_details" class="form-control" id="vd" rows="15">{{old('version_details')}}</textarea>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label class="mb-2 fw-bold">Release Date</label>
                                    <input  class="form-control" type="date" name="r_date" required value="{{old('r_date')}}">
                                </div>
                                <div class="form-group mb-4 col-md-6">
                                    <label class="mb-2 fw-bold">Update Date</label>
                                    <input  class="form-control" type="date" name="u_date" value="{{old('u_date')}}">
                                </div>

                                <div class="form-group mb-4 col-md-12">
                                    <label class="mb-2 fw-bold">Codecanyone Link</label>
                                    <input  class="form-control" type="text" name="cc_link" placeholder="e.g. https://demo.com/" required value="{{old('cc_link')}}">
                                </div>
                                <div class="form-group mb-4 col-md-12">
                                    <label class="mb-2 fw-bold">Demo Link</label>
                                    <input  class="form-control" type="text" name="demo_link" placeholder="e.g. https://demo.com/" required value="{{old('demo_link')}}">
                                </div>

                                <div class="form-group mb-4 col-md-12">
                                    <label class="mb-2 fw-bold">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-primary w-100">Save</button>
                                </div>
                                
                                
                            </div>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</section>

@endsection
@push('style-lib')
<link rel="stylesheet" href="{{asset('public/assets/vendors/summernote/summernote-lite.min.css')}}">

<style>
    .form-control{
        box-shadow: none !important;
        outline: none !important
    }
</style>

@endpush
@push('script')
<script src="{{asset('public/assets/vendors/summernote/summernote-lite.min.js')}}"></script>
<script>
    $('#summernote').summernote({
        tabsize: 2,
        height: 120,
    })
    $('#vd').summernote({
        tabsize: 2,
        height: 170,
    })

    function proPicURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                
                $(input).parents('.card-content').find('.imageShow').attr('src',e.target.result)
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".imageUpload").on('change', function () {
        proPicURL(this);
    });
   
</script>
@endpush