@extends('layouts.layout')

@section('content')
<checkout userid="{{ Auth::User()->User_id }}"></checkout>
@endsection