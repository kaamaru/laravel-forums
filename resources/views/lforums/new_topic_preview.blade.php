@extends('b50/laravel-forums.master')
@section('breadcrumbs', Breadcrumbs::render('forums.show', $forum->parents, 'New topic'))
@section('title', $topic->title)
@section('content')

    <div class="box-header">{{ _('Preview') }}: {{{ $topic->title }}}</div>
    @include('b50/laravel-forums/topics._preview')
@stop
