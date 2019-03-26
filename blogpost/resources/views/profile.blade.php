<style>.rounded-circle{width:100px;height: 100px;}</style>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong class="justify-content-center">{{ $message }}</strong>

                </div>

            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row justify-content-center">

            <div class="profile-header-container">
                <div class="profile-header-img">
                    <img class="rounded-circle" src="/storage/avatars/{{ $user->avatar }}" />
                    <!-- badge -->
                    <div class="rank-label-container">
                        <span class="label label-default rank-label" style="margin-top:5px; ">{{$user->name}}</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row justify-content-center">
            <form action="/profile" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted"><h6>Please upload a valid image file. Size of image should not be more than 2MB.</h6></small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection