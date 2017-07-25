<div class="coursematerial view large-9 medium-8 columns content">
    <h3><?= h($coursematerial->materialname) ?></h3>

        <?php if(strpos($coursematerial->filetype, 'video')!=false && 
            strpos($coursematerial->filetype, 'audio')!=false){?>
    <?= $this->Html->media(substr($coursematerial->materialfile, 7),[
        'text' => $coursematerial->materialname
    ,'autoplay','controls']) ?>
            <?php }else{?>
    <object data="/detraining/coursematerial/downloadfile/<?= $coursematerial->materialid ?>" 
            type="<?= $coursematerial->filetype ?>" name="<?= $coursematerial->materialname ?>"
            />
            <?php }?>
    
</div>
