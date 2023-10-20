@extends('layouts.provider.app')
@section('css')
<style>
    #img-preview {
      display: none; 
      width: 155px;   
      border: 2px dashed #333;  
      margin-bottom: 20px;
    }
    #img-preview img {  
      width: 100%;
      height: auto; 
      display: block;   
    }
  </style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <form class="card-body" id="myForm" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                <h4 class="card-title">حساب الشخصي</h4>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="example-text-input" class="col-sm-2 col-form-label">الاسم</label>
                        <input class="form-control" type="text" name="name" placeholder="Mohamed Magdy"
                            id="example-text-input" value="{{ old('name',$data->name) }}" required>
                        @error('name')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="example-text-input" class="col-sm-2 col-form-label">رقم التسجيل</label>
                        <input class="form-control" type="text" name="registeration_num" placeholder="XXXXXX"
                            id="example-text-input" value="{{ old('registeration_num',$data->registeration_num) }}" required>
                        @error('registeration_num')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="example-text-input" class="col-sm-2 col-form-label">البريد الالكتروني</label>
    
                            <input class="form-control" type="email" name="email" placeholder="Ex: example@example.com"
                                id="example-text-input" value="{{ old('email',$data->email) }}" required>
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
    
    
                        <div class="col-md-6">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">الهاتف</label>
    
                            <input class="form-control" name="phone" type="tel" placeholder="Ex: +201066018340"
                                id="example-tel-input" value="{{ old('phone',$data->phone) }}" required>
                            @error('phone')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                

                        <div class="col-md-6">
                            <label for="example-tel-input" class="col-sm-2 col-form-label">موعيد البدء</label>
        
                                <input class="form-control" name="date_open" type="time" placeholder="Ex: +201066018340"
                                    id="example-tel-input" value="{{ old('date_open',$data->date_open) }}" required>
                                @error('date_open')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="example-tel-input" class="col-sm-2 col-form-label">موعيد الغلق</label>
        
                                <input class="form-control" name="date_close" type="time" placeholder="Ex: +201066018340"
                                    id="example-tel-input" value="{{ old('date_close',$data->date_close) }}" required>
                                @error('date_close')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                         </div>
                    
                    <!-- end row -->

                        <div class="col-md-6">
                        <label for="example-password-input" class=" col-form-label">المدينة</label>
                            <select name="country_id" class="country_id form-control" id="country_id">
                                @foreach ($country as $item)
                                    <option value="{{$item->id}}" {{$item->id == $data->country_id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="example-password-input" class=" col-form-label">المنطقة</label>
                                <select name="city_id" class="city_id form-control" id="city_id">
                                    @foreach ($city as $item)
                                        <option value="{{$item->id}}" {{$item->id == $data->city_id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                        </div>


                        
                        <div class="col-md-6">
                            <label for="example-password-input" class=" col-form-label">الجهة</label>
                                <select name="entity_id" class="entity_id form-control" id="entity_id">
                                    @foreach ($entity as $item)
                                        <option value="{{$item->id}}" {{$item->id == $data->entity_id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                        
                        <div class="col-md-6">
                            <label for="example-password-input" class=" col-form-label">التصنيف</label>
                                <select name="category_id" class="category_id form-control" id="category_id">
                                    @foreach ($category as $item)
                                        <option value="{{$item->id}}" {{$item->id == $data->category_id ? 'selected' : ''}}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                        </div>
    

                        
                        <div class="col-md-6">
                            <label for="example-tel-input" class="col-sm-2 col-form-label">موقع الكتروني</label>
        
                                <input class="form-control" name="url" type="url" placeholder=""
                                    id="example-tel-input" value="{{ old('url',$data->url) }}" required>
                                @error('url')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                        </div>

                        
                        <div class="col-md-6">
                            <label for="example-tel-input" class="col-sm-2 col-form-label">تواصل اجتماعي</label>
        
                                <input class="form-control" name="media" type="url" placeholder=""
                                    id="example-tel-input" value="{{ old('media',$data->url) }}" required>
                                @error('media')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                        </div>
                    


                    <div class="col-md-12">
                    <label for="example-tel-input" class="col-sm-2 col-form-label">الشعار</label>

                        <input class="form-control" name="image" id="choose-file" type="file" 
                            id="example-tel-input" value="{{ old('image') }}" required>
                        @error('image')
                            <span class="text-danger mt-2">{{ $message }}</span>
                        @enderror
                        <img src="{{asset('storage/user/'.auth()->user()->image)}}" id="choose-file" class="img-fluid w-50" alt="">
                        <div class="img-preview">

                        </div>
                    </div>



                    <div class="col-md-12">
                        <input type="hidden" class="form-control" placeholder="lat" value="{{$data->lat}}" name="lat" id="lat">
                        <input type="hidden" class="form-control" placeholder="long" value="{{$data->lng}}" name="lng"
                            id="lng">
                        <label for="">اختر الموقع</label>
                        <div id="map" style="height:300px; width: 500px;" class="my-3"></div>
                    </div>
                    <div class="col-md-12">
                        <label for="example-tel-input" class="col-sm-2 col-form-label">وصف</label>
    
                           <textarea name="description" class="form-control" id="description" cols="30" rows="10">{!! $data->description !!}</textarea>
                        @error('description')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                    </div>
               
                </div>
                <button type="submit" id="submit" class="btn btn-info waves-effect waves-light"
                    style="margin-top:20px">Save</button>
                <a href="{{ route('dashboard') }}" class="btn btn-light waves-effect"
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
<script>
    const chooseFile = document.getElementById("choose-file");
    const imgPreview = document.getElementById("img-preview");
    chooseFile.addEventListener("change", function () {
      getImgData();
    });

    function getImgData() {
      const files = chooseFile.files[0];
      if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
          imgPreview.style.display = "block";
          imgPreview.innerHTML = '<img src="' + this.result + '" />';
        });    
      }
    }
  </script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap" type="text/javascript"></script>

@endsection

