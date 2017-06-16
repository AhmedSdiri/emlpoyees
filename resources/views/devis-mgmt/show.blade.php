@extends('devis-mgmt.base')



@section('action-content')


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

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Qty</th>
                                            <th>Product</th>
                                             <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                                                                <tr>
                                            <td>2</td>
                                            <td>18</td>
                                            <td>12500</td>
                                            <td>25000</td>
                                        </tr>
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
                                                <td> 50000</td>
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
                                <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
                                <a href="{{ route('report.pdf') }}" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</a>
                            </div>
                        </div>
                    </section>
                </section>
          
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