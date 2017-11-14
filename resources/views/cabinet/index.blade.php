@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-sm-3 text-center">
        <div class="userphoto">
            <?php if(!empty(Auth::user()->avatar)):?>
                <img src="<?=Auth::user()->avatar?>">
            <?php else:?>
                <b>No photo</b>
            <?php endif?>
        </div>

        <div class="username">
            <b><?=Auth::user()->name?></b>
        </div>

    </div>
    <div class="col-sm-9">
        
    </div>
</div>

@endsection
