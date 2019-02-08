@extends('layouts.app')
@section('content')
    <h1>{{$title}}</h1>
    {{--<p>The Laravel framework has a few system requirements. Of course, all of these requirements are satisfied by the--}}
        {{--Laravel Homestead virtual machine, so it's highly recommended that you use Homestead as your local Laravel--}}
        {{--development environment.</p>--}}
    @if(count($services)>0)
        <ul>
            @foreach($services as $service)
                <li>{{$service}}</li>
            @endforeach
        </ul>
    @endif
@endsection
