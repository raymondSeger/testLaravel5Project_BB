@extends('testTemplate.main')

@section('title', $title)

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>My name is {{$name}} </p>
	<p>My age is {{$age}} </p>
@endsection