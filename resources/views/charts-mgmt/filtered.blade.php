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
        <center>
           
            <div> {!! $chart->render() !!}</div>
            
        </center>
  
      
    </body>
</html>
@endsection