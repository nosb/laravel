@extends('layouts.app')

@section('title', '测试标题')

@section('sidebar')
    @parent

    <p>这将追加到主布局的侧边栏。</p>
@endsection

@section('content')
    <p>Hello, @{{ name }}.</p>
    <form action="/user/code" method="post">
        @csrf
        <div class="form-group code">
            <label>验证码</label>
            <input class="tt-text" name="captcha">
            <img src="{{captcha_src('flat')}}" id="captcha">
        </div>
        <input type="submit" >
    </form>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>

        $(function () {
            $('#captcha').click(function(){

                $('#captcha').attr('src','/captcha/flat?'+Math.random());
            });
        })

    </script>
@endsection







@prepend('scripts')
此处将会排在第一
@endprepend