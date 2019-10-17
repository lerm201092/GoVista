@extends('layouts.admon')

<!-- SideBar -->
@if(Auth::user()->roluser == 1  )
@section('content')
    @include ('bar.sidebar')
@endsection
@endif
@if(Auth::user()->roluser == 2  )
@section('content')
    @include ('bar.sidebarmedico')
@endsection	
@endif
@if(Auth::user()->roluser == 3  )
@section('content')
    @include ('bar.sidebarmedico')
@endsection
@endif
@if(Auth::user()->roluser == 4  )
@section('content')
    @include ('bar.sidebarmedico')
@endsection
@endif

@section('content_body')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">			
					<div class="well well-sm"><span class="titlePage">Mi Perfil:</span></div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('profile.update') }}" method="POST" role="form" enctype="multipart/form-data">
									    {{ csrf_field() }}
										<div class="row">
                                        <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="username" class="col-md-4 col-form-label text-md-right">Nombre de Usuario</label>
                                            <div class="col-md-6">
                                                <input disabled readonly style="padding: 5px !important;background: #eee !important;border-radius: 5px !important;" type="text" class="form-control" value="{{ old('username', auth()->user()->username) }}">
                                            </div>
                                        </div>	
									</div>	
									<div class="col-md-4">									
										 <div class="form-group row">
                                            <label for="nombres" class="col-md-4 col-form-label text-md-right">Nombres</label>
                                            <div class="col-md-6">
                                                <input disabled readonly style="padding: 5px !important;background: #eee !important;border-radius: 5px !important;" type="text" class="form-control" value="{{ old('nombres', auth()->user()->nombres) }}">
                                            </div>
                                        </div>	
									</div>
									<div class="col-md-4">										
										 <div class="form-group row">
                                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">Apellidos</label>
                                            <div class="col-md-6">
                                                <input disabled readonly style="padding: 5px !important;background: #eee !important;border-radius: 5px !important;" type="text" class="form-control" value="{{ old('apellidos', auth()->user()->apellidos) }}">
                                            </div>
                                        </div>
										</div>
									</div>	

<div class="row">
                                        <div class="col-md-4">									
										 <div class="form-group row">
                                            <label for="tipodoc" class="col-md-4 col-form-label text-md-right">Tipo de Documento</label>
                                            <div class="col-md-6">
                                                <input disabled readonly style="padding: 5px !important;background: #eee !important;border-radius: 5px !important;" type="text" class="form-control" value="{{ old('tipodoc', auth()->user()->tipodoc) }}">
                                            </div>
                                        </div>	
  </div>    
<div class="col-md-4">  
										<div class="form-group row">
                                            <label for="numdoc" class="col-md-4 col-form-label text-md-right">Numero de Documento</label>
                                            <div class="col-md-6">
                                                <input disabled readonly style="padding: 5px !important;background: #eee !important;border-radius: 5px !important;" type="text" class="form-control" value="{{ old('numdoc', auth()->user()->numdoc) }}">
                                            </div>
                                        </div>
  </div>	
<div class="col-md-4">  
										<div class="form-group row">
                                            <label for="address" class="col-md-4 col-form-label text-md-right">Dirección</label>
                                            <div class="col-md-6">
                                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address', auth()->user()->address) }}">
                                            </div>
                                        </div>	
                                          </div>
  </div>
  
  <div class="row">
                                        <div class="col-md-4">                                        
										<div class="form-group row">
                                            <label for="movil" class="col-md-4 col-form-label text-md-right">Telefono</label>
                                            <div class="col-md-6">
                                                <input id="movil" type="text" class="form-control" name="movil" value="{{ old('movil', auth()->user()->movil) }}">
                                            </div>
                                        </div>
                                          </div>
 <div class="col-md-4"> 										
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                            <div class="col-md-6">
                                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}" disabled>
                                            </div>
                                        </div>
                                          </div>                                         
                                          <div class="col-md-4"> 
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Imagen de Perfil</label>
                                            <div class="col-md-4">	 
 @if (auth()->user()->image)                                            
									        <img class="img-thumbnail" src="{{ auth()->user()->image }}">
                                        @else
                                            <i title="Usted no tiene imagen de perfil." style="cursor: help !important;color:red !important;font-size:18pt !important;" class="material-icons">not_interested</i>
                                        @endif                                            
                                            </div>
                                        </div>
                                         </div>
                                         
                                            </div> 

  <div class="row">
<div class="col-md-4"> 
                                        <div class="form-group row">
                                            <label for="profile_image" class="col-md-4 col-form-label text-md-right">Subir Imagen de Perfil</label>
                                            <div class="col-md-6">											
                                               <input multiple="" class="form-control inputFileHidden" type="file" name="profile_image" id="profile_image" />  
												<i class="material-icons">attach_file</i>																						
                                            </div>
                                        </div>
                                         </div>
 </div> 
 
                                            
                                        <div class="form-group row mb-0 mt-5">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection