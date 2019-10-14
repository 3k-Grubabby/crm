<!DOCTYPE html>
<html lang="en">
<head>

  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/public.css') }}">
  <script src=" {{ URL::asset('js/boot.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
</head>
<style>
    .card {
        margin: 8px;
        border-radius: 2px;
        background-color: #fff;
        box-shadow:0 1px 2px 0 rgba(0,0,0,.05);
    }
    .card-header {
        position: relative;
        height: 42px;
        line-height: 42px;
        padding: 0 15px;
        border-bottom: 1px solid #f6f6f6;
        color: #333;
        border-radius: 2px 2px 0 0;
        font-size: 14px;
    }
    .card-body {
        position: relative;
        padding: 10px 15px;
        line-height: 24px;
        height: 265px;
    }
    .card-carousel {
        margin: 5px 11px;
        height: 230px;
        position: relative;
        left: 0;
        top: 0;
        background-color: #f8f8f8;
    }

</style>
<body>
<div>
    <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <span>财务信息</span>
                </div>
                <div class="card-body">
                    <div class="card-row">
                        <div class="mini-col-sm-4" >
                            <div class="card-carousel">
                                {!! $chart["chart"]->container() !!}
                                {!! $chart["chart"]->script() !!}
                            </div>

                        </div>
                        <div class="mini-col-sm-8 ">
                            <div class="card-carousel">
                                {!! $chart["bar"]->container() !!}
                                {!! $chart["bar"]->script() !!}
                            </div>

                        </div>
                    </div>

                </div>

            </div>


    </div>

</div>
</body>
</html>
