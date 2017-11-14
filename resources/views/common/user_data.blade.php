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
