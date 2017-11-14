@extends('layout.main')

@section('content')
<?php if( Auth::guest() ):?>
    <a href="/home/vk">Vk auth</a>
<?php else:?>
    <a href="/cabinet">Личный кабинет</a>
<?php endif;?>
@endsection
