@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
           <login-v></login-v> 
    </div>
</div>
@endsection

  <template id="loginUser">
  <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" >
                    <span v-if="logins">
                       <h4> @{{loginTitle}}</h4>
                    </span>
                    <span v-else>
                      <h4>  @{{forgotTitle}}</h4>
                    </span>
                </div>

                <div class="panel-body">
                    <section id="login_section" v-if="logins">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">@{{emailName}}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control"  v-model="login.email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
                
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">@{{emailPassword}}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" v-model="login.password" name="password"  placeholder="Password" required>
                    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary"  v-on:click="loggedInUser">
                                        Login
                                    </button>

                                    <a class="btn btn-link" v-on:click="showForgot">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </section>

                    <section id="forgot_section" v-else="forgot">
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">@{{forgotEmailName}}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control"  v-model="forgotEmail.email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary" v-on:click="forgotUser">
                                        @{{forgotBtnName}}
                                    </button>
                                    <a class="btn btn-link" v-on:click="showlogin">Login</a>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
  </template>  