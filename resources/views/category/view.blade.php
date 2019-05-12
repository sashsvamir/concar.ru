@php
{{
/**
 * @var $model \App\Category
 **/
}}
@endphp


@extends('layouts.base')


@section('title', $model->meta_title)
@section('meta-description', $model->meta_description)
@section('meta-keywords', $model->meta_keywords)



@section('content')

    {!! $model->body !!}

@endsection
