@extends('layouts.admin.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">تعديل الافتات</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}"></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">الافتات</a>
                    </li>
                    <li class="breadcrumb-item active">تعديل الافتات</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('admin.header.update',$data->id) }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">تعديل الافتات</h4>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاسم</label>
                        <input class="form-control" type="text" name="title" placeholder=""
                            id="example-text-input" value="{{ old('title',$data->title) }}" required>
                        @error('name')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-12">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">الشعار</label>

                        <input class="form-control" name="logo" type="file" 
                            id="example-tel-input" value="{{ old('logo') }}" >
                        @error('logo')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <img src="{{asset('storage/headers/'.$data->logo)}}" class="w-50 img-thumbnail img-fluid" alt="">

                    
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
                <a href="{{ route('admin.header.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection