@extends('layouts.app')

@section('title')
How To Section
@endsection

@section('content')
<section id="basic-vertical-layouts">
    
    <input type="hidden" name="section" value="about">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                
                <div class="card-content">
                    <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">How To Steps</h4>
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
                                                                <th>Step</th>
                                                                <th>Title</th> 
                                                                <th>Heading</th> 
                                                                <th>Short Details</th> 
                                                                <th>Action</th> 
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($section as $item)
                                                        
                                                            <tr>
                                                                <td class="text-bold-500">{!! $item->icon !!}</td>
                                                                <td>{{$item->step}}</td>
                                                                <td>{{$item->title}}</td>
                                                                <td>{{$item->heading}}</td>
                                                                <td>{{Str::limit($item->short_details,40)}}</td>
                                                                <td>
                                                                    <a href="javascript:void(0)" data-how="{{$item}}" data-image="{{asset('public/sections/how/'.$item->image)}}" class="btn btn-primary btn-sm edit">Edit</a>

                                                                    <a href="@route('remove.how',$item->id)" class="btn btn-danger btn-sm ">Remove</a>
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
   
</section>


<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="@route('update.section')" method="POST" enctype="multipart/form-data">
            @csrf
           <input type="hidden" name="section" value="how">
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
                       <label for="title">Icon</label>
                       <input id="title" class="form-control" type="text" name="icon" required>
                   </div>
                   <div class="form-group">
                       <label for="title">Step</label>
                       <input  class="form-control" type="text" name="step" required>
                   </div>
                   
                   <div class="form-group">
                       <label for="title">Title</label>
                       <input id="title" class="form-control" type="text" name="title" required>
                   </div>
                   <div class="form-group">
                       <label for="title">Heading</label>
                       <input  class="form-control" type="text" name="heading" required>
                   </div>
                   <div class="form-group">
                       <label for="title">Short Details</label>
                       <textarea  class="form-control"  name="short_details" required></textarea>
                   </div>
                   <div class="form-group">
                       <label for="title">Button name</label>
                       <input  class="form-control" type="text"  name="btn_name" required>
                   </div>
                   <div class="form-group">
                       <label for="title">Button Link</label>
                       <input  class="form-control" type="text"  name="btn_link" required>
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
        <form action="@route('update.section')" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id">
            <input type="hidden" name="section" value="how">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Edit How To</h5>
                </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <div class="card">
                            <div class="card-content">
                                <img src="{{asset('public/assets/images/default.png')}}" class="card-img-top img-fluid imageShow" alt="singleminded">
                                <div class="card-body">
                                    <input class="form-control imageUpload" type="file" name="image">
                                </div>
                            </div>
                           
                        </div>
                    </div>
                   
                   <div class="form-group">
                       <label for="title">Icon</label>
                       <input id="title" class="form-control" type="text" name="icon" required>
                   </div>
                   <div class="form-group">
                       <label for="title">Step</label>
                       <input  class="form-control" type="text" name="step" required>
                   </div>
                   
                   <div class="form-group">
                       <label for="title">Title</label>
                       <input id="title" class="form-control" type="text" name="title" required>
                   </div>
                   <div class="form-group">
                       <label for="title">Heading</label>
                       <input  class="form-control" type="text" name="heading" required>
                   </div>
                   <div class="form-group">
                       <label for="title">Short Details</label>
                       <textarea  class="form-control"  name="short_details" required></textarea>
                   </div>
                   <div class="form-group">
                       <label for="title">Button name</label>
                       <input  class="form-control" type="text"  name="btn_name" required>
                   </div>
                   <div class="form-group">
                       <label for="title">Button Link</label>
                       <input  class="form-control" type="text"  name="btn_link" required>
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
            var data = $(this).data('how')
            var image = $(this).data('image')
            var modal = $('#editModal')
           
            modal.find('input[name=id]').val(data.id)
            modal.find('input[name=title]').val(data.title)
            modal.find('input[name=icon]').val(data.icon)
            modal.find('input[name=step]').val(data.step)
            modal.find('input[name=heading]').val(data.heading)
            modal.find('textarea[name=short_details]').val(data.short_details)
            modal.find('input[name=btn_name]').val(data.button_text)
            modal.find('input[name=btn_link]').val(data.button_link)
            modal.find('.imageShow').attr('src',$(this).data('image'))
            modal.modal('show')
        })
    </script>
@endpush