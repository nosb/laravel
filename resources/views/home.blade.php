@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">


                    <form {{--method="POST" action="/testCsrf"--}}>
                        <input type="button" id="dj" value="Test"/>
                    </form>


                    <script>


                        $(function () {



                           $('#dj').click(function () {
                               $.ajax({
                                   url: '/testCsrf',
                                   type: 'post',
                                   data: {id:1},
                                   async: true, //异步
                                   cache: false,
                                   dataType: 'json',
                                   success: function(res){
                                      console.log(res);
                                   }
                               });
                           })
                        })



                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
