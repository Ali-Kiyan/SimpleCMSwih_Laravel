@extends('layouts.app')




@section('content')



 <h1>Edit Post</h1>

 {!! Form::model($post, ['method' => 'PATCH', 'action' => ['PostsController@update', $post->id]]) !!}

        {{--laravel needs to have put action to recognize the update so we do it manually--}}
        {{csrf_field()}}

        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control'])!!}
        {!! Form::submit('Update Post', ['class'=>'btn btn-info'])   !!}
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
 {!! Form::close() !!}




 {!! Form::open(['method' => 'DELETE', 'action' =>['PostsController@destroy', $post->id]]) !!}


 {!! Form::submit('Delete Post', ['class'=>'btn btn-danger'])   !!}
     {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
     <input type="submit" value="DELETE">


 {!! Form::close() !!}

@endsection
@section('footer')