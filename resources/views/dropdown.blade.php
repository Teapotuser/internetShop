@extends('layouts.master')
@section('custom_css') 
    <link rel="stylesheet" href="{{ asset('css/dropdown.css') }}" type="text/css">    
@endsection
@section('content')
<select class="select" name="language">
    <option disabled>Выбрать</option>
    <option value="HTML">HTML</option>
    <option value="JavaScript">JavaScript</option>
    <option value="PHP">PHP</option>
</select>
@endsection 
@section('custom_js')
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/dropdown-control.js') }}" type="text/javascript"></script>
@endsection        