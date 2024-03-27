<?php if(!class_exists('Rain\Tpl')){exit;}?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">

            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">


          <div class="row">
            <div class="col-12">


              <div class="card" id="card" id="setTimes">
                <div class="card-header">
                  <h3 class="card-title">Cadastrar Produtos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <div class="row">


                    <div class="form-group col-md-3">
                      <button type="button" class="btn btn-default btn-flat btn-block" data-toggle="modal" data-target="#modal-lg">
                        <i class="fa fa-barcode"></i> Cadastrar Tipo Produto</button>
                    </div>

                    <div class="form-group col-md-3">
                      <button type="button" class="btn btn-default btn-flat btn-block" data-toggle="modal" data-target="#modal-default">
                        <i class="fa fa-shopping-basket"></i> Cadastrar Produto</button>
                    </div>

                  </div>

                  <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                      <tr>
                        <th style="font-size: 13px;">Id produto</th>
                        <th style="font-size: 13px">Tipo produto</th>
                        <th style="font-size: 13px">Produto</th>
                        <th style="font-size: 13px;">Preco</th>
                        <th style="font-size: 13px;">Icms</th>
                        <th style="font-size: 13px;">Pis</th>
                        <th style="font-size: 13px;">Cofins</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $counter1=-1;  if( isset($produtos) && ( is_array($produtos) || $produtos instanceof Traversable ) && sizeof($produtos) ) foreach( $produtos as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                         
                            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["idproduto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["tipoproduto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["produto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["preco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["icms"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["pis"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["cofins"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                           
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="font-size: 13px;">Id produto</th>
                        <th style="font-size: 13px">Tipo produto</th>
                        <th style="font-size: 13px">Produto</th>
                        <th style="font-size: 13px;">Preco</th>
                        <th style="font-size: 13px;">Icms</th>
                        <th style="font-size: 13px;">Pis</th>
                        <th style="font-size: 13px;">Cofins</th>
                      </tr>
                    </tfoot>
                  </table>


                </div>

                <div class="modal fade" id="modal-lg">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h4 class="modal-title">Cadastrar Tipo Produto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    

                    <form class="form-horizontal" action="/tipoproduto" method="post">
                      <div class="modal-body">
                        <div class="card-body">





                          <div class="row">

                           
                          <div class="row">
                            
                            <div class="col-md-3">
                              <div class="form-group">
                                <label style="font-size: 14px;">Tipo Produto</label>
                                <input type="text" id="tipoproduto" class="form-control form-control-sm rounded-0"
                                 name="tipoproduto">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label style="font-size: 14px;">Icms</label>
                                <input type="text" id="icms" onkeypress="$(this).mask('###.##', {reverse: true});" class="form-control form-control-sm rounded-0"
                                 name="icms">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label style="font-size: 14px;">Pis</label>
                                <input type="text" onkeypress="$(this).mask('###.##', {reverse: true});" id="pis" class="form-control form-control-sm rounded-0"
                                 name="pis">
                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <label style="font-size: 14px;">Cofins</label>
                                <input type="text" id="cofins" onkeypress="$(this).mask('###.##', {reverse: true});" class="form-control form-control-sm rounded-0"
                                 name="cofins">
                              </div>
                            </div>
  
                          </div>
                          </div>
                        </div>

                      </div>

                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="Submit" id="enviar" name="enviar" class="btn btn-success botton"
                        > Salvar</button>
                        

                      </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
                </form>
              </div>
              <!-- /.modal -->
                

                <div class="modal fade" id="modal-default">
                  <div class="modal-dialog modal-default">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h4 class="modal-title">Cadastrar Produto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form class="form-horizontal" action="/produto" method="post">
                        <div class="modal-body">
                          <div class="card-body">

                           <div class="row">

                             
                            <div class="row">
                              
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label style="font-size: 14px;">Produto</label>
                                  <input type="text" id="produto" class="form-control form-control-sm rounded-0"
                                  name="produto">
                                </div>
                              </div>

                              <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Tipo Produto</label>
                                <select class="form-control form-control-sm rounded-0 js-example-basic-single" style="width: 100%;" id="idtomador" name="idtipoproduto">
                                  <option></option>
                                  <?php $counter1=-1;  if( isset($tipoproduto) && ( is_array($tipoproduto) || $tipoproduto instanceof Traversable ) && sizeof($tipoproduto) ) foreach( $tipoproduto as $key1 => $value1 ){ $counter1++; ?>
                                    <option value="<?php echo htmlspecialchars( $value1["idtipoproduto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["tipoproduto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                  <?php } ?>
                                 </select>
                              </div>
                              

                              <div class="form-group col-md-6">
                                <label for="exampleInputPassword1">Preço</label>
                                <input type="text" id="preco" onkeypress="$(this).mask('####.##', {reverse: true});" class="form-control form-control-sm rounded-0"
                                  name="preco">
                              </div>

    
                            </div>
                            </div>
                          </div>

                        </div>

                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <button type="Submit" id="enviar" name="enviar" class="btn btn-success botton"
                          > Salvar</button>
                          
                        </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                  </form>
                </div>
                <!-- /.modal -->

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require $this->checkTemplate("footer");?>

  </div>
<!-- jQuery -->
<script src="/res/site/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/res/site/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="/res/site/plugins/select2/js/select2.full.min.js"></script>

<!-- AdminLTE App -->
<script src="/res/site/js/adminlte.min.js"></script>
<script src="/res/site/js/jquery.mask.min.js"></script>

<script type="text/javascript">
  
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>





<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->

</body>
</html>
