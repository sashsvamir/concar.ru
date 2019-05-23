@extends('admin.layout')


@section('content')

<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">

            <h1>Create User</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <!-- Create Post Form -->

            <form action="{{ route('admin-user-store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name:</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password:</label>
                    <div class="col-sm-6">
                        <input class="form-control" type="password" id="password" name="password">
                        @if ($errors->has('password'))
                            <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


        </div>

    </div>

</div>



@endsection
