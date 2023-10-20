@extends('layouts.provider.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">تعديل خدمة</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"></a>لوحة التحكم</li>
                    <li class="breadcrumb-item"><a href="{{ route('website.service.index') }}">خدمةين</a>
                    </li>
                    <li class="breadcrumb-item active">تعديل خدمة</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('website.service.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">تعديل خدمة</h4>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاسم</label>
                        <input class="form-control" type="text" name="title" placeholder="Mohamed Magdy"
                            id="example-text-input" value="{{ old('title',$data->title) }}" required>
                        @error('title')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-12">
                      <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                    </div>


                    <div class="col-md-12">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">الشعار</label>

                        <input class="form-control" name="logo" type="file" 
                            id="example-tel-input" value="{{ old('logo') }}" >
                        @error('logo')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <img src="{{asset('storage/services/'.$data->logo)}}" class="img-fluid w-50" alt="">
                    </div>

                    <div class="col-md-12">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">وصف</label>
    
                           <textarea name="description" class="form-control" id="" cols="30" rows="10">{{$data->description}}</textarea>
                        @error('description')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                    </div>
               
                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('website.service.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection