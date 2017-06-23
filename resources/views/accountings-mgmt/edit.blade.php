@extends('devis-mgmt.base')



@section('action-content')
<script type="text/javascript">
        function addLabel(){
           var div = document.getElementById('div_quotes');
             div.innerHTML += "\n<br />";
            /*div.innerHTML += " <label>Label</label>"+"<input type=text>";
            div.innerHTML += "<label>Prix</label>"+"<input type=text>";
            div.innerHTML += "<text name='price'/>";
            div.innerHTML += "\n<br />";*/
            div.innerHTML += 
                "<div class=+"+"row"+">"
                +"<div class="+"col-xs-12 table-responsive"+">"
                +"<table class="+"table table-striped"+">"
                +"<thead>"
                +"<tr id=abcd>"
                +"<th>Service</th>"
                +"<th>Price</th>"
                +"</tr>"
                +"</thead>"
                +"<tbody>"
                +"<tr id=abc>"
                +"<td>"
                +"<label>Service</label>"
                +"<input type=text id=service name=service>"
                +"</td>"
                +"<td>"
                +"<label>Price</label>"
                +"<input type=text id=price name=price>"
                +"</td>"
                +"<td>"
                +"<input type=button class=btn btn-danger  onClick=deleteButton() value=cancel>"
                +"</tr>"
                +"</tbody>"
                +"</table>"
                +"</div>"
                +"</div>";
            
        /*    document.getElementById("Button").innerHTML='<form action="add.php" method="post" onSubmit="track(\'P1\');">'+
'<input type="hidden" name="add" value="true"> '+
'<input type="hidden" name="item" value="P1"> '+
'<input type="hidden" name="pID" value="3"> '+
'<input type="hidden" name="qty" value="1"> '+      
'<input name="image" type="image" onMouseOver="this.src=\'/img/shop/r_addbasket.png\'" '+
'onMouseOut="this.src=\'/img/shop/addbasket.png\'" '+
'value="Add to Basket" src="/img/shop/addbasket.png" alt="AddtoBasket"></form>';*/
            
        }
function deleteButton()   
{
     $('#abc').remove();
     $('#abcd').remove();
}
function loading()   
{
   /* var div = document.getElementById('load'); 
    div.innerHTML ="<span>Loading</span>"
+"<span class=l-1></span>"
+"<span class=l-2></span>"
+"<span class=l-3></span>"
+"<span class=l-4></span>"
+"<span class=l-5></span>"
+"<span class=l-6></span>";
    setTimeout(function () {
  //do something once
}, 1000);*/
    var div = document.getElementById('load'); 
   /* div.innerHTML="<i class=fa fa-spinner fa-spin fa-3x fa-fw>"
    +"</i>"
    +"<span class=sr-only>"
    +"Loading..."
    +"</span>";*/
    /*div.replaceWith("<i class=fa fa-spinner fa-spin fa-3x fa-fw>"+"</i>"
                    "<span class=sr-only>"+"Loading..."+"</span>");*/
    div.alert("<span>Loading</span>"
  +"<span class=l-1></span>"
  +"<span class=l-2></span>"
  +"<span class=l-3></span>"
  +"<span class=l-4></span>"
  +"<span class=l-5></span>"
  +"<span class=l-6></span>");
}

    </script>

<div class="row">
     <div class="col-md-6 col-md-offset-3">  
        <div class="panel panel-default" style="width: 100%; margin: auto;">
            <div class="panel-heading">
            
               <span>
                  Article by me
                   <small>
                       <a href="{{ route('devis-management.edit', ['id' => $devi->id]) }}">  Edit</a>
                   </small>
                </span>
                <span class="pull-center">
                created at {{ $devi->created_at }}
                </span>
                <span>
                <a class="pull-right" href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                </span>
               </div>
               
               <section class="content content_content" style="width: 100%; margin: auto;">
                    <section class="invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <h2 class="page-header">
                                    <i class="fa fa-globe"></i> Obsèques Comparateur
                                    <small class="pull-right">Date: {{ $devi->created_at}}</small>
                                </h2>
                            </div><!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>
                                        {{ $devi->lieu_de_deces }}
                                     </strong>
                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>
                                        Admin                                   </strong>
                                    <br>
                                    <b>Address:</b>
                                    {{ $devi->destination_de_defunt }}                                    <br>
                                    <b>Phone:</b>
                                    {{ $devi->tel}}                                <br>
                                    <b>Email:</b>{{ $devi->email }}                                </address>
                            </div><!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                                <b>Devis ID {{ $devi->id }}</b><br>
                                <br>
                                <b>Ceromonie: </b>{{ $devi->ceremonie }}<br>
                                <b>Option: </b> {{ $devi->option }}<br>
                                <b>Mode de Sepulture: </b> {{ $devi->mode_de_sepulture }}
                                <b>Situation:</b>{{ $devi->mode_de_sepulture }}
                            </div><!-- /.col -->
                        </div><!-- /.row -->
         
            <form mehod="post" action="{{ route('label',$devi->id) }}">
                       <div id="div_quotes">
                        <a class="fa fa-plus" aria-hidden="true" type="button" onClick="addLabel();"></a>
                       </div> 
                  
             
                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                               
                                <table class="table table-striped">
                                    <thead>
                                         <tr>
                                             <th>Service</th>
                                             <th>Price</th>
                                             <th>Total </th>
                                            
                                         </tr>
                                    </thead>
                                     <tbody>
                                        
                                          @foreach ($accountings as $accounting)
                                          @if($accounting->account_id == $devi->id)
                                            
                                         <tr>
                                            <td>{{ $accounting->service }}</td>
                                            <td>{{ $accounting->price }}</td>
                                            <td>{{ $accounting->price }}</td>
                                         </tr>    
                                             
                                            
                                        
                                         @endif
                                         @endforeach
                                     </tbody>
                                </table>
                                 
                                
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <a href="{{ route('accounting-management.edit', ['id' => $devi->id]) }}" class="btn btn-warning glyphicon glyphicon-edit col-sm-2 col-xs-2 btn-margin">
                           
                        </a>
                        <button type="submit" class="btn btn-primary pull-right"> submit </button>
                
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-md-12">
                                <p class="lead">Obserations : {{ $devi->observation }}</p>
                                <div class="table-responsive">
                                    <table class="table">
                                    <tbody>
                                    <tr>
                                    <th>Total:</th>
                                    <td>{{ $s }}</td>
                                    </tr>
                                    </tbody>
                                    </table>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                
                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">
                                <a href="" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                                <a href="{{ route('devis-management.sendEmail',$devi->id) }}" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> send Email</a>
                                <a ref="{{ route('pdf',$devi->id) }}" class="btn btn-primary pull-right" onClick="loading();" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate  PDF</a>
                       
                            </div>
                        </div>
                    </section>
                </section>   
                   </form>
     </div>
    </div>



<!--
<td  class="sorting_1  text-white">{{ $devi->id }}</td>
                 <td  class="hidden-xs  text-white">{{ $devi->tel }}</td>
                <td>{{ $devi->email }}</td>
                <td> {{ $devi->situation }}</td>
                <td>{{ $devi->ville_de_deces }}</td>
                <td>{{ $devi->date_de_deces }}</td>
                <td> {{ $devi->lieu_de_deces }}</td>
                <td>{{ $devi->mode_de_sepulture }}</td>
                <td>{{ $devi->destination_de_defunt }}</td>
                <td>{{ $devi->ceremonie }}</td>
                <td>{{ $devi->option }}</td>
                <td>{{ $devi->observation }}</td>
-->

</div>

@endsection