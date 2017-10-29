@extends('masters.home')

@section('header')
  @include('layouts.header', ['title' => 'David\'s Code ManuFactory::From(Idea)->To(Reality);'])
@stop

@section('navbar')

  @include('layouts.navbar')

@stop


@section('content')

  @include('home.welcome')

  @include('home.about')

  @include('home.services')

  @include('home.skills')

  @include('home.portfolio')

  @include('home.contact')


    @if (session('username') === 'David')

      @include('admin.extensions')

    @else

      @include('home.login')

    @endif


@stop


@section('footer')
  @include('layouts.footer')
@stop
