@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-sm-3 text-center">
        @include('common/user_data')
    </div>
    <div class="col-sm-9">
        <?php if( !empty($cabinets) ):?>
            <b>Список рекламных кабинетов:</b>
            <ul>
                <?php foreach ($cabinets as $cabinet):?>
                    <li>
                        <a href="/cabinet/<?=$cabinet['account_id']?>/<?=urlencode($cabinet['account_name'])?>"><?=$cabinet['account_name']?></a>
                    </li>
                <?php endforeach;?>
            </ul>
        <?php else:?>
            <p>
                Нет рекламных кабинетов
            </p>
        <?php endif;?>
    </div>
</div>

@endsection
