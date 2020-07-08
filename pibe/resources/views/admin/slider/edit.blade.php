@extends('maestra-cliente.maestraadmin')
@section('titulo', 'Sliders')
@section('micss')
	<link href="{{ asset('css/floating-label.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
@endsection
@section('menu-pagina-principal')
                    <li class="nav-item nav-dropdown">
                        <a href="#" class="nav-link nav-dropdown-toggle active">
                            <i class="icon icon-wrench"></i> Pagina  Principal<i class="fa fa-caret-left"></i>
                        </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/slider" class="nav-link  active">
                                    <i class="icon icon-wrench"></i> Sliders
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item">
                                <a href="/admin/coupon" class="nav-link">
                                    <i class="icon icon-wrench"></i> Cupones
                                </a>
                            </li>
                        </ul>
                        
                    </li>
@endsection
@section('centro')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Editar Slider</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin') }}">Inicio</a></li>
            <li class="breadcrumb-item"><a class="text-dark" href="{{ url('/admin/slider') }}">Listado de Slider</a></li>
            <li class="breadcrumb-item active">Editar Slider</li>
        </ol>
    </div>
</div>
<form  class="row" action="{{ url("admin/slider/$slider->id") }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card col-12">
        <div class="card-body">
            <h2 class="card-title p-b-20">Datos del Slider</h2> <br>
            <div class=" row">
                <div class="col-md-6">
                    @component('components.input', ['name' => 'title','title' => 'Titulo del slider','value' => $slider->title])
                    @endcomponent
                </div>
                <div class="col-md-6">
                    @component('components.input', ['name' => 'subtitle','title' => 'Subtitulo del slider', 'value' => $slider->subtitle])
                    @endcomponent
                    
                </div>
            </div>
            <div class=" row">
                <div class="col-md-6">
                    @component('components.select',['name' => 'position', 'title' => 'Posicion del Slider', 'id' => 'estateSelect','items' => ['Izquierda','Derecha'],'compare' => $slider->position  ])
                    @endcomponent
                </div>
                <div class="col-md-6">
                    @component('components.input', ['name' => 'url','title' => 'Url del slider','type' =>'url', 'value' => $slider->url ])
                    @endcomponent
                </div>
            </div>

            <h4 class="m-b-20">Imagen del Slider</h4>
            <div class="form-group  m-b-40">
                <input type="file" id="input-file-now" class="dropify" name="image" data-default-file="{{ $slider->image }}" required/>
                @if ($errors->has('image'))
                    <span class="form-control-feedback text-danger">
                        <small>{{ $errors->first('image') }}</small>
                    </span>
                @endif
                <p class="p-t-10">El tamaño optimo para la imagen es de 1280 x 533 </p>                
            </div> 
            <input name="_method" type="hidden" value="PUT">
            <a class="btn btn-inverse" href="{{ url('admin/slider') }}"><i class="icon icon-arrow-left"></i> Atras</a>
            <button class="btn btn-success" type="submit">Actualizar Slider</button>
        </div>
    </div>
</form>
@endsection
@section('scripts')
<script src="{{ asset('plugins/dropify/dist/js/dropify.min.js') }}"></script>
<script>
    $(document).ready(function()
    {
        // Basic
        $('.dropify').dropify();
    });
</script>
@endsection