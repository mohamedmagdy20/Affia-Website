@extends('layouts.admin.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">اضافة مسئول</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}"></a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">المسئولين</a>
                    </li>
                    <li class="breadcrumb-item active">اضافة مسئول</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('admin.store') }}">
                @csrf
                <h4 class="card-title">اضافةمسئول</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاسم</label>
                        <input class="form-control" type="text" name="name" placeholder="Mohamed Magdy"
                            id="example-text-input" value="{{ old('name') }}" required>
                        @error('name')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                    <label for="example-text-input" class="col-sm-2 col-form-label">البريد الالكتروني</label>

                        <input class="form-control" type="email" name="email" placeholder="Ex: example@example.com"
                            id="example-text-input" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-12">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">الهاتف</label>

                        <input class="form-control" name="phone" type="tel" placeholder="Ex: +201066018340"
                            id="example-tel-input" value="{{ old('phone') }}" required>
                        @error('phone')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
            
                <!-- end row -->
                    <div class="col-md-6">
                    <label for="example-password-input" class=" col-form-label">الرقم السري</label>

                        <input class="form-control" name="password" type="password"  id="example-password-input"
                            required>
                        @error('password')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                    <label for="example-password-input" class=" col-form-label">تاكيد الرقم السري</label>
                        
                        <input class="form-control" name="password_confirmation" type="password" id="example-password-input"
                            required>
                        @error('confirm_password')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

               
                <!-- end row -->
                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('admin.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->
@endsection