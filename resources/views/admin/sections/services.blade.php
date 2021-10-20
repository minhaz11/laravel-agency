@extends('layouts.app')

@section('title')
  Services Section
@endsection

@section('content')
<section id="basic-vertical-layouts">
    <form class="form form-vertical" action="@route('update.section')" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="section" value="services">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Services Section</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                            
                            <div class="form-body">
                                <div class="row">
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
                                            <label for="mobile-id-icon"class="mb-2 font-weight-bold"><strong>Sub Heading</strong></label>
                                            <div class="position-relative">
                                                <input type="text"  name="sub_heading" class="form-control form-control-lg" placeholder="Sub Heading"  id="mobile-id-icon" value="{{@$section->sub_heading}}" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-center mb-2">
                                        <button type="submit" class="btn btn-primary me-1 mb-1 w-100">Submit</button>
                                    </div>

                                    <hr>

                                   <div class="d-flex justify-content-between mt-4">
                                    <h4 class="card-title">Services</h4>
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
                                                                <th>Title</th>
                                                                <th>Short Details</th>
                                                                <th>Action</th> 
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($section->elements as $item)
                                                         
                                                            <tr>
                                                                <td class="text-bold-500">{{$item->title}}</td>
                                                                <td>{{$item->short_details}}</td>
                                                                <td>
                                                                    <a href="javascript:void(0)" data-service="{{$item}}" data-image="{{asset('public/sections/services/'.$item->icon_image)}}" class="btn btn-primary btn-sm edit">Edit</a>

                                                                    <a href="@route('remove.services',$item->id)" class="btn btn-danger btn-sm">Remove</a>
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
        <form action="@route('store.services')" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="service_id" value="{{@$section->id}}">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add New</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="card">
                            <div class="card-content">
                                <img src="{{asset('public/assets/images/default.png')}}" class="card-img-top img-fluid imageShow" alt="singleminded">
                                <div class="card-body">
                                    <input class="form-control imageUpload" type="file" name="image" required>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                   <div class="form-group">
                       <label for="title">Title</label>
                       <input id="title" class="form-control" type="text" name="title" required>
                   </div>
                   <div class="form-group">
                       <label for="details">Short Details</label>
                       <textarea id="details" class="form-control" name="short_details" required></textarea>
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
        <form action="@route('store.services')" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" >
            <input type="hidden" name="service_id" value="{{@$section->id}}">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Edit Service</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="card">
                            <div class="card-content">
                                <img src="" class="card-img-top img-fluid imageShow" alt="singleminded">
                                <div class="card-body">
                                    <input class="form-control imageUpload" type="file" name="image">
                                </div>
                            </div>
                           
                        </div>
                    </div>
                   <div class="form-group">
                       <label for="title">Title</label>
                       <input id="title" class="form-control" type="text" name="title">
                   </div>
                   <div class="form-group">
                       <label for="details">Short Details</label>
                       <textarea id="details" class="form-control" name="short_details"></textarea>
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

@push('script')
    <script>
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


        $('.edit').on('click',function () { 
            var data = $(this).data('service')
            var modal = $('#editModal')

            modal.find('input[name=id]').val(data.id)
            modal.find('input[name=title]').val(data.title)
            modal.find('textarea[name=short_details]').val(data.short_details)
            modal.find('.imageShow').attr('src',$(this).data('image'))
            modal.modal('show')
        })
    </script>
@endpush