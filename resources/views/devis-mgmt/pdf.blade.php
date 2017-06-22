<!DOCTYPE html>
<html lang="en">
 <head>
    <!-- Required meta tags -->
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     
     
  </head>
 <body>
<div class="row">
     <div class="col-md-6 col-md-offset-3">  
        <div class="panel panel-default" style="width: 100%; margin: auto;">
            <div class="panel-heading">
            
           
                <span class="pull-center">
                  Devis
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

                        <!-- Table row -->
                       <div class="row">
                            <div class="col-xs-12 table-responsive">
                               
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                           
                                            <th>Service</th>
                                             <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                         @foreach ($accountings as $accounting)
                                          @if($accounting->account_id == $devi->id)
                                            
                                        <tr>
                                            <td>{{ $accounting->service }}</td>
                                            <td>{{ $accounting->price }}</td>
                                            <td> {{ $accounting->price }}</td>
                                        </tr>    
                                            
                                            
                                        
                                         @endif
                                         @endforeach
                                     </tbody>
                                </table>
                                 
                                
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-md-12">
                                <p class="lead">Obserations : {{ $devi->observation }}</p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>Total:</th>
                                                <td> {{ $s }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- /.col -->
                        </div><!-- /.row -->

                        <!-- this row will not appear when printing -->
                       
                    </section>
                </section>
          
     </div>
    </div>




</div>
    </body>
    </html>