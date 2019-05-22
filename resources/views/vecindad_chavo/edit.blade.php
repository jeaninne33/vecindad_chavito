
 {!! Form::model($image, ['route' => ['image-gallery.update', $image->id],
  'method' => 'put', 'id'=>'chavo','class'=>"form-image-upload",'enctype'=>"multipart/form-data"])
    !!}
    @include('vecindad_chavo.fields')
{!! Form::close() !!}