@extends('layouts.app')

@section('title')
   Partner Section
@endsection

@section('content')
<section id="basic-vertical-layouts">
    <form class="form form-vertical" action="@route('update.section')" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="section" value="cta">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label class="mb-2 font-weight-bold"><strong>Title</strong></label>

                                            <input type="text" name="title" class="form-control form-control-lg"placeholder="Title" value="{{@$section->title}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-2 font-weight-bold"><strong>Button Name</strong></label>
                                            <input type="text" name="btn_name" class="form-control form-control-lg" value="{{@$section->button_text}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-2 font-weight-bold"><strong>Button Link</strong></label>
                                            <input type="text" name="btn_link" class="form-control form-control-lg" value="{{@$section->button_link}}" required>
                                        </div>
                                    </div>
                                
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit"class="btn btn-primary me-1 mb-1 w-100">Submit</button>
                                       
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>



@endsection

