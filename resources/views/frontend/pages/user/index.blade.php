@extends('layouts.app')
@section('content')
    <section class="user-profile">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mt-4 mb-2"><h1>Привет, {{Auth::guard('user')->user()->full_name}}</h1></div>
                <div class="col-sm-12 mb-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Profile ID-{{Auth::guard('user')->user()->id}} {{Auth::guard('user')->user()->status}}</h4>
                            <div class="form-group">
                                <img style="width: 180px!important; height: 180px!important; margin: auto" src="{{asset('frontend')}}/images/avatars/avatar2.jpg" class="img-sm rounded-circle border">
                            </div>
                            <form action="#" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>ФИО</label>
                                        <input type="text" class="form-control" name="full_name" value="{{Auth::guard('user')->user()->full_name}}">
                                    </div> <!-- form-group end.// -->
                                    <div class="col form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="{{Auth::guard('user')->user()->username}}">
                                    </div> <!-- form-group end.// -->
                                </div> <!-- form-row.// -->
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Телефон</label>
                                        <input type="text" class="form-control" name="phone" value="{{Auth::guard('user')->user()->phone}}" placeholder="Номер телефона">
                                    </div> <!-- form-group end.// -->
                                    <div class="col form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{Auth::guard('user')->user()->email}}">
                                    </div> <!-- form-group end.// -->
                                </div> <!-- form-row.// -->
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Адрес</label>
                                        <input type="text" class="form-control" name="address" value="{{Auth::guard('user')->user()->address}}" placeholder="Адрес">
                                    </div> <!-- form-group end.// -->
                                </div> <!-- form-row.// -->
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label>Описание</label>
                                        <textarea class="form-control" name="description" id="" rows="10">{{Auth::guard('user')->user()->description}}</textarea>
                                    </div> <!-- form-group end.// -->
                                </div> <!-- form-row.// -->
                            </form>
                            <form action="{{route('user.reset-email')}}" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{Auth::guard('user')->user()->email}}">
                                <button class="btn btn-primary btn-block" type="submit">Восстановить пароль</button>
                            </form>
                        </div> <!-- card-body.// -->
                    </div>
                </div>
                <!--/col-3-->
                <!--/row-->
            </div>
        </div>
    </section>
@endsection
@section('scripts')

@endsection
