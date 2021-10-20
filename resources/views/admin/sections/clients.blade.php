@extends('layouts.app')

@section('title')
  Client Section
@endsection

@section('content')
<section id="basic-vertical-layouts">
    <form class="form form-vertical" action="@route('update.section')" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="section" value="clients">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Client Section</h4>
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
                                    <h4 class="card-title">Clients</h4>
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
                                                                <th>Author</th>
                                                                <th>Designation</th>
                                                                <th>Quote</th>
                                                                <th>Action</th> 
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($section->elements as $item)
                                                         
                                                            <tr>
                                                                <td class="text-bold-500">{{$item->author}}</td>
                                                                <td>{{$item->designation}}</td>
                                                                <td>{{Str::limit($item->quote,30)}}</td>
                                                                <td>
                                                                    <a href="javascript:void(0)" data-client="{{$item}}" data-image="{{asset('public/sections/clients/'.$item->image)}}" class="btn btn-primary btn-sm edit">Edit</a>

                                                                    <a href="@route('remove.clients',$item->id)" class="btn btn-danger btn-sm">Remove</a>
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
        <form action="@route('store.clients')" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="client_id" value="{{@$section->id}}">
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
                       <label for="title">Client name</label>
                       <input id="title" class="form-control" type="text" name="author" required>
                   </div>
                   <div class="form-group">
                       <label for="title">Designation</label>
                       <input id="title" class="form-control" type="text" name="designation" required>
                   </div>
                   <div class="form-group">
                       <label for="title">Quote</label>
                       <textarea name="quote" rows="5" class="form-control"></textarea>
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
        <form action="@route('store.clients')" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" >
            <input type="hidden" name="client_id" value="{{@$section->id}}">
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
                        <label for="title">Client name</label>
                        <input id="title" class="form-control" type="text" name="author" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Designation</label>
                        <input id="title" class="form-control" type="text" name="designation" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Quote</label>
                        <textarea name="quote" rows="5" class="form-control"></textarea>
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
            var data = $(this).data('client')
            var modal = $('#editModal')

            modal.find('input[name=id]').val(data.id)
            modal.find('input[name=author]').val(data.author)
            modal.find('input[name=designation]').val(data.designation)
            modal.find('textarea[name=quote]').val(data.quote)
            modal.find('.imageShow').attr('src',$(this).data('image'))
            modal.modal('show')
        })
    </script>
@endpush