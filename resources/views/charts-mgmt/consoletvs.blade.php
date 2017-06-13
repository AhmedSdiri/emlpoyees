@extends('charts-mgmt.base')
@section('action-content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Charts</title>
        
    
       {!! ConsoleTVs\Charts\Facades\Charts::assets() !!}
    </head>
    <body>
      <!--  <center>
           
            <div> {!! $chart->render() !!}</div>
            <div> {!! $chart1->render() !!}</div>
            <div> {!! $chart7->render() !!}</div>
            <div> {!! $chart8->render() !!}</div>
            <div> {!! $chart6->render() !!}</div>
            <div> {!! $chart2->render() !!}</div>
            <div> {!! $chart5->render() !!}</div>
            <div> {!! $chart3->render() !!}</div>
            <div> {!! $chart4->render() !!}</div>
        </center>-->
    <div class="container">
    <div class="well well-sm">
        <strong>Display</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Grid</a>
        </div>
    </div>
    <div id="products" class="row list-group">
        <div class="item  col-xs-4 col-lg-6">
            <div class="thumbnail">
              
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        Ceromonie</h4>
                     {!! $chart->render() !!}
                </div>
            </div>
        </div>
        <div class="item  col-xs-4 col-lg-6">
            <div class="thumbnail">
              
                <div class="caption ">
                    <h4 class="group inner list-group-item-heading">
                        Cdsdsd</h4>
                    {!! $chart1->render() !!}
                </div>
            </div>
        </div>
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
              
                <div class="caption ">
                    <h4 class="group inner list-group-item-heading">
                        PIE</h4>
                    {!! $chart2->render() !!}
                </div>
            </div>
        </div>
        </div>
</div>
       <center>
           
            <div> {!! $chart->render() !!}</div>
            <div> {!! $chart1->render() !!}</div>
            <div> {!! $chart7->render() !!}</div>
            <div> {!! $chart8->render() !!}</div>
            <div> {!! $chart6->render() !!}</div>
            <div> {!! $chart2->render() !!}</div>
            <div> {!! $chart5->render() !!}</div>
            <div> {!! $chart3->render() !!}</div>
            <div> {!! $chart4->render() !!}</div>
        </center>
    </body>
</html>
@endsection