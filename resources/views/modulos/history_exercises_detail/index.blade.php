@extends('layouts.admon')

<!-- SideBar -->
@section('content')
    @include ('bar.sidebarmedico')
@endsection

@section('content_body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">                    
                    <div class="well well-sm"><span class="titlePage">Histórico de los Ejercicios:</span></div>
                    <!--Body-->
                    <div class="card-content">
                        <a href="{{ url('/modulos/history_exercises') }}" title="Back">
                            <button type="button" rel="tooltip" title="Regresar"
                                    class="btn btn-warning btn-round btn-just-icon">
                                <i class="material-icons">arrow_back</i>
                            </button>
                        </a>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <tr>
                                    <th style="text-align: left !important;" rowspan="2">Fecha / Hora de Ejecución del Ejercicio</th>
                                    <th style="text-align: center !important;" rowspan="2">Duración Min</th>
                                    <th style="text-align: center !important;" rowspan="2">Estado</th>
									<th style="text-align: center !important;" rowspan="2">Coin</th>
									<th style="text-align: center !important;" rowspan="2">Estrellas</th>
                                </tr>
                                </thead>
                                @foreach($history_exercises_detail as $item)
                                    <tr>
                                        <td style="text-align: left !important;">{{ $item->created_at }}</td>
                                        <td style="text-align: center !important;">{{ $item->duracion }}</td>
									@if ($item->status == "OK")	
                                        <td style="border-collapse: separate !important;color: green !important;font-weight: bold !important;text-align: center !important;">{{ $item->status }}</td>
									@elseif ($item->status == "AC")	
										<td style="border-collapse: separate !important;color: blue !important;font-weight: bold !important;text-align: center !important;">{{ $item->status }}</td>
									@elseif ($item->status == "IN")
										<td style="border-collapse: separate !important;color: red !important;font-weight: bold !important;text-align: center !important;">{{ $item->status }}</td>
									@elseif ($item->status == "SA")
										<td style="border-collapse: separate !important;color: darkred !important;font-weight: bold !important;text-align: center !important;">{{ $item->status }}</td>
									@else
										<td style="border-collapse: separate !important;text-align: center !important;">{{ $item->status }}</td>
									@endif
										<td style="border-collapse: separate !important;text-align: center !important;">												
										{{ $item->coin }}	
										</td> 
										<td style="border-collapse: separate !important;text-align: center !important;">
										{{ $item->star }}
										</td>
                                    </tr>
                                @endforeach
                            </table>
                            <div class="pagination-wrapper"> {!! $history_exercises_detail->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                    </div>
                    <!-- End Body -->
                </div>
            </div>
        </div>

@endsection

@section('scripts')
@endsection
