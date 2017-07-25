<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        
        <?= $this->fetch('title') ?>
    </title>
    

    
    <?= $this->Html->css('themes/smoothness/jquery-ui.css') ?>
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('jquery-ui.custom.js') ?>
    
    
    <?= $this->Html->script('jquery.ui-contextmenu.min.js') ?>
    
    <?= $this->Html->css('easyui/themes/ui-sunny/easyui.css') ?>
    <?= $this->Html->css('easyui/themes/icon.css') ?>
    <?= $this->Html->script('jquery.easyui.min.js') ?>
    <?= $this->Html->script('treegrid-dnd.js') ?>
    <?= $this->Html->script('datagrid-dnd.js') ?>
    
    
    
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style type="text/css">
        .ui-menu {
            width: 180px;
            font-size: 63%;
          }
          
          .canswer{
              display: table-cell;
              margin-bottom: 0px !important;
              margin-top: 0px !important;
              max-width: 600px !important;
          }
          
          
          
    </style>
    <script type="text/javascript">
        $(function (){
            
            $(".wdialog-button").click(function(e){
            e.preventDefault();
                var url=$(this).attr('href');
                $("#w").window('open');
                $("#w").window('refresh',url);
                
        });
            //$(".input-inline").parents('div').first().css("padding","0px");
        });
        
        function menuredirect(url){
            window.location.href=url;
        }
        
        var refdom=null;
        
        function menuwindow(url, rdom=null){
            $("#w").window('open');
            $("#w").window('refresh',url);
            if(rdom!==null){
                refdom=rdom;
            }
        }
        
        function refreshMenu(){
            if(refdom===null){
                return;
            }
            var mid=refdom;
            $.get('/user/reloadmenu/'+mid,null,function(data){
                $("#"+mid).html(data);
                $("#"+mid).find('div').first().menu({});
            });
        }
        
        function cancelwindow(){
            $("#w").window('close');
        }
        
        function savewindow(formid, dataid){
            var data=$("#"+formid);
            console.info($(data).serialize());
            //alert($("#citylist").val());
                var posting=$.post($("#"+formid).attr('action'),$(data).serialize() );
                $("#w").window('close');
                posting.done(function(data){
                    $("#"+dataid).datagrid('reload');
                    


                    //$("#tid").val(data);
                    //alert("testid:"+$("#tid").val());
                });
        }
        
        function savewindowtg(formid, tgid){
            var data=$("#"+formid);
            console.info($(data).serialize());
            //alert($("#citylist").val());
                var posting=$.post($("#"+formid).attr('action'),$(data).serialize() );
                $("#w").window('close');
                posting.done(function(data){
                    $("#"+tgid).treegrid('reload');
                    


                    //$("#tid").val(data);
                    //alert("testid:"+$("#tid").val());
                });
        }
        
        function removeitem(url, dataid){
            
            //alert($("#citylist").val());
                var posting=$.post(url);
                posting.done(function(data){
                    $("#"+dataid).datagrid('reload');


                    //$("#tid").val(data);
                    //alert("testid:"+$("#tid").val());
                });
        }
        
    function removeconfirmdialog(dialogid, url, dataelem){
        console.info("remove confirm with 3 params called");
        removeconfirmdialog(dialogid,url,dataelem,new Array());
    }
        
    function removeconfirmdialog(dialogid, urla, dataelem, pidesx){
        var pides=new Array();
        if(pidesx!==undefined){
            pides=pidesx;
        }
        console.info(pides);
        var url=urla;
        var params=new Array();
        var datastring="";
            $("#"+dialogid).dialog({
                closed: false,
                cache: false,
                modal: true,
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: [{
                text:'Yes',
                iconCls:'icon-ok',
                handler:function(){
                    if(pides.length>0){
                        params=new Array(pides.length);
                        for(var i=0;i<pides.length;i++){
                            params[i]='"'+pides[i]+'":"'+$("#"+pides[i]).val()+'"';
                        }
                        datastring='{'+params.join(",")+'}';
                        console.info(datastring);
                    }
                    $( "#confirmdialog" ).dialog( 'close' );
                    $.ajax({
                    url: url,
                    type: 'POST',
                    data: datastring==''? '':jQuery.parseJSON(datastring),
                    
                    success: function (data, textStatus, jqXHR) {
                        var delemtype=$("#"+dataelem).attr('class');
                        if(delemtype.includes('treegrid')){
                            $("#"+dataelem).treegrid('reload');
                        }
                        else{
                            $("#"+dataelem).datagrid('reload');
                        }
                                
                            
                            $("#cdpg").propertygrid('reload');
                        }
                    });
                    //window.location.href= "/coursetopic/delete/"+node.key;
                }
            }
            ,{
                text:'No',
                handler:function(){
                    $( "#confirmdialog" ).dialog( 'close' );
                }
            }]
        });
        
    }
    
    function openwindow(url){
        $("#w").window('open');
        $("#w").window('refresh',url);
    }
    </script>
    
</head>
<body>
    <div class="easyui-layout" data-options="fit:true" style="width: 100%; height: 100%;">
        <div data-options="region:'north'" style="height:80px">
            <nav class="top-bar expanded" data-topbar role="navigation">
                <ul class="title-area large-3 medium-4 columns">
                    <li class="name">
                        <h1><a href="/">Home</a></h1>
                    </li>
                    
                </ul>
                
            </nav>
            <?= $this->Flash->render() ?>
        </div>
        <div data-options="region:'south',split:true" style="height:30px;"></div>
        <div data-options="region:'west'" style="width: 200px;">
            <?php if(isset($menu)):
                    foreach ($menu as $mm):
            ?>
            <?= $this->element('general/menu', ['mm' => $mm]) ?>
            <?php endforeach;
                    endif;
            ?>
        </div>
        <div data-options="region:'center'">
        <?= $this->fetch('content') ?>
            </div>
    </div>
    <div id="w" class="easyui-window" title="Modal Window" data-options="modal:true,closed:true,iconCls:'icon-save'" style="width:70%;height:70%;padding:10px;">
        
    </div>
    
    
    
    

</body>
</html>
