@extends('layouts.app')

@section('title')
    Manage Project
@endsection

@section('content')
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                       <div class="d-flex justify-content-between">
                            <form action="" class="me-2" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control shadow-none outline-0" name="search" required placeholder="Project Name" value="{{$search ?? ''}}">
                                    <button class="bg-primary text-white input-group-text" type="submit"><i class="bi bi-search"></i></button>
                                </div>
                            </form>
                            <a href="@route('project.create')" class="btn btn-primary me-1 mb-3">Add New</a>
                           
                       </div>
                    </div>
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Project Name</th>
                                    <th>Status</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $item)
                                <tr>
                                    <td><img src="{{asset('public/sections/projects/'.$item->image)}}" style="width:40px;height:40px;border-radius:50%" alt=""></td>
                                    <td class="text-bold-500">{{$item->title}}</td>
                                   
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-warning">Inactive</span>
                                        @endif
                                    </td>
                                   
                                    <td class="text-end">
                                        <a href="@route('project.edit',$item->id)" class="btn btn-primary btn-sm ">Edit</a>
                                        <a href="javascript:void" data-route="@route('project.remove',$item->id)" class="btn btn-danger btn-sm remove">Remove</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12" class="text-center">No data found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$projects->links()}}
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <form action="" method="POST">
           
           @csrf
        <div class="modal-content">
            <div class="modal-body text-center">
               <h3 class="text-danger display-2 mt-3"><i class="bi bi-exclamation-circle"></i></h3>
               <h5>Are you sure want to remove ?</h5>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Confirm</button>
            </div>
        </div>
       </form>
    </div>
</div>


@endsection

@push('script')
    <script>
        $('.remove').on('click',function () { 
            $('#delModal').find('form').attr('action',$(this).data('route'))
            $('#delModal').modal('show')
        })
    </script>
@endpush
