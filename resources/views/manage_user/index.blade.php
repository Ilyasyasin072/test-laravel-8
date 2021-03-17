@extends('master.index')

@section('content')
<div class="col-sm-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    <Strong>Users List</Strong>
                </h3>
                <p>all data users with user detail</p>
            </div>

            <div class="card-body">
                <table class="table table-bordered-table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ ucfirst($item->user->name) }}</td>
                            <td>{{ $item->user->email }}</td>
                            <td>{{ $item->position }}</td>
                            <td>
                                @if($item->status == 'active')
                                <span class="badge badge-success">{{$item->status}}</span>
                                @else
                                <span class="badge badge-danger">{{$item->status}}</span>
                            @endif</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
