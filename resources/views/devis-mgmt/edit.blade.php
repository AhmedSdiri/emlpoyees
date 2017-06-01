@extends('devis-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new devis</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('devis-management.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                            <label for="tel" class="col-md-4 control-label">Tel</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel') }}" required autofocus>

                                 @if ($errors->has('tel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                         </div>  
                        
                     
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="emaail" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Situation</label>
                             <div class="col-md-6">
                                <select id="situation" class="form-control" name="situation value="{{ old('situation') }}">
                                        <option>décés</option>
										 <option>non décés</option>
                                </select>
                            </div>
                        </div>
						    <div class="form-group">
                            <label class="col-md-4 control-label">ville de décès</label>
                            <div class="col-md-6">
                                <select id="ville_de_deces" class="form-control" name="ville_de_deces">
                                    @foreach ($cities as $city)
                                        <option value="{{$city->id}}"> {{ $city->name }} </option>
                                    @endforeach     
                                </select>
                            </div>
                           </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Date de décès</label>
                             <div class="col-md-6">
                                <input id="date_de_deces" type="date" class="form-control" name="date_de_deces" value="" required>
                            </div>
                        </div>
                           <div class="form-group">
                            <label class="col-md-4 control-label">lieu de décès</label>
                            <div class="col-md-6">
                                <select id="lieu_de_deces" class="form-control" name="lieu_de_deces">
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}"> {{ $state->name }} </option>
                                    @endforeach     
                                </select>
                            </div>
                            </div>
                        
                        	<div class="form-group">
                            <label class="col-md-4 control-label">Mode de sépulture</label>
                             <div class="col-md-6">
                                <select id="mode_de_sépulture" class="form-control" name="mode_de_sépulture">
                                         <option>inhumation</option>
										 <option>crémation</option>
                                         <option>rapatriement</option>
                                </select>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-md-4 control-label">Déstination de défunt</label>
                            <div class="col-md-6">
                                <select id="destination_de_defunt" class="form-control" name="destination_de_defunt">
                                    @foreach ($countries as $country)
                                        <option value="{{$country->id}}"> {{ $country->name }} </option>
                                    @endforeach     
                                </select>
                            </div>
                           </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Céremonie</label>
                             <div class="col-md-6">
                                <select id="ceremonie" class="form-control" name="ceremonie">
                                         
                                         <option>aucune ceremonie</option>
                                         <option>ceremonie musulmane</option>
										 <option>ceremonie catholique</option>
                                         <option>ceremonie juive</option>
                                </select>
                            </div>
                        </div>
                       <!-- <div class="form-group">
                            <label class="col-md-4 control-label">Options</label>
                             <div class="col-md-6">
                            
                                      <label>
                                       <input type="checkbox" id="faire-part" value="faire-part">
                                       faire-part
                                       </label>
                                 
                                     <label><input type="checkbox" id="toilette mortuaire" value="toilette mortuaire">
                                     toilette mortuaire
                                     </label>
                                     
                                     
                                     <label>
                                       <input type="checkbox" id="parution presse" value="parution presse">
                                      parution presse
                                       </label>
                                       <label>
                                       <input type="checkbox" id="soins de conservation" value="soins de conservation">
                                       soins de conservation
                                       </label>
                        
                            </div>
                            </div>
                        -->
                        <div class="form-group">
                            <label class="col-md-4 control-label">Options</label>
                             <div class="col-md-6">
                                <select id="option" class="form-control" name="option">
                                         
                                         <option>faire-part</option>
                                         <option>toilette mortuaire</option>
										 <option>parution presse</option>
                                         <option>soins de conservation</option>
                                </select>
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="observation" class="col-md-4 control-label">Observations</label>

                            <div class="col-md-6">
                                <input id="obervation" type="textarea" class="form-control" name="observation" value="" required>

                               
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
