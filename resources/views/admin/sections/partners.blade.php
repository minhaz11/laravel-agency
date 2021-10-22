@extends('layouts.app')

@section('title')
   Partner Section
@endsection

@section('content')
<section id="basic-vertical-layouts">
    <form class="form form-vertical" action="@route('update.section')" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="section" value="partners">
        <input type="hidden" name="id" value="{{$section->id}}">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <div class="form-group">
                                            <label for="email-id-icon"class="mb-2 font-weight-bold"><strong>Title</strong></label>
                                            <div class="position-relative">
                                                <input type="text" name="title" class="form-control form-control-lg"
                                                    placeholder="Title" id="email-id-icon" value="{{@$section->title}}" required>
                                                
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-12 d-flex justify-content-center">
                                        <button type="submit"class="btn btn-primary me-1 mb-1 w-100">Submit</button>
                                       
                                    </div>

                                <div class="d-flex justify-content-between mt-4">
                                    <h4 class="card-title">Logos</h4>
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
                                                                <th>SL</th>
                                                                <th>Logo</th>
                                                                <th>Action</th> 
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($section->logo as $item)
                                                        
                                                            <tr>
                                                                <td>{{$loop->iteration}}</td>
                                                                <td>
                                                                    <div class="partner-thumb">
                                                                        <img src="{{asset('public/sections/partners/'.$item)}}" alt="partner" >
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0)" data-logo="{{asset('public/sections/partners/'.$item)}}"data-file="{{$item}}" class="btn btn-primary btn-sm edit">Edit</a>

                                                                    <a href="@route('remove.partner',$item)" class="btn btn-danger btn-sm ">Remove</a>
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
        <form action="@route('update.section')" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="section" value="partners">
            <input type="hidden" name="id" value="{{$section->id}}">
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
                                    <input class="form-control imageUpload" type="file" name="logo" required>
                                </div>
                            </div>
                           
                        </div>
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
            <input type="hidden" name="id" value="{{$section->id}}">
            <input type="hidden" name="section" value="partners">
            <input type="hidden" name="file" value="">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Edit Partner</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="card">
                            <div class="card-content">
                                <img src="{{asset('public/assets/images/default.png')}}" class="card-img-top img-fluid imageShow" alt="singleminded">
                                <div class="card-body">
                                    <input class="form-control imageUpload" type="file" name="logo" required>
                                </div>
                            </div>
                           
                        </div>
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
            var data = $(this).data('logo')
            var modal = $('#editModal')
            modal.find('input[name=file]').val($(this).data('file'))
            modal.find('.imageShow').attr('src',data)
            modal.modal('show')
        })
    </script>
@endpush