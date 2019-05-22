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
           @include('vecindad_chavo.image')
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
