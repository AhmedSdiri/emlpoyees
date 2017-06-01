@extends('clients-mgmt.base')

@section('action-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add new employee</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('client-management.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="tel" class="col-md-4 control-label">Tel</label>

                               <div class="col-md-6">
                                <input id="tel" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autofocus>

                                 @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                          </div>  
                        
                       
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="emaail" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
                            <label for="tel" class="col-md-4 control-label">Tel</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control" name="tel" value="{{ old('tel') }}" required>

                                @if ($errors->has('tel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                       </div>
                        
                       <div class="form-group">
                            <label class="col-md-4 control-label">Cité</label>
                            <div class="col-md-6">
                                <select class="form-control" name="city_id">
                                    @foreach ($cities as $city)
                                        <option value="{{$city->id}}"> {{ $city->name }} </option>
                                    @endforeach     
                                </select>
                           </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Gouvernorat</label>
                             <div class="col-md-6">
                                <select class="form-control" name="state_id">
                                    @foreach ($states as $state)
                                        <option value="{{$state->id}}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                             </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Pays</label>
                            <div class="col-md-6">
                                <select class="form-control" name="country_id">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{$country->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="avatar" class="col-md-4 control-label" >Picture</label>
                            <div class="col-md-6">
                               <input type="file" id="picture" name="picture" required >
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
