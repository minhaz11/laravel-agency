@extends('layouts.app')

@section('title')
    Banner Section
@endsection

@section('content')
<section id="basic-vertical-layouts">
    <form class="form form-vertical" action="@route('update.section')" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="section" value="banner">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Banner</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                            
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="formFileMultiple" class="form-label"><strong>Background Video</strong></label>
                                        <input class="form-control form-control-lg" type="file" id="formFileMultiple" name="bg_video">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="email-id-icon"class="mb-2 font-weight-bold"><strong>Heading</strong></label>
                                            <div class="position-relative">
                                                <input type="text" name="heading" class="form-control form-control-lg"
                                                    placeholder="Heading" id="email-id-icon" value="{{@$section->heading}}" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="mobile-id-icon"class="mb-2 font-weight-bold"><strong>Sub Heading</strong></label>
                                            <div class="position-relative">
                                                <input type="text" name="sub_heading" class="form-control form-control-lg"
                                                    placeholder="Sub heading" value="{{@$section->sub_heading}}" id="mobile-id-icon" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="password-id-icon"class="mb-2 font-weight-bold"><strong>First Button Name</strong></label>
                                            <div class="position-relative">
                                                <input type="text" name="button_1_name" class="form-control form-control-lg"
                                                    placeholder="Button Name"  id="password-id-icon" value="{{@$section->button_1_name}}" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label class="mb-2 font-weight-bold"><strong>First Button Link</strong></label>
                                            <div class="position-relative">
                                                <input type="text" name="button_1_link" class="form-control form-control-lg"
                                                    placeholder="Button Link"  value="{{@$section->button_1_link}}" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label class="mb-2 font-weight-bold"><strong>Second Button Name</strong></label>
                                            <div class="position-relative">
                                                <input type="text" name="button_2_name" class="form-control form-control-lg"
                                                    placeholder="Button Name"  value="{{@$section->button_2_name}}" required>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label class="mb-2 font-weight-bold"><strong>Second Button Link</strong></label>
                                            <div class="position-relative">
                                                <input type="text" name="button_2_link" class="form-control form-control-lg"
                                                    placeholder="Button Link"  value="{{@$section->button_2_link}}" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1 w-100">Submit</button>
                                       
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
