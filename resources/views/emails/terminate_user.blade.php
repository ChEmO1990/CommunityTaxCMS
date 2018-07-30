@extends('beautymail::templates.sunny')

@section('content')

    @include ('beautymail::templates.minty.heading' , [
        'heading' => 'Hello!',
        'level' => 'h1',
    ])

    @include('beautymail::templates.minty.contentStart')

        <p>Today will be a great day!</p>

    @include('beautymail::templates.minty.contentEnd')

    @include('beautymail::templates.minty.button', [
        	'title' => 'Click me',
        	'link' => 'http://google.com'
    ])

@stop