@extends('master.index')

@section('content')
<div class="col-sm-12">
    <div class="row">
        <label for="">
            <ul>
                <h1>
                    Welcome {{  Auth::user()->name }}
                    <h3>
                    </h3>
                </h1>
                <h6>Your Position : {{$user_status->position}}</h6>
            </ul>
        </label>
    </div>
</div>
@endsection
