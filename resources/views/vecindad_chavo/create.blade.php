{!! Form::open(['route' => 'image-gallery.store','id'=>'chavo',
 'class'=>"form-image-upload",'enctype'=>"multipart/form-data"]) !!}
    @include('vecindad_chavo.fields')
{!! Form::close() !!}