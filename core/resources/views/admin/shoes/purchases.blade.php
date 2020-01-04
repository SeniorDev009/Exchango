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
                    <a href="{{route('buy.shoe.physical.show')}}" class="btn btn-success btn-md">
                        <i class="fa fa-list"></i> All
                    </a>
                    <a href="{{route('buy.shoe.physical.show', ['filter' => 'pending'] )}}" class="btn btn-success btn-md">
                        <i class="fa fa-list"></i> Pending only
                    </a>
                    <a href="{{route('buy.shoe.physical.show', ['filter' => 'confirmed'] )}}" class="btn btn-success btn-md">
                        <i class="fa fa-list"></i> Confirmed
                    </a>
                </div>
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Shoe Name</th>
                                <th>User</th>
                                <th>Transcation ID</th>
                                <th>Total Amount</th>
                                <th>Discount Availed</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($shoes_purchases as $k=>$data)
                                <tr>
                                    <td data-label="SL">{{++$k}}</td>
                                    <td data-label="Shoe Name">
                                        <img style="width: 35px; height: 25px; margin-right: 10px"
                                             src="{{ asset('assets/images/shoes') }}/{{ $data->shoe->image }}" alt="image">
                                        <strong>{{$data->shoe->name }}</strong>
                                    </td>
                                    <td data-label="User Name">
                                        <a href="{{ route('user.single', $data->user->id) }}">{{$data->user->username}}</a>
                                    </td>
                                    <td data-label="Transcation ID">
                                        @isset($data->trx_id)
                                            {{$data->trx->trx}}
                                        @endisset
                                    </td>

                                    <td data-label="Total Amount"><strong>{{$data->total_amount}} {{$basic->currency}}</strong></td>
                                    <td data-label="Discount Availed"><strong>{{$data->discount}} {{$basic->currency}}</strong></td>
                                    <td data-label="Status">
                                        {{ ucfirst($data->status) }}
                                    </td>
                                    <td data-label="Action">
                                        @if($data->status == 'pending')
                                            <form id="physical_confirm{{$data->id}}" method="POST" action="{{route('buy.shoe.physical.confirm', $data->id )}}" onsubmit="physical_confirm('physical_confirm{{$data->id}}')">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-primary btn-sm" style="float:left;margin-left:1rem;">Confirm Purchase</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {!! $shoes_purchases->render() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

<script type="text/javascript">

    function physical_confirm(id){
        event.preventDefault();
        Swal.fire({
          title: 'Confirm purchase',
          text: "Are you sure to confirm this purchase?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, confirm!'
        }).then((result) => {
          if (result.value) {
            document.getElementById(id).submit();
          }
        })
    }

</script>

@endsection
