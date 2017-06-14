@extends('reports-mgmt.base')
@section('action-content')
        <form class="form-horizontal" role="form" method="POST" action="{{ route('reports-management.exportExcel') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$dateVals['from']}}" name="from" />
                <input type="hidden" value="{{$dateVals['to']}}" name="to" />
                <button type="submit" class="btn btn-primary">
                  Export to Excel
                </button>
            </form>
                <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('reports-management.importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <input type="hidden" value="{{$dateVals['from']}}" name="from" />
                <input type="hidden" value="{{$dateVals['to']}}" name="to" />
			  <input type="file" name="import_file" />
			  <button class="btn btn-primary">Import File</button>
		</form>
    
       <form method="POST" action="{{ route('devis-management.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-search-row', ['items' => ['Tel','Email'], 
          'oldVals' => [isset($searchingVals) ? $searchingVals['tel'] : '',  isset($searchingVals) ? $searchingVals['email'] : '']])
          @endcomponent
        @endcomponent
       </form>
       <form method="POST" action="{{ route('reports-management.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-date-search-row', ['items' => ['From', 'To'], 
          'oldVals' => [isset($dateVals) ? $dateVals['from'] : '', isset($dateVals) ? $dateVals['to'] : '']])
          @endcomponent
         @endcomponent
       </form>
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="6%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">ID</th>
                <th width="6%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Tel</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Email</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Situation</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Ville de décès </th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Date de décès</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Lieu de décès</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Mode de sepulture</th>
                  <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Destination de Défunt</th>
                  <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Cérémonie</th>
                  <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Option</th>
                  <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Observations</th>
                  <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Etat</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($devis as $devi)
            <tr role="row" class="odd">
                <td class="sorting_1">{{ $devi->id }}</td>
                <td class="hidden-xs">{{ $devi->tel }}</td>
                <td class="hidden-xs">{{ $devi->email }}</td>
                <td class="hidden-xs">{{ $devi->situation }}</td>
                <td class="hidden-xs">{{ $devi->ville_de_deces }}</td>
                <td class="hidden-xs">{{ $devi->date_de_deces }}</td>
                <td class="hidden-xs">{{ $devi->lieu_de_deces }}</td>
                <td class="hidden-xs">{{ $devi->mode_de_sepulture }}</td>
                <td class="hidden-xs">{{ $devi->destination_de_defunt }}</td>
                <td class="hidden-xs">{{ $devi->ceremonie }}</td>
                <td class="hidden-xs">{{ $devi->option }}</td>
                <td class="hidden-xs">{{ $devi->observation }}</td>
                <td class="hidden-xs"> @if(($devi->etat) == 1)<button type="submit" class="btn btn-info glyphicon glyphicon-eye-open col-sm-5 col-xs-5 btn-margin"></button>
                                       @else
                                       <button type="submit" class="btn btn-primary glyphicon glyphicon-eye-close col-sm-5 col-xs-5 btn-margin"></button>  
                                       @endif
                                       @if(($devi->traitement) == 1)<button type="submit" class="btn btn-success glyphicon glyphicon-thumbs-up col-sm-5 col-xs-5 btn-margin"></button>
                                       @else
                                       <button type="submit" class="btn btn-warning glyphicon glyphicon-thumbs-down col-sm-5 col-xs-5 btn-margin"></button>  
                                       @endif
                                     
                </td>
                  <td>
                    <form class="row" method="POST" action="{{ route('devis-management.destroy', ['id' => $devi->id]) }}" onsubmit = "return confirm('Are you sure?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('devis-management.edit', ['id' => $devi->id]) }}" class="btn btn-warning glyphicon glyphicon-edit col-sm-2 col-xs-2 btn-margin">
                           
                        </a>
                         <button type="submit" class="btn btn-danger glyphicon glyphicon-trash col-sm-2 col-xs-2 btn-margin">
                          
                        </button>
                    </form>
                      
                 </td>
             </tr>
             @endforeach
            </tbody>
              
            <tfoot>
              <tr role="row">
                <th width="6%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">ID</th>
                <th width="6%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Tel</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending">Email</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Situation</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthdate: activate to sort column ascending">Ville de décès </th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="HiredDate: activate to sort column ascending">Date de décès</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Lieu de décès</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Mode de sepulture</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Destination de Défunt</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Cérémonie</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Option</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Observations</th>
                <th width="6%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending">Etat</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </tfoot>
          </table>
        </div>
                <div class="col-sm-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($devis)}} of {{count($devis)}} entries</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
         
          </div>
        </div>
      </div>
      </div>
    </div>*
@endsection