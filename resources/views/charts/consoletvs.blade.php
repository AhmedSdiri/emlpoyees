<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Charts</title>
        
        <h1>test1</h1>
       {!! ConsoleTVs\Charts\Facades\Charts::assets() !!}
    </head>
    <body>
        <center>
           <h1>test2</h1>
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