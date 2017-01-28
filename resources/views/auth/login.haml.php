@extends('layouts.app')

@section('title')

Login

@stop

@section('content')

.container.text-center
  .row
    .col-md-8.col-md-offset-2
      .panel.panel-default
        .panel-heading
          Login
        .panel-body
          %form.form-horizontal{role: "form", method: "POST", action: route('login.post')}
            {{ csrf_field() }}
            //TODO: $errors->has('email') ? ' has-error' : '' Missing
            .form-group
              %label.col-md-4.control-label{for: "email"} E-Mail Address
              .col-md-6
                %input#email.form-control{type: "email", name: "email", value: old('email'), required: "required", autofocus: "autofocus"}
                - if ($errors->has('email'))
                  %span.help-block
                    %strong {{ $errors->first('email') }}

            .form-group
              %label.col-md-4.control-label{for: "password"} Password
              .col-md-6
                %input#password.form-control{type: "password", name: "password", required: "required"}
                - if ($errors->has('password'))
                  %span.help-block
                    %strong {{ $errors->first('password') }}

            .form-group.text-left
              .col-md-6.col-md-offset-4
                .checkbox
                  %label
                    %input{type:"checkbox", name: "remember"} Remember Me

            .form-group.text-left
              .col-md-8.col-md-offset-4
                %button.btn.btn-primary{type: "submit"} Login
                %a.btn.btn-link{href: route('password.reset.get')} Forgot Your Password?

@stop
