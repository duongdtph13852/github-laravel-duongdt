@extends('template.layout')
@section('title', $_title)
@section('content')
    <!-- Main content -->
    <section class="content appTuyenSinh">
        <link rel="stylesheet" href="{{ asset('default/bower_components/select2/dist/css/select2.min.css')}} ">
        <style>
            .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
                padding: 3px 0px;
                height: 30px;
            }
            .select2-container {
                margin-top: -5px;
            }

            option {
                white-space: nowrap;
            }

            .select2-container--default .select2-selection--single {
                background-color: #fff;
                border: 1px solid #aaa;
                border-radius: 0px;
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                color: #216992;
            }
            .select2-container--default .select2-selection--multiple{
                margin-top:10px;
                border-radius: 0;
            }
            .select2-container--default .select2-results__group{
                background-color: #eeeeee;
            }
        </style>

        <?php //Hiển thị thông báo thành công?>
        @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        <?php //Hiển thị thông báo lỗi?>
        @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
    @endif

    <!-- Phần nội dung riêng của action  -->
        <form class="form-horizontal " action="{{route('route_Backend_Sanpham_Update',['prod_id'=>request()->route('prod_id')])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- <div class="form-group">
                            <label for="ten_de_thi" class="col-md-3 col-sm-4 control-label">Tên người dùng <span class="text-danger">(*)</span></label>

                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="name" id="name" class="form-control" value="@isset($request['name']){{ $request['name'] }}@endisset">
                                <span id="mes_sdt"></span>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label for="name" class="col-md-3 col-sm-4 control-label">Tên sản phẩm <span class="text-danger">(*)</span></label>
                            <div class="col-md-9 col-sm-8">
                                <input type="name" name="name" id="name" class="form-control" value="{{$objItem->name}}">
                                <span id="mes_sdt"></span>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="price" class="col-md-3 col-sm-4 control-label">Giá <span class="text-danger">(*)</span></label>
                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="price" id="price" class="form-control" value="{{$objItem->price}}">
                                <span id="mes_sdt"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mo_ta" class="col-md-3 col-sm-4 control-label">Mô tả <span class="text-danger">(*)</span></label>
                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="mo_ta" id="mo_ta" class="form-control" value="{{$objItem->mo_ta}}">
                                <span id="mes_sdt"></span>
                            </div>
                        </div>    
                        <div class="form-group">
                            <label for="">Danh mục</label>  
                            <select name="id_danhmuc" id="">
                                @foreach($listdm as $cate)
                                <option value="{{$cate->cate_id}}">{{$cate->name_cate}}</option>
                                @endforeach
                            </select>
                            </div>
                            {{-- hinh   --}}
                            <div class="form-group">
                                <label class="col-md-3 col-sm-4 control-label">Ảnh CMND/CCCD <span class="text-danger">(*)</span></label>
                                <div class="col-md-9 col-sm-8">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <img id="mat_truoc_preview"
                                                 src="{{ $objItem->hinh?''.Storage::url($objItem->hinh):'http://placehold.it/100x100' }}"
                                                 alt="your image"
                                                 style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-responsive"/>
                                            <label for="cmt_truoc">Mặt trước</label><br/>
                                        </div>
    
                                    </div>
                                </div>
                            </div>     
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary"> Save</button>
            </div>
            <!-- /.box-footer -->
        </form>

    </section>
@endsection
@section('script')
    <script src="{{ asset('default/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('default/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
@endsection

