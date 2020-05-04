@extends('layout.master_front')



@section('section_header')
<h1>{{$subject->subject}}</h1>
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Home</a></div>
  <div class="breadcrumb-item active"><a href="#">Subject</a></div>
<div class="breadcrumb-item">{{$subject->subject}}</div>
</div>
@endsection