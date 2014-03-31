
<?//php var_dump($sf_context->getConfiguration());die;?>
<?php 
  $app=$sf_context->getConfiguration()->getApplication();
//  echo $app;
 // die;

?>


<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?php echo __('Mostrar Barra de Navegación')?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?php echo __('MyS')?></a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
<!--        <li class="active"><a href="#">Home</a></li>-->
        <li class="dropdown active">
          <?php echo link_to(__('Proveedores').' <b class="caret"></b>', sfLinkCrossApp::linkTo('backend','supplier/index'),array('data-toggle'=>'dropdown', 'class'=>'dropdown-toggle'))?>
          <ul class="dropdown-menu">
            <li>
              <?php echo link_to(__('ABM Proveedores'), sfLinkCrossApp::linkTo('backend','supplier/index'))?>
            </li>
            <li>
                <a href="#"><?php echo __('Pagos')?> <i class="glyphicon glyphicon-chevron-right"></i></a>
                <ul class="dropdown-menu sub-menu">
                  <li>
                    <?php echo link_to(__('Fechas de Pago'), sfLinkCrossApp::linkTo('frontend','paymentDate/index'))?>
                  </li>


                    <!--<li><a href="#">Facturas</a></li>
                    <li><a href="#">Recibos</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Reportes</li>
                    <li><a href="#">Por Poveedor</a></li>
                    <li><a href="#">Por Edificio</a></li>
                    <li><a href="#">Por Fecha de pago</a></li>-->
                </ul>
            </li>
            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <?php echo link_to(__('Edificios').' <b class="caret"></b>', sfLinkCrossApp::linkTo('backend','building/index'),array('data-toggle'=>'dropdown', 'class'=>'dropdown-toggle'))?>
          <ul class="dropdown-menu">
            <li>
              <?php echo link_to(__('ABM Edificios'), sfLinkCrossApp::linkTo('backend','building/index'))?>
            </li>

            <li>
                <a href="#">Reclamos <i class="glyphicon glyphicon-chevron-right"></i></a>
                <ul class="dropdown-menu sub-menu">
                    <li><a href="#">Listado de Reclamos</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Reportes</li>
                    <li><a href="#">Por Edificio</a></li>
                    <li><a href="#">Por Proveedor</a></li>
                </ul>
            </li>

            <li class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
      <div class="navbar-brand navbar-title pull-right">
        <?php if (!include_slot('sectionTitle')): ?>Sistema de Administración<?php endif; ?>
      </div>
    </div>
  </div>
</div>

