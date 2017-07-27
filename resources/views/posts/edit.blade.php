@extends('layouts.app')




@section('content')



 <h1>Edit Post</h1>

    <form method="post" action="/posts/{{$post->id}}">

        {{--laravel needs to have put action to recognize the update so we do it manually--}}
        {{csrf_field()}}

        <input type="hidden" name="_method" value="PUT">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="text" name="title" value="{{$post->title}}">
        <input type="submit" name="Update">
    </form>




 <form method="post" action="/posts/{{$post->id}}">


     <input type="hidden" name="_method" value="DELETE">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <input type="submit" value="DELETE">


 </form>

@endsection
@section('footer')