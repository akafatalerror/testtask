@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-sm-3 text-center">
        @include('common/user_data')
    </div>
    <div class="col-sm-9">
        <h4><?=$cabinet_name?> / <?=$campaign_name?> </h4>
        <div style="margin-bottom:20px;">
            <a href="/cabinet/<?=$cabinet_id?>/<?=$cabinet_name?>">< К списку кампаний</a>
        </div>
        <?php if( !empty($ads) ):?>
            <p>
                Список объявлений:
            </p>

                <?php foreach ($ads as $ad):?>
                    <hr />
                    <b><?=$ad['name']?></b>
                    <table class="table table-bordered">
                        <?php foreach ($ad as $name => $value):  ?>
                            <?php $field_data = \App\Services\AdService::proccess_ad_name($name, $value)?>
                            <tr>
                                <td><?=$field_data['name']?></td>
                                <td><?=$field_data['value']?></td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                <?php endforeach;?>

            </ul>
        <?php else: ?>
            <p>
                Список объявлений пуст
            </p>

        <?php endif;?>
    </div>
</div>

@endsection
