@extends('layouts.app')

@section('title')
Manage Categories
@endsection

@section('content')
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                            <div class="form-body">
                                <div class="row">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title">Categories</h4>
                                        <div class="d-flex">
                                            <form action="" class="me-2" method="GET">
                                                <div class="input-group">
                                                    <input type="text" class="form-control shadow-none outline-0" name="search" required placeholder="Category Name" value="{{$search ?? ''}}">
                                                    <button class="bg-primary text-white input-group-text" type="submit"><i class="bi bi-search"></i></button>
                                                </div>
                                            </form>
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#addModal" class="btn btn-primary me-1 mb-3">Add New</a>
                                        </div>
                                   </div>

                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <!-- table bordered -->
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Status</th>
                                                                <th class="text-end">Action</th> 
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($categories as $item)
                                                        
                                                            <tr>
                                                                <td class="text-bold-500">{{$item->name }}</td>
                                                                <td>
                                                                    @if ($item->status ==1)
                                                                        <span class="badge bg-success">Active</span>
                                                                    @else
                                                                        <span class="badge bg-warning">Inactive</span>
                                                                    @endif
                                                                </td>
                                                               
                                                                <td class="text-end">
                                                                    <a href="javascript:void(0)" data-cat="{{$item}}" class="btn btn-primary btn-sm edit">Edit</a>

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
        <form action="@route('store.category')" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Add New</h5>
                </div>
                <div class="modal-body">
                   <div class="form-group">
                       <label for="title">Category Name</label>
                       <input id="title" class="form-control" type="text" name="name" required>
                   </div>
                   <div class="form-group">
                       <label for="title">Status</label>
                       <select name="status" class="form-control">
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                       </select>
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
        <form action="@route('update.category')" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">Edit Category</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Category Name</label>
                        <input id="title" class="form-control" type="text" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
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
       
        $('.edit').on('click',function () { 
            var data = $(this).data('cat')
            var modal = $('#editModal')
           
            modal.find('input[name=id]').val(data.id)
            modal.find('input[name=name]').val(data.name)
            modal.find('select[name=status]').val(data.status)
            modal.modal('show')
        })
    </script>
@endpush