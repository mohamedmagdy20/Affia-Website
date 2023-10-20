@extends('layouts.admin.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"> التواصل</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}"></a></li>
                    </li>
                    <li class="breadcrumb-item active"> التواصل</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('admin.contact.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title"> التواصل</h4>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الايميل</label>
                        <input class="form-control" type="email" name="email" placeholder=""
                            id="example-text-input" value="{{ old('email',$data->email) }}" required>
                        @error('email')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الهاتف</label>
                        <input class="form-control" type="tel" name="phone" placeholder=""
                            id="example-text-input" value="{{ old('phone',$data->phone) }}" required>
                        @error('phone')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="example-text-input" class="col-sm-2 col-form-label">فيسبوك</label>
                        <input class="form-control" type="url" name="facebook_url" placeholder=""
                            id="example-text-input" value="{{ old('facebook_url',$data->facebook_url) }}" required>
                        @error('facebook_url')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="example-text-input" class="col-sm-2 col-form-label">انيستجرام</label>
                        <input class="form-control" type="url" name="instegram_url" placeholder=""
                            id="example-text-input" value="{{ old('instegram_url',$data->instegram_url) }}" required>
                        @error('instegram_url')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="example-text-input" class="col-sm-2 col-form-label">تويتر</label>
                        <input class="form-control" type="url" name="twitter_url" placeholder=""
                            id="example-text-input" value="{{ old('twitter_url',$data->twitter_url) }}" required>
                        @error('twitter_url')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">الشعار</label>
    
                            <input class="form-control" name="logo" type="file" 
                                id="example-tel-input" value="{{ old('logo') }}" required>
                            @error('logo')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
    
                            <img src="{{asset('storage/settings/'.$data->logo)}}" class="w-50 img-thumbnail img-fluid" alt="">
                    </div>
    
                
                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('admin') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection