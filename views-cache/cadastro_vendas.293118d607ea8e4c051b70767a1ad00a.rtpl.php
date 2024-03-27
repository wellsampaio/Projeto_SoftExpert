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
                  <h3 class="card-title">Vendas</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <div class="row">


                    <div class="form-group col-md-2">
                      <button type="button" class="btn btn-default btn-flat btn-block" data-toggle="modal" data-target="#modal-xl">
                        <i class="fa fa-barcode"></i> Cadastrar Venda</button>
                    </div>

                   

                  </div>

                  <table id="example" class="table table-striped nowrap" style="width:100%">
                    <thead>
                      <tr>
                        <th style="font-size: 13px;">Id Venda</th>
                        <th style="font-size: 13px">Valor Total</th>
                        <th style="font-size: 13px">Total Imposto</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $counter1=-1;  if( isset($vendas) && ( is_array($vendas) || $vendas instanceof Traversable ) && sizeof($vendas) ) foreach( $vendas as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                         
                            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["idvenda"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["valor_total"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td style="font-size: 12px"><?php echo htmlspecialchars( $value1["total_impostos"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th style="font-size: 13px;">Id Venda</th>
                        <th style="font-size: 13px">Valor Total</th>
                        <th style="font-size: 13px">Total Imposto</th>
                      </tr>
                    </tfoot>
                  </table>


                </div>

                <div class="modal fade" id="modal-xl">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-header bg-primary text-white">
                        <h4 class="modal-title">Cadastrar Venda</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    

                    <form class="form-horizontal" action="/vendas" method="post">
                      <div class="modal-body">
                        <div class="card-body">
                           
                            <div id="app">
                              
                              <div class="row">
                                <div class="col-md-5">
                                  <div class="form-group">
                                    <label style="font-size: 14px;">Total Itens</label>
                                    <input type="text" class="form-control form-control-sm rounded-0 total_geral" name="valor_total" v-model="totalGeral" readonly>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label style="font-size: 14px;">Total Imposto</label>
                                    <input type="text" class="form-control form-control-sm rounded-0 total_geral" name="total_impostos" v-model="totalGeralImposto" readonly>
                                  </div>
                                </div>
                                <div class="form-group" style="margin-top: 35px; max-width: 5px; margin-left: 10px;">
                                  <button type="button" class="btn btn-xs add-btn" @click="adicionarItem"><i class="fa fa-plus" style="color: green"></i></button>
                                </div>
                              </div>

                              
                              <div class="row" v-for="(item, index) in items" :key="index">
                                
                               

                               
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label style="font-size: 14px;">Produto</label>
                                    <select class="form-control form-control-sm rounded-0 produto" v-model="item.produto" @change="carregarDados(index)" required>
                                      <option value=""></option>
                                      <option v-for="produto in produtos" :value="produto">{{ produto }}</option>
                                    </select>
                                  </div>
                                </div>
                            
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label style="font-size: 14px;">Tipo produto</label>
                                    <input type="text" class="form-control form-control-sm rounded-0 tipoproduto" v-model="item.tipoproduto" readonly>
                                  </div>
                                </div>
                            
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label style="font-size: 14px;">Preço</label>
                                    <input type="number" class="form-control form-control-sm rounded-0 preco" v-model="item.preco" readonly>
                                  </div>
                                </div>
                            
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label style="font-size: 14px;">Icms</label>
                                    <input type="number" class="form-control form-control-sm rounded-0 icms" v-model="item.icms" readonly>
                                  </div>
                                </div>
                            
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label style="font-size: 14px;">Pis</label>
                                    <input type="number" class="form-control form-control-sm rounded-0 pis" v-model="item.pis" readonly>
                                  </div>
                                </div>
                            
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label style="font-size: 14px;">Cofins</label>
                                    <input type="number" class="form-control form-control-sm rounded-0 cofins" v-model="item.cofins" readonly>
                                  </div>
                                </div>
                            
                            
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label style="font-size: 14px;">Qtde</label>
                                    <input type="number" class="form-control form-control-sm rounded-0 qtde" v-model="item.qtde" @input="calcularTotal(index)">
                                  </div>
                                </div>
                            
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label style="font-size: 14px;">Vlr Total</label>
                                    <input type="text" class="form-control form-control-sm rounded-0 total_item" v-model="item.total_item" readonly>
                                  </div>
                                </div>


                                
                                <div class="col-md-1">
                                  <div class="form-group">
                                    <label style="font-size: 14px;">Imposto</label>
                                    <input type="text" class="form-control form-control-sm rounded-0 total_item_imposto" v-model="item.total_item_imposto" readonly>
                                  </div>
                                </div>

                             
                                  <div class="form-group" style="margin-top: 35px; max-width: 5px">
                                    <!-- Botão de remover item -->
                                    <button type="button" class="btn btn-xs btn-sm" @click="removerItem(index)"><i class="fa fa-minus" style="color: red"></i></button>
                                  </div>

                            
                                <div class="form-group" style="margin-top: 35px; max-width: 5px; margin-left: 10px;">
                                  <button type="button" class="btn btn-xs add-btn" @click="adicionarItem"><i class="fa fa-plus" style="color: green"></i></button>
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
<script src="/res/site/js/vue@3.js"></script>
<!-- AdminLTE App -->
<script src="/res/site/js/adminlte.min.js"></script>

<script src="/res/site/js/urlGlobal.js"></script>

<script src="/res/site/js/produtos.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- Page specific script -->

</body>
</html>
