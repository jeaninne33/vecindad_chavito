<!DOCTYPE html>
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

<body>


    <div class="container">
        <h3>Laravel - Galleria de la vecindad del Chavo</h3>
    <div class="col-md-12">
        <a class="btn btn-primary pull-right" 
        href="{!! route('image-gallery.create') !!}"><i class="fa fa-plus">Agregar Personaje</i></a>
    </div>


        {{-- <h3>Laravel - Galeria de la vecindad del Chavo</h3>
        <form action="{{ url('image-gallery') }}" id='chavo' class="form-image-upload" method="POST" enctype="multipart/form-data">

            {!! csrf_field() !!}


            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            
            @endif
            <div id="messages"></div>


            <div class="row">
                <div class="col-md-6 titulo" >
                    <strong>Titulo:</strong>
                    <input type="text" name="titulo" id='titulo' class="form-control" placeholder="Titulo">
                </div>
                <div class="col-md-6 nombre" >
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre"  id='nombre'  class="form-control" placeholder="Nombre">
                </div>
                <div class="col-md-6 apodo">
                    <strong>Apodos:</strong>
                    <input type="text" name="apodo" id='apodo' class="form-control" placeholder="Apodo">
                </div>
                <div class="col-md-6 apartamento">
                    <strong>Departamento:</strong>
                    <input type="text" name="apartamento" id='apartamento' class="form-control" placeholder="Departamento">
                </div>
                <div class="col-md-12 descripcion">
                    <strong>Descripción:</strong>
                    <input type="text" name="descripcion" id='descripcion' class="form-control" placeholder="Descripcion">
                </div>
                <div class="col-md-12 image">
                    <strong>Imagen:</strong>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="col-md-12">
                    <br />
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>


        </form> --}}


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
                    <a href="{{ url('image-gallery',$image->id) }}">holis{{$image->id}}</a>
                    <form action="{{ url('image-gallery',$image->id) }}" method="POST">
                        <input type="hidden" name="_method" value="delete">
                        {!! csrf_field() !!}
                        <button type="submit" class="close-icon btn btn-danger"><i
                                class="glyphicon glyphicon-remove"></i></button>
                    </form>
                </div> <!-- col-6 / end -->
                @endforeach
                @endif


            </div> <!-- list-group / end -->
        </div> <!-- row / end -->
    </div> <!-- container / end -->


</body>


<script type="text/javascript">
 $(document).on('submit', ".form-image-upload", function(e) 
        {
            // Stop form from submitting normally
            e.preventDefault();
            var token = $(form).find('input[name="_token"]').val();
           
            var form = '#' + $(this).attr('id');
          ///  var data = $(form).serialize();
            var route = $(this).attr('action');
            var form = $(this)[0];
            var data = new FormData(form);
            $.ajax({
                url:route,
                type:'post',
                data: data,
                enctype: 'multipart/form-data',
                processData: false,  // Important!
                contentType: false,
                cache: false,
                headers: {'X-CSRF-TOKEN': token},
                success:function(data){
                    $('#messages').removeClass("alert alert-danger");
                    $('#messages').html(data.msj);
                },
                error:function(data){
                    $('#messages').removeClass("alert alert-success");
                    $('#messages').addClass("alert alert-danger");
                    $('#messages').html("");
                    $(".has-error").removeClass("has-error");
                    $.each(data.responseJSON.errors, function(key, value){
                        jQuery('#messages').append('<p>' + value + '</p>');
                        $("." + key).addClass("has-error");
                    });
                }
                });
        }); 
		
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>

</html>