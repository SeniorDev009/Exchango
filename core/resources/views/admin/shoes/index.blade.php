@extends('admin')

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
                <div class="tile-title ">
                    <a href="{{route('shoes.index')}}" class="btn btn-success btn-md">
                        <i class="fa fa-list"></i> All
                    </a>
                    <a href="{{route('shoes.index', ['filter' => 'physical'] )}}" class="btn btn-success btn-md">
                        <i class="fa fa-list"></i> Physical Only
                    </a>
                    <a href="{{route('shoes.index', ['filter' => 'virtual'] )}}" class="btn btn-success btn-md">
                        <i class="fa fa-list"></i> Virtual Only
                    </a>
                    <a href="{{route('shoes.create')}}" class="btn btn-success btn-md pull-right ">
                        <i class="fa fa-plus"></i> Add Shoes
                    </a>
                </div>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Shoe Name</th>
                                <th>Purchase Price</th>
                                <th>Sell Price</th>
                                <th>Total Items</th>
                                <th style="width: 9%">Discount (%)</th>
                                <th style="width: 14%">Dicount Expiry</th>
                                <th style="width: 7%"> Virtual ??</th>
                                <th style="width: 5%">Status</th>
                                <th>Edit</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($shoes as $k=>$data)
                                <tr>
                                    <td data-label="SL">{{++$k}}</td>
                                    <td data-label="Coin/Country Name">
                                        <img style="width: 35px; height: 25px; margin-right: 10px"
                                             src="{{ asset('assets/images/shoes') }}/{{ $data->image }}" alt="image">
                                        <strong>{{$data->name }}</strong>
                                    </td>
                                    <td data-label="Rate">
                                        {{$data->purchase_price}} {{$data->symbol}} {{$basic->currency}}
                                    </td>
                                    <td data-label="Available Balance">
                                        {{$data->sell_price}} {{$data->symbol}} {{$basic->currency}}
                                    </td>

                                    <td data-label="Buy Charge"><strong>{{$data->total_items}}</strong></td>
                                    <td data-label="Selling Charge"><strong>{{$data->discount}} %</strong></td>
                                    <td data-label="Exchange Charge">{{$data->discount_expiry}}</td>
                                    <td data-label="Status">
                                        @if($data->is_virtual ==0)
                                            <i class="fa fa-times fa-2x" style="color: red "></i>
                                        @else
                                            <i class="fa fa-check fa-2x" style="color: green "></i>
                                        @endif
                                    </td>
                                    <td data-label="Status">
                                        <span
                                            class="badge  badge-pill  badge-{{ $data->status ==0 ? 'danger' : 'success' }}">{{ $data->status == 0 ? 'Deactive' : 'Active' }}</span>
                                    </td>
                                    <td data-label="Action">
                                        <a href="{{route('shoes.edit',$data->id)}}"
                                           class="btn btn-outline-primary btn-sm ">
                                            <i class="fa fa-edit"></i> EDIT
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $shoes->render() !!}





                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
