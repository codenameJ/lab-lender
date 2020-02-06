@extends('layouts.layout')

@section('content')
<!-- <equipment></equipment> -->
<!-- <equipment-admin></equipment-admin> -->
<!-- <eqcom></eqcom> -->

@if ((auth()->check() && Auth::user()->Type == 'admin'))
<equipment-admin></equipment-admin>
@else
<equipment></equipment>
@endif

@endsection