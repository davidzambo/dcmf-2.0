@extends('masters.home')

@section('header')
  @include('layouts.header', ['title' => 'Welcome to David\'s Code ManuFactory'])
@stop

@section('navbar')
  @include('layouts.navbar')
@stop


@section('content')

  @include('home.welcome')

  @include('home.about')

@stop


@section('footer')
  @include('layouts.footer')
@stop
