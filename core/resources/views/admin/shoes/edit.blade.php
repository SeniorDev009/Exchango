@extends('admin')
@section('import-css')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop
@section('body')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-exchange"></i> {{$page_title}}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{url()->current()}}">{{$page_title}}</a></li>
        </ul>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">Edit a Shoe
                    <a href="{{route('shoes.index')}}" class="btn btn-success btn-md pull-right ">
                        <i class="fa fa-eye"></i> All Shoes
                    </a>
                </h3><br>

                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form role="form" method="POST" action="{{route('shoes.update',$shoe)}}"
                                  name="editForm" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                {{method_field('put')}}


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <h5> Shoe Name:</h5>
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg"
                                                   placeholder="Shoe Name" value="{{old('name', $shoe->name)}}"
                                                   name="name">
                                        </div>
                                        @if ($errors->has('name'))
                                            <div class="error">{{ $errors->first('name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <h5> Shoe Description:</h5>
                                        <textarea type="text" class="form-control form-control-lg" placeholder="Shoe Description" name="description">{{old('description', $shoe->description)}}</textarea>
                                        @if ($errors->has('description'))
                                            <div class="error">{{ $errors->first('description') }}</div>
                                        @endif
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <h5>Purchase Price:</h5>
                                        <div class="input-group">
                                            <input placeholder="0.00" type="text" name="purchase_price"  value="{{old('purchase_price', $shoe->purchase_price)}}" class="form-control form-control-lg"
                                                   onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><strong>{{$basic->currency}}</strong></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('purchase_price'))
                                            <div class="error">{{ $errors->first('purchase_price') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h5>Sale Price: </h5>
                                        <div class="input-group">
                                            <input placeholder="0.00" type="text" name="sell_price"  value="{{old('sell_price', $shoe->sell_price)}}" class="form-control form-control-lg"
                                                   onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><strong>{{$basic->currency}}</strong></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('sell_price'))
                                            <div class="error">{{ $errors->first('sell_price') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h5> Total Items </h5>
                                        <div class="input-group">
                                            <input type="text" name="total_items" value="{{old('total_items', $shoe->total_items)}}" class="form-control form-control-lg"
                                                   placeholder="00" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]|(\.)(.*)/g, '')">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><strong>Amount</strong></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('total_items'))
                                            <div class="error">{{ $errors->first('total_items') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h5>Discount Percentage: </h5>
                                        <div class="input-group">
                                            <input placeholder="0.00" type="text" name="discount"  value="{{old('discount', $shoe->discount)}}" class="form-control form-control-lg"
                                                   onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><strong>%</strong></span>
                                            </div>
                                        </div>
                                        @if ($errors->has('discount'))
                                            <div class="error">{{ $errors->first('discount') }}</div>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-6">
                                        <h5>Discount valid till: </h5>
                                        <div class="input-group">
                                            <input type='text' name="discount_expiry" class="form-control" value="{{old('discount_expiry', $shoe->discount_expiry)}}" id='datetimepicker4' />
                                        </div>
                                        @if ($errors->has('discount_expiry'))
                                            <div class="error">{{ $errors->first('discount_expiry') }}</div>
                                        @endif
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <h5>Is Virtual ? </h5>
                                            <input data-toggle="toggle" data-size="large" data-onstyle="success"
                                                   data-on="Yes" data-off="No"
                                                   data-offstyle="danger" data-width="100%" type="checkbox"
                                                   name="is_virtual"
                                                   @if($shoe->is_virtual == 1) checked @endif>
                                        </div>
                                        <div class="form-group ">
                                            <h5>Status:</h5>
                                            <input data-toggle="toggle" data-size="large" data-onstyle="success"
                                                   data-offstyle="danger" data-width="100%" type="checkbox"
                                                   name="status"
                                                   @if($shoe->status) checked @endif>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <h5>Image</h5>
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"
                                                 data-trigger="fileinput">
                                                @if($shoe->image == null)
                                                    <img style="width: 200px"
                                                         src="http://www.placehold.it/32x22/EFEFEF/AAAAAA&amp;text=Image"
                                                         alt="...">
                                                @else
                                                    <img src="{{ asset('assets/images/shoes') }}/{{ $shoe->image }}"
                                                         alt="...">
                                                @endif

                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px"></div>
                                            <div>
                                                <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new bold uppercase"><i
                                                            class="fa fa-file-image-o"></i> Select image</span>
                                                    <span class="fileinput-exists bold uppercase"><i
                                                            class="fa fa-edit"></i> Change</span>
                                                    <input type="file" name="image" accept="image/*">
                                                </span>
                                                <a href="#" class="btn btn-danger fileinput-exists bold uppercase"
                                                   data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                            </div>
                                        </div>
                                        @if ($errors->has('image'))
                                            <div class="error">{{ $errors->first('image') }}</div>
                                        @endif

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-12 ">
                                        <button class="btn btn-primary btn-block btn-lg">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('import-script')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop
@section('script')
    <script src="{{ asset('assets/admin/js/nicEdit-latest.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" />
    <script>
        
        $('#datetimepicker4').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        bkLib.onDomLoaded(function () {
            new nicEditor({fullPanel: true}).panelInstance('area1');
        });
    </script>
@stop
