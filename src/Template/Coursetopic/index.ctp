<script type="text/javascript">
   
   function onContextMenu(e,row){
            if (row){
                e.preventDefault();
                console.info(row);
                $(this).treegrid('select', row.topicid);
                if(row.parenttopicid==null){
                    $('#mm').find('.nonroot').hide();
                }else{
                    $('#mm').find('.nonroot').show();
                }
                $('#mm').menu('show',{
                    left: e.pageX,
                    top: e.pageY
                });                
            }
        }
    function edittopic(){
        var node = $('#ctopictg').treegrid('getSelected');
            if (node){
                
                var url= "/coursetopic/edit/"+node.topicid;
                newtopicwindow(url);
                //$('#tg').treegrid('remove', node.id);
            }
    }
    function removetopic(){
        var node = $('#ctopictg').treegrid('getSelected');
        if(node){
            if(node.parenttopicid===null){
                alert("You can not remove a root topic");
                return;
            }
            $("#confirmdialog").children("p").replaceWith($("#cdpattern").html().replace("%t",node.topictitle));
            var url="/coursetopic/delete/"+node.topicid;
            removeconfirmdialog("confirmdialog",url,"ctopictg");
                
        }
        
    }
    
    function viewdetails(){
        var node = $('#ctopictg').treegrid('getSelected');
        if(node){
            window.location.href="/coursetopic/view/"+node.topicid;
        }
        
    }
    
    function addtopic(hitmode){
        var node = $('#ctopictg').treegrid('getSelected');
        if(node){
            if(node.parenttopicid==null && !(hitmode=='over' || hitmode=='append')){
                alert('You can not add a topic after or before a root topic');
                return;
            }
            var url= "/coursetopic/add/"+node.topicid+"/"+hitmode;
            newtopicwindow(url);
        }
    }
    
    function newtopicwindow(url){
        $("#w").window('open');
        $("#w").window('refresh',url);
    }
    
    function moveNode(targetRow,sourceRow,point){
        //alert(targetRow.key.key+"/"+sourceRow.key.key+"/"+point);
        if(targetRow.parenttopicid==null && !(point=='over' || point=='append')){
                alert('You can not move a topic after or before a root topic');
                $("#ctopictg").treegrid("reload");
                return;
            }
        $.ajax({
               url: "/coursetopic/moveNode/"+sourceRow.topicid+"/"+targetRow.topicid+"/"+point,
               success: function (data, textStatus, jqXHR) {
                           //alert("node moved");
                       }
            });
    }
    function addtest(cid){
        var node = $('#ctopictg').treegrid('getSelected');
        if(node){
            window.location.href= "/coursetopic/addtest/"+node.key+"/"+cid;
        }
    }
</script>

<div class="coursetopic index large-9 medium-8 columns content">
    <h3><?= __('Coursetopic') ?></h3>
    
        
    
    <table id="ctopictg" title="Topics" class="easyui-treegrid" style="width: 100%"
           data-options="
           url: '/coursetopic/loadContents',method:'get',rownumbers: true,idField:'topicid',treeField:'topictitle',
           onLoadSuccess: function(row){
                $(this).treegrid('enableDnd', row?row.id:null);
            },
            onContextMenu: onContextMenu,
            onDrop: moveNode">
        <thead>
            <tr>
                <th data-options="field:'topictitle'" width="60%">Topic title</td>
                <th data-options="field:'traininghours'" width="20%">Hours</td>
            </tr>
        </thead>
        
    </table>
    <div id="mm" class="easyui-menu" style="width:120px;">
        <div onclick="edittopic()" data-options="iconCls:'icon-edit'">Edit</div>
        <div class="nonroot" onclick="removetopic()" data-options="iconCls:'icon-remove'">Remove</div>
        <div onclick="viewdetails()" >View details</div>
        <div class="menu-sep"></div>
        <div onclick="addtopic('over')">Add sub-topic</div>
        <div class="nonroot" onclick="addtopic('after')">Add topic after</div>
        <div class="nonroot" onclick="addtopic('before')">Add topic before</div>
        <div class="menu-sep"></div>
        <?php         foreach ($tcats as $ttc):?>
        <div onclick="addtest(<?= $ttc->tcategoryid ?>)">Add <?= $ttc->tcategoryname ?></div>
        <?php         endforeach;?>
    </div>
    
    
</div>

<div id="confirmdialog" style="display: none;width:400px;height:200px;padding:10px">
    <p>
        </p>
    
    </div>

<div id="cdpattern" style="display: none;">
    <p>
    <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
        Are you sure you want to remove "%t" and all its contents?
        </p>
</div>