<div class="row" id="load_image">
    <div class="container">
        <div class="input-group">
            <input type="text" class="form-control"
                placeholder="" id="texto_buscar"
                value="{{$search}}">
            <span class="input-group-btn">
                <button class="btn btn-search" id="search" type="button"><i class="fa fa-search fa-fw"></i>
                   Busqueda por Title, Apodo, Nombre</button>
            </span>
        </div>
    </div>
    <br>
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
    <div class="col-sm-12 text-center">
        {{ $images->links() }}
    </div>
</div>