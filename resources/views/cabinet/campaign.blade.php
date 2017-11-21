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
                    <div class="row ad_<?=$ad['id']?>">
                        <div class="col-sm-12">
                            <div class="title row">
                                <div class="name pull-left col-sm-9">
                                    <b><?=$ad['name']?></b>
                                </div>
                                <div class="delbtn col-sm-3 text-right">
                                    <a href="#" class="delete_ad btn btn-default" data-id="<?=$ad['id']?>">&times; Удалить</a>
                                </div>
                            </div>

                            <table class="table table-bordered">
                                <?php foreach ($ad as $name => $value):  ?>
                                    <?php $field_data = \App\Services\AdService::proccess_ad_name($name, $value)?>
                                    <tr>
                                        <td><?=$field_data['name']?></td>
                                        <td><?=$field_data['value']?></td>
                                    </tr>
                                <?php endforeach ?>
                                    <tr>
                                        <td colspan="2">
                                            <div class="comment_container">
                                                <b>Комментарий</b>:<br />
                                                <textarea id="comment_<?=$ad['id']?>" style="width:100%" maxlength="100"><?=@$comments[$ad['id']]?></textarea>
                                                <p>
                                                    Максимум 100 символов
                                                </p>
                                                <a href="#" class="btn btn-default save_comment" data-id="<?=$ad['id']?>">Сохранить</a>
                                            </div>
                                        </td>
                                    </tr>
                            </table>
                        </div>
                    </div>

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


@section('scripts')
<script>
    $(function(){

        $('.delete_ad').click(function(){
            var el = $(this);

            $.ajax({
                url: '/campaign/delete',
                type : 'post',
                data : { account_id : <?=$cabinet_id?>, ad_id : $(el).data('id')},
                success : function(data){

                    // data = jQuery.parseJSON(data);

                    if( data.ok == 1 ) {
                        $('.ad_'+$(el).data('id')).remove();
                    } else {
                        alert(data.error);
                    }

                }
            });
            return false;
        });


        $('.save_comment').click(function(){
            var el = $(this);

            $.ajax({
                url: '/campaign/comment',
                type : 'post',
                data : { vk_id : $(el).data('id'), 'comment' : $(el).siblings('textarea').val()},
                success : function(data){
                    alert('Комментарий успешно сохранен');
                },
                error : function(xhdr) {

                    data = jQuery.parseJSON(xhdr.responseText);
                    // alert(data.error);
                    alert(data.message);
                }
            });
            return false;
        });
    });
</script>
@endsection
