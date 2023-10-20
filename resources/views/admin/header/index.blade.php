@extends('layouts.admin.app')
@section('content')
   <!-- start page title -->
   <div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">بداية الصفحة</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">لوحه التحكم</a></li>
                    </li>
                    <li class="breadcrumb-item active">بداية الصفحة</li>
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
                <h4 class="card-title">لافتات</h4>
                <div class="text-center mb-3">
                    <a href="{{route('admin.header.create')}}" class="btn btn-primary">اضافة لافتات <i
                            class="fa fa-plus"></i>
                    </a>
                </div>

                <table id="datatable-buttons" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                           <th>الصوره</th>
                           <th>العنوان</th>
                           <th>الوصف</th>
                           <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($data as $item)
                        <tr>
                            <td> <img src="{{asset('storage/headers/'.$item->logo) }}" class="img-fluid" width="100px" height="100px" alt=""></td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                             <td>
                                <a href="{{route('admin.header.edit',$item->id)}}" class="btn btn-primary"><i class="fa fa-pen"></i></a>
                                <a href="{{route('admin.header.delete',$item->id)}}" class="btn btn-danger delete-confirm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>

   
@endsection
@section('scripts')
<script>
    $('#datatable-buttons').DataTable();
</script>
@endsection