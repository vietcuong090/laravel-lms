@extends('master')
@section('title', 'Login')
@section('content')
<style>
    .divider:after,
    .divider:before {
        content: "";
        flex: 1;
        height: 1px;
        background: #eee;
    }
    .h-custom {
        height: calc(100% - 73px);
    }
    @media (max-width: 450px) {
        .h-custom {
            height: 100%;
        }
    }
</style>
<div>
    <p style="color: red; font-size: 30px; font-weight: 700">{{__('login.title')}}</p>
    <a style="color: blue" href="{{route('register')}}">{{__('login.register_member')}}</a>
</div>
@endsection
