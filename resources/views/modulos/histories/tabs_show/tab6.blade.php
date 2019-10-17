<div class="tab-pane fade" id="tab_6"> <!-- begin: Tab_6 -->

        <div class="row">
            <div class="col-md-12">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>Causa Externa</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>Diagnostico Principal</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">                    
                    <select disabled class="form-control" id="diagnostico1" name="diagnostico1">
                                @foreach ($rips as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemKey ==  $historyFill->diagnostico1 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                </div>
            </div>
            <div class="col-md-6">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>ECTROPION DEL PARPADO</h6>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>Diagnostico Relacional 1</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">                    
                     <select disabled class="form-control" id="diagnostico2" name="diagnostico2">
                                @foreach ($rips as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemKey ==  $historyFill->diagnostico2 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="" name="" placeholder="" value="#N/A" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>Diagnostico Relacional 2</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">
                    <select disabled class="form-control" id="diagnostico3" name="diagnostico3">
                                @foreach ($rips as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemKey ==  $historyFill->diagnostico3 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="" name="" placeholder="" value="#N/A" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>Diagnostico Relacional 3</h6>
            </div>
            <div class="col-md-4">
                <div class="form-group label-floating">                    
                    <select disabled class="form-control" id="diagnostico4" name="diagnostico4">
                                @foreach ($rips as $itemKey => $itemValue)
                                @if ( isset($historyFill) && $itemKey ==  $historyFill->diagnostico4 )
                                    <option value="{{ $itemKey }}" selected>{{$itemValue}}</option>
                                @else
                                    <option value="{{ $itemKey }}">{{$itemValue}}</option>
                                @endif
                                @endforeach
                        </select>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="" name="" placeholder="" value="#N/A" />
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>Complicación</h6>
            </div>
            <div class="col-md-10">
                <div class="form-group label-floating">
                    {!! Form::text('complicacion', isset($historyFill) ? $historyFill->complicacion : null,  ['class' => 'form-control','disabled']) !!}
                    {!! $errors->first('complicacion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                <h6 style="font-weight: bold !important;color: black !important;" class="text-left"><br>Finalidad de Consulta</h6>
            </div>
            <div class="col-md-10">
                <div class="form-group label-floating">
                    {!! Form::text('finalidad', isset($historyFill) ? $historyFill->finalidad : null,  ['class' => 'form-control','disabled']) !!}
                    {!! $errors->first('finalidad', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

</div> <!-- end: Tab_6 -->