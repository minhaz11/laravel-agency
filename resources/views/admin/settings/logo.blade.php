@extends('layouts.app')

@section('title')
    Logo and Favicon Setting
@endsection

@section('content')
<section id="basic-vertical-layouts">
    <form class="form form-vertical" action="" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row match-height justify-content-center">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Site Logo (Lite)</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="card">
                                                <div class="card-content">
                                                    
                                                    @if (setting()->logo)
                                                        <img src="{{asset('public/assets/images/logo/'.setting()->logo)}}" class="card-img-top img-fluid imageShow w-100" alt="singleminded">
                                                    @else
                                                        <img src="{{asset('public/assets/images/default.png')}}" class="card-img-top img-fluid imageShow" alt="singleminded">
                                                    @endif
                                                    <div class="card-body">
                                                        <input class="form-control imageUpload" type="file" name="logo">
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
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Site Logo (dark)</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="card">
                                                <div class="card-content">
                                                    
                                                    @if (setting()->logo_dark)
                                                        <img src="{{asset('public/assets/images/logo/'.setting()->logo_dark)}}" class="card-img-top img-fluid imageShow w-100" alt="singleminded">
                                                    @else
                                                        <img src="{{asset('public/assets/images/default.png')}}" class="card-img-top img-fluid imageShow" alt="singleminded">
                                                    @endif
                                                    <div class="card-body">
                                                        <input class="form-control imageUpload" type="file" name="logo_dark">
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
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Favicon</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="card">
                                                <div class="card-content">
                                                    @if (setting()->favicon)
                                                        <img src="{{asset('public/assets/images/logo/'.setting()->favicon)}}" class="card-img-top img-fluid imageShow w-100" alt="singleminded">
                                                    @else
                                                        <img src="{{asset('public/assets/images/default.png')}}" class="card-img-top img-fluid imageShow" alt="singleminded">
                                                    @endif
                                                    <div class="card-body">
                                                        <input class="form-control imageUpload" type="file" name="favicon">
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
        <div class="col-md-8 col-12">
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
    </div>
       
    </form>
</section>
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

    </script>
@endpush