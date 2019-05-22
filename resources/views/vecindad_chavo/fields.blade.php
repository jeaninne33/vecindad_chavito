
    {!! csrf_field() !!}
    <div id="messages"></div>
    <div class="row">
        <div class="col-md-6">
            <strong>Titulo:</strong>
            <input type="text" name="titulo" id='titulo' class="form-control" placeholder="Titulo">
        </div>
        <div class="col-md-6">
            <strong>Nombre:</strong>
            <input type="text" name="nombre" id='nombre' class="form-control" placeholder="Nombre">
        </div>
        <div class="col-md-6">
            <strong>Apodos:</strong>
            <input type="text" name="apodo" id='apodo' class="form-control" placeholder="Apodo">
        </div>
        <div class="col-md-6">
            <strong>Departamento:</strong>
            <input type="text" name="departamento" id='departamento' class="form-control" placeholder="Departamento">
        </div>
        <div class="col-md-12">
            <strong>Descripción:</strong>
            <input type="text" name="descripcion" id='descripcion' class="form-control" placeholder="Descripcion">
        </div>
        <div class="col-md-12">
            <strong>Imagen:</strong>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="col-md-12">
            <br />
            <button type="submit" class="btn btn-success">subir</button>
        </div>
    </div>