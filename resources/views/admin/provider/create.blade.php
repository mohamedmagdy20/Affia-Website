@extends('layouts.admin.app')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('admin.provider.store') }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">اضافة المستخدم</h4>
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
                        <label for="example-text-input" class="col-sm-2 col-form-label">رقم التسجيل</label>
                        <input class="form-control" type="text" name="registeration_num" placeholder="XXXXXX"
                            id="example-text-input" value="{{ old('registeration_num') }}" required>
                        @error('registeration_num')
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
    
    
                        <div class="col-md-6">
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

                        <div class="col-md-6">
                        <label for="example-password-input" class=" col-form-label">المدينة</label>
                            <select name="country_id" class="country_id form-control" id="country_id">
                                @foreach ($country as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="example-password-input" class=" col-form-label">المنطقة</label>
                                <select name="city_id" class="city_id form-control" id="city_id">
                                    @foreach ($city as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                        </div>


                        
                        <div class="col-md-6">
                            <label for="example-password-input" class=" col-form-label">الجهة</label>
                                <select name="entity_id" class="entity_id form-control" id="entity_id">
                                    @foreach ($entity as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                        
                        <div class="col-md-6">
                            <label for="example-password-input" class=" col-form-label">التصنيف</label>
                                <select name="category_id" class="category_id form-control" id="category_id">
                                    @foreach ($category as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                        </div>
    

                        
                        <div class="col-md-6">
                            <label for="example-tel-input" class="col-sm-2 col-form-label">موقع الكتروني</label>
        
                                <input class="form-control" name="url" type="url" placeholder=""
                                    id="example-tel-input" value="{{ old('url') }}" required>
                                @error('url')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                        </div>

                        
                        <div class="col-md-6">
                            <label for="example-tel-input" class="col-sm-2 col-form-label">تواصل اجتماعي</label>
        
                                <input class="form-control" name="media" type="url" placeholder=""
                                    id="example-tel-input" value="{{ old('media') }}" required>
                                @error('media')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                        </div>
                    


                    <div class="col-md-12">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">الشعار</label>

                        <input class="form-control" name="image" type="file" 
                            id="example-tel-input" value="{{ old('image') }}" required>
                        @error('image')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="col-md-12">
                        <input type="hidden" class="form-control" placeholder="lat" name="lat" id="lat">
                        <input type="hidden" class="form-control" placeholder="long" name="lng"
                            id="lng">
                        <label for="">اختر الموقع</label>
                        <div id="map" style="height:300px; width: 600px;" class="my-3"></div>
                    </div>
                    <div class="col-md-12">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">وصف</label>
    
                           <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
                        @error('description')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                    </div>
               
                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('admin.user.index') }}" class="btn btn-light waves-effect"
                    style="margin-top:20px">Cancel</a>
            </form>
        </div>
    </div> <!-- end col -->
</div>
@endsection

@section('scripts')
 {{-- Get Long and lat from map --}}
 <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
 <script>
    CKEDITOR.replace('description');
    let map;

       $(document).ready(function() {
            $('#country_id').select2({
                allowClear: true
            });
            $('#city_id').select2({
                allowClear: true
            });
            $('#category_id').select2({
                allowClear: true
            });
            $('#entity_id').select2({
                allowClear: true
            });
        });

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: 33.89362857288377,
                lng: 35.47826286142629
            },
            zoom: 8,
            scrollwheel: true,
        });

        const uluru = {
            lat: 33.89362857288377,
            lng: 35.47826286142629
        };
        let marker = new google.maps.Marker({
            position: uluru,
            map: map,
            draggable: true
        });

        google.maps.event.addListener(marker, 'position_changed',
            function() {
                let lat = marker.position.lat()
                let lng = marker.position.lng()
                $('#lat').val(lat)
                $('#lng').val(lng)
            })

        google.maps.event.addListener(map, 'click',
            function(event) {
                pos = event.latLng
                marker.setPosition(pos)
            })
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>

@endsection
