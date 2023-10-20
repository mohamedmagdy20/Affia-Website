@extends('layouts.admin.app')
@section('content')
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">الموسسات</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">لوحه التحكم</a></li>
                    </li>
                    <li class="breadcrumb-item active">الموسسات</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">الموسسات</h4>
                <div class="text-center mb-3">
                    <a href="{{route('admin.provider.create')}}" class="btn btn-primary">اضافة الموسسات <i
                            class="fa fa-plus"></i>
                    </a>
                    <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#firstmodal">تحميل ملف اكسيل</button>
                    <a href="{{asset('storage/Service Providers.xlsx')}}"  target="__blank" class="btn btn-info" >Download Example</a>   
                  
                </div>

                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                           <th>الصوره </th>
                           <th>الاسم </th>
                           <th>رقم التجسيل</th>
                           <th>البريد الالكتروني</th>
                           <th>الهاتف</th>
                           <th>مواعيد العمل</th>
                           <th>المدينة</th>
                           <th>المنطقه</th>
                           <th>التصنيف</th>
                           <th>نوع الجهة</th>
                           <th>الموقع الالكتروني</th>
                           <th>وسائل التواصل</th>
                           <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($data as $item)
                        <tr>
                            <td> <img src="{{asset('storage/user/'.$item->image) }}" class="img-fluid" width="100px" height="100px" alt=""></td> 
                            <td>{{$item->name}}</td>
                            <td>{{$item->registeration_num}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->date_open}} - {{$item->date_close}}</td>
                            <td>{{optional($item->country)->name}}</td>
                            <td>{{optional($item->city)->name}}</td>
                            <td>{{optional($item->category)->name}}</td>
                            <td>{{optional($item->entity)->name}}</td>

                            <td>{{$item->url}}</td>
                            <td>{{$item->media}}</td>
                             <td>
                                <a href="{{route('admin.provider.edit',$item->id)}}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.provider.delete',$item->id)}}" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
   <!-- First modal dialog -->
   <div class="modal fade" id="firstmodal" aria-hidden="true" aria-labelledby="..." tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تحميل اكسيل</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.country.upload-excel')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group mb-3">
                            <label for="">File</label>
                            <input type="file" name="file" class="form-control">

                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

   
@endsection
@section('scripts')
<script>
    $('#datatable-buttons').DataTable();
</script>
@endsection