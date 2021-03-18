@extends('master.index') @section('content')
<div class="col-sm-12 col-md-12 col-xs-12">
    <div class="row">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem explicabo ipsam perspiciatis dolorum fugiat odit distinctio molestiae debitis sint repudiandae commodi magnam consectetur dolor porro, necessitatibus, quibusdam natus quos quas!</p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
        </div>
        <div class="jumbotron">
            <h1> Welcome {{ Auth::user()->name }}</h1>
            <p>Your Position : {{$user_status->position}}</p>
            <p>Status : <span class="badge bg-success" style="color: white">{{ $user_status->status }}</span></p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dicta provident quo odio nemo voluptatem ducimus laborum. Porro culpa ducimus velit commodi, quaerat iure vitae incidunt quisquam! Officiis, assumenda accusamus.</p>
        </div>
    </div>
</div>
@endsection