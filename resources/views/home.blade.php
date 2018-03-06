@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <router-view></router-view>
        </div>
    </div>
</div>
@endsection


<template id="home" >
    <div class="heading">
        <div class="panel panel-primary">
             <div class="panel-heading">@{{title}}
                <span class="pull-right"  v-on:click="change" style="cursor:pointer" title="change Title">Change Title</span>
             </div>

             <div class="panel-body">@{{content}}
                 <input type="text" v-model="text" ><button class="btn btn-default " v-on:click="display">Hit</button>
                 <p>@{{msg}}</p>
                 <span v-if="addMsg"> remove</span>

                 <div class="pull-right" >
                    <button class="btn btn-info"  v-on:click="displaymsg=!displaymsg" title="Display message">Display</button><br>
                    <p class="pull-right" v-if="displaymsg"  v-on:click="say" style="cursor:pointer" title="Show message">@{{hi}}</p>
                 </div>
            </div>
        </div>
    </div>
</template>

<template id="aboutPage">
    <div  class="heading">
        <div class="panel panel-primary">
            <div class="panel-heading">@{{title}}</div>
                <div class="panel-body">@{{content}}
                   <textarea class="form-control" v-model="textarea" id="exampleFormControlTextarea1" rows="3" v-on:keyup.enter="show_box"  placeholder="Write Somthing and Hit Enter to submit"></textarea>
                <div>
                   <p>@{{show_text}}</p>
                      <button class="btn btn-info" v-on:click="hide_text"  title="Hide Text">@{{button_title}}</button>
                  </div>
              </div>
       </div>
    </div>
</template>

<template id="user">
    <div  class="heading">
        <div class="panel panel-primary">
             <div class="panel-heading">@{{title}} </div>
             <div class="panel-body">@{{content}}</div>
        </div>
    </div>
</template>

<template id="loginUser">
    <div class="heading">
        <div class="panel">
             <div class="panel-body">
                <section id="login_section" v-if="logins">
                    <form class="form-horizontal" role="form" method="POST" action="/login">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                               <span >
                               <h2>@{{loginTitle}}</h2>
                               </span>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group has-danger">
                                    <label class="sr-only" for="email">@{{emailName}}</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-addon" ><i class="fa fa-at"></i></div>
                                        <input type="text" name="email" v-model="login.email" class="form-control" id="email" placeholder="you@example.com" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="sr-only" for="password">@{{emailPassword}}</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                        <input type="password" name="password" v-model="login.password" class="form-control" id="password" placeholder="Password" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-control-feedback">
                                    <span class="text-danger align-middle">
                                    <!-- Put password error message here -->    
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6" style="padding-top: .35rem">
                                <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                                    <label class="form-check-label">
                                        <input class="form-check-input" name="remember"
                                            type="checkbox" >
                                        <span style="padding-bottom: .15rem">Remember me</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 1rem">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success" v-on:click="loggedInUser"><i class="fa fa-sign-in"></i> Login</button>
                                <a class="btn btn-link"  v-on:click="showForgot">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </section>

                <section id="forgot_section" v-else="forgot">
                    <form class="form-horizontal" role="form" method="POST" action="/login">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                <span>
                                  <h2> @{{forgotTitle}} </h2>
                               </span>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="form-group has-danger">
                                        <label class="sr-only" for="forgotemail">@{{forgotEmailName}}</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-addon" ><i class="fa fa-at"></i></div>
                                            <input type="email" name="email" v-model="forgotEmail.email" class="form-control" id="forgotemail" placeholder="you@example.com">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 1rem">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-success" v-on:click="forgotUser"><i class="fa fa-sign-in"></i>@{{forgotBtnName}}</button>
                                    <a class="btn btn-link" v-on:click="showlogin">Login</a>
                                </div>
                            </div>
                    </form>
                </section>
             </div>
        </div>
    </div>
</template>