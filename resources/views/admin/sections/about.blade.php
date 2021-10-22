@extends('layouts.app')

@section('title')
   About Section
@endsection

@section('content')
<section id="basic-vertical-layouts">
    <form class="form form-vertical" action="@route('update.section')" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="section" value="about">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage About Section</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                            
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="formFileMultiple" class="form-label"><strong>Image 1</strong></label>
                                        <input class="form-control form-control-lg" type="file" id="formFileMultiple" name="image_1">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="formFileMultiple" class="form-label"><strong>Image 2</strong></label>
                                        <input class="form-control form-control-lg" type="file" id="formFileMultiple" name="image_2">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="formFileMultiple" class="form-label"><strong>Image 3</strong></label>
                                        <input class="form-control form-control-lg" type="file" id="formFileMultiple" name="image_3">
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="email-id-icon"class="mb-2 font-weight-bold"><strong>Title</strong></label>
                                            <div class="position-relative">
                                                <input type="text" name="title" class="form-control form-control-lg"
                                                    placeholder="Title" id="email-id-icon" value="{{@$section->title}}" required>
                                                
                                            </div>
                                        </div>
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
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="mobile-id-icon"class="mb-2 font-weight-bold"><strong>Short Details</strong></label>
                                            <div class="position-relative">
                                                <textarea type="text" rows="5" name="short_details" class="form-control form-control-lg" placeholder="Short Details"  id="mobile-id-icon" required>{{@$section->short_details}}</textarea>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-primary me-1 mb-1 w-100">Submit</button>
                                       
                                    </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <h4 class="card-title">Elements</h4>
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary me-1 mb-3">Add New</a>

                                   </div>


                                    <div class="col-12">
                                        <div class="card">
                                           
                                            <div class="card-content">
                                                <!-- table bordered -->
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Icon</th>
                                                                <th>Title</th>
                                                                <th>Action</th> 
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($section->elements as $item)
                                                        
                                                            <tr>
                                                                <td class="text-bold-500">{!! $item->icon !!}</td>
                                                                <td>{{$item->title}}</td>
                                                                <td>
                                                                    <a href="javascript:void(0)" data-about="{{$item}}"class="btn btn-primary btn-sm edit">Edit</a>

                                                                    <a href="@route('remove.about',$item->id)" class="btn btn-danger btn-sm ">Remove</a>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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


<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="@route('store.about')" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="about_id" value="{{@$section->id}}">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add New</h5>
                </div>
                <div class="modal-body">
                   
                   <div class="form-group">
                       <label for="title">Icon</label>
                       <input id="title" class="form-control" type="text" name="icon" required>
                   </div>
                   
                   <div class="form-group">
                       <label for="title">Title</label>
                       <input id="title" class="form-control" type="text" name="title" required>
                   </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="@route('store.about')" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" >
            <input type="hidden" name="about_id" value="{{@$section->id}}">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Edit About</h5>
                </div>
                <div class="modal-body">
                    
                   <label for="title">Icon</label>
                   <div class="input-group">
                       <input id="title" class="form-control" type="text" name="icon">
                       <span class="input-group-text icon"></span>
                   </div>
                   <div class="form-group">
                       <label for="title">Title</label>
                       <input id="title" class="form-control" type="text" name="title">
                   </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('style-lib')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css"/>
@endpush

@push('script')
    <script>
        $('.edit').on('click',function () { 
            var data = $(this).data('about')
            var modal = $('#editModal')
            var html = data.icon;
            html = $.parseHTML( html);
            $('.icon').html(html)
            modal.find('input[name=id]').val(data.id)
            modal.find('input[name=title]').val(data.title)
            modal.find('input[name=icon]').val(data.icon)
            modal.modal('show')
        })
    </script>
@endpush