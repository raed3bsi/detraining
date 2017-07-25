<script type="text/javascript">
    $(function(){
            $('#njd').tooltip({
                content: $('<div></div>'),
                showEvent: 'click',
                onUpdate: function(content){
                    content.panel({
                        width: 200,
                        border: false,
                        title: 'New job',
                        href: '/detraining/abstractjob/add'
                    });
                },
                onShow: function(){
                    var t = $(this);
                    t.tooltip('tip').unbind().bind('mouseenter', function(){
                        t.tooltip('show');
                    }).bind('mouseleave', function(){
                        t.tooltip('hide');
                    });
                }
            });
        });
    function saveposition(){
        var data=$("#apform");
            var posting=$.post($("#apform").attr('action'),$(data).serialize() );
            $("#w").window('close');
            posting.done(function(data){
                $("#bupdg").datagrid('reload');
                
                
        
                //$("#tid").val(data);
                //alert("testid:"+$("#tid").val());
            });
    }
    
    function cancelposition(){
        $("#w").window('close');
    }
</script>
<div class="positions form large-9 medium-8 columns content">
    <?= $this->Form->create($position,['id' => 'apform']) ?>
    <fieldset>
        <legend><?= __('Add Position') ?></legend>
        <?php
            echo $this->Form->input('positionname',['label' => 'Position name']);
            echo $this->Form->input('sgroupid', ['type' => 'hidden']);
            echo $this->Form->input('jobid', ['label' => 'Job', 'id' => 'pjlist', 'class' => 'easyui-combobox',
                'type' => 'text',
                'data-options' => "url: '/detraining/abstractjob/findlist',valueField: 'jobid',textField: 'jobname'"]);
            echo "<a id='njd' href='#' class='easyui-linkbutton' iconCls='icon-add' plain='true'>Add new job</a>";
            echo $this->Form->input('businessunitid',['type' => 'hidden']);
            echo $this->Form->input('maxnoinstances',['label' => 'Maximum instances']);
        ?>
    </fieldset>
    <a href="#" class="easyui-linkbutton" onclick="saveposition()">Save</a>
    <a href="#" class="easyui-linkbutton" onclick="cancelposition()">Cancel</a>
    <?= $this->Form->end() ?>
</div>
