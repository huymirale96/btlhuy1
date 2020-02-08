@extends('layout.authentication')
@section('title', 'Login')


@section('content')

<div class="vertical-align-wrap">
	<div class="vertical-align-middle auth-main">
		<div class="auth-box">
            <div class="top">
                <img src="{{url('/')}}/assets/img/logo-white.svg" alt="Lucid">
            </div>
			<div class="card">
                <div class="header">
                    <p class="lead">Login to your account</p>
                </div>
                <div class="body">
                      @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach($errors->all() as $error)
                                    <li class="list-group-item">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-auth-small" action="{{route('authentication.postLogin')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label for="signin-user" class="control-label sr-only">Tên Người Dùng</label>
                            <input type="text" class="form-control" id="signin-user" name="signin-user" value="" placeholder="Tên Người Dùng">
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Mật Khẩu</label>
                            <input type="password" class="form-control" id="signin-password" name="signin-password" value="123456" placeholder="Password">
                        </div>
                         @if(session('errorLogin'))
                        
                            <p class="text-danger text-center"> {{session('errorLogin')}} </p>
                        
                         @endif
                        <div class="form-group clearfix">
                            <label class="fancy-checkbox element-left">
                                <input type="checkbox">
                                <span>Remember me</span>
                            </label>								
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>

                        <div class="bottom">
                            <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="{{route('authentication.forgot-password')}}">Forgot password?</a></span>
                            <span>Don't have an account? <a href="{{route('authentication.register')}}">Register</a></span>
                        </div>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>

@stop