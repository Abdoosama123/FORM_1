@extends('layouts/index')

@section('title')
    create user
@endsection

@section('content')

    <div class="container">
            <div class="card" style="margin-top: 4%">
                <div class="card-header bg-secondary dark bgsize-darken-4 white card-header">
                    <form id="file-upload-form" class="was-validated" action="{{route('loginCreate')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" id="file-input" onchange="loadPreview(this)" name="image"   multiple/>
                            <span class="text-warning"  >{{ $errors->first('image') }}</span>
                        </div>
                        <div id="thumb-output"></div>


                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" id="inputPassword3" placeholder="name">
                                <span class="text-warning">{{ $errors->first('name') }}</span>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                <span class="text-warning">{{ $errors->first('email') }}</span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                <span class="text-warning">{{ $errors->first('password') }}</span>
                            </div>
                        </div>

                        <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" value="yes" type="checkbox" name="terms" required> I agree on blabla.
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Check this checkbox to continue.</div>
                            </label>
                        <br>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection






