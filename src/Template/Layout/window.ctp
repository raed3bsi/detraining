<head>
<?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('themes/smoothness/jquery-ui.css') ?>
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('jquery-ui.custom.js') ?>
    
    
    <?= $this->Html->script('jquery.ui-contextmenu.min.js') ?>
    
    <?= $this->Html->css('easyui/themes/default/easyui.css') ?>
    <?= $this->Html->css('easyui/themes/icon.css') ?>
    <?= $this->Html->script('jquery.easyui.min.js') ?>
    <?= $this->Html->script('treegrid-dnd.js') ?>
    
    
    
    

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
          .input-inline {
              display: table-cell !important;
              
              
              
              
          }
          
          
          
    </style>
</head>
<body>
   <?= $this->fetch('content') ?> 
</body>