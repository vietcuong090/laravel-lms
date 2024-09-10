@extends('master')
@section('title', 'Post Homepage')
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
    <p style="color: red; font-size: 30px; font-weight: 700">{{__('post.title')}}</p>
    @foreach ($data as $post)
        <div class="card mx-3 my-4" style=" margin-left: 20px">
            <div class="row g-0">
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{{ Str::limit($post->content, 80, ' ...') }}</p>
                    </div>
                </div>
            </div>
            <hr style="border: 1px solid red; width: 300px;float: left"><br>
        </div>


    @endforeach
</div>
@endsection
