{{-- <!DOCTYPE html>
<html>

<head>
    <title>La Vecindad del Chavo</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- References: https://github.com/fancyapps/fancyBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


    <style type="text/css">
        .gallery {
            display: inline-block;
            margin-top: 20px;
        }

        .close-icon {
            border-radius: 50%;
            position: absolute;
            right: 5px;
            top: -10px;
            padding: 5px 8px;
        }

        .form-image-upload {
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }
    </style>
</head>

<body> --}}
@extends( 'layouts.layout' )
@section('container')
<br>
<hr>

    <div class="container">
        <h3>Laravel - Galleria de la vecindad del Chavo</h3>
    <div class="col-md-12">
        <a class="btn btn-primary pull-right" 
        href="{!! route('image-gallery.create') !!}"><i class="fa fa-plus">Agregar Personaje</i></a>
    </div>
        <div class="row">
            <div class='list-group gallery'>
                @if($images->count())
                @foreach($images as $image)
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="/images/{{ $image->image }}">
                        
                        <img class="img-responsive" alt="" src="/images/{{ $image->image }}" />
                        <div class='text-center'>
                            <span class='text-muted'>{{ $image->nombre }}</span><br/>
                            <small class='text-muted'>{{ $image->apodo }}</small>
                        </div> <!-- text-center / end -->
                    </a>
                    <a href="{{ route('image-gallery.edit',$image->id) }}" class="btn btn-primary glyphicon glyphicon-pencil" title="Editar"> </a>
                    <br/>
                    <form action="{{ url('image-gallery',$image->id) }}" method="POST">
                        <input type="hidden" name="_method" value="delete">
                        {!! csrf_field() !!}
                        <button type="submit" class="close-icon btn btn-danger" title="Eliminar"><i
                                class="glyphicon glyphicon-remove"> </i></button>
                    </form>
                </div> <!-- col-6 / end -->
                @endforeach
                @else
                        <h3>No se encontraron personajes</h3>
                @endif
            </div> <!-- list-group / end -->
        </div> <!-- row / end -->
    </div> <!-- container / end -->

<script type="text/javascript">

    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
@endsection
