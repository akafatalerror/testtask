@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-sm-3 text-center">
        @include('common/user_data')
    </div>
    <div class="col-sm-9">
        <h4><?=$cabinet_name?></h4>
        <div style="margin-bottom:20px;">
            <a href="/cabinet">< К списку кабинетов</a>
        </div>
        <?php if( !empty($campaigns) ):?>
            <p>
                Список кампаний:
            </p>
            <ul>
                <?php foreach ($campaigns as $campaign):?>
                    <li>
                        <a href="/campaign/<?=$cabinet_id?>/<?=$cabinet_name?>/<?=$campaign['id']?>/<?=$campaign['name']?>"><?=$campaign['name']?></a>
                    </li>
                <?php endforeach;?>
            </ul>
        <?php else: ?>
            <p>
                Список кампаний пуст
            </p>

        <?php endif;?>
    </div>
</div>

@endsection
