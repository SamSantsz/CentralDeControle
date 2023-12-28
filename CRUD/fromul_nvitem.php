<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <form method="POST" action="CRUD/CADASTRA/cadastra_estoque.php?detalhe=<?php echo $row['id']; ?>" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="iditem" class="form-label">ID Item</label>
                        <input class="form-control" type="text" id="iditem" name="iditem" value="<?php echo $row['id']; ?>" required readonly>
                        <div class="invalid-feedback">
                            Nome válido é obrigatório.
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input class="form-control" type="text" id="descricao" name="descricao" value="<?php echo $row['descricaoI']; ?>" required readonly>
                        <div class="invalid-feedback">
                            Nome válido é obrigatório.
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="nserie" class="form-label">N° Série</label>
                        <input type="text" class="form-control" id="nserie" name="nserie" required>
                        <div class="invalid-feedback">
                            Nome válido é obrigatório.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="loja" class="form-label">Loja</label>
                        <select class="form-select" id="loja" name="loja" required>
                            <option value="">Moranguinho...</option>
                            <option>Matriz</option>
                            <option>Avenida</option>
                            <option>São Francisco</option>
                            <option>Coneito</option>
                            <option>CD</option>
                            <option>Jangada Casc</option>
                            <option>Horizonte</option>
                            <option>Filial</option>
                            <option>Shopping</option>
                            <option>Jangada Hori</option>
                            <option>Barreira</option>
                            <option>Buriti</option>
                            <option>Beberibe</option>
                            <option>Nova Barreira</option>
                        </select>
                        <div class="invalid-feedback">
                            Selecione uma Loja válida.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="setor" class="form-label">Setor</label>
                        <select class="form-select" id="setor" name="setor" required>
                            <option value="">Setor...</option>
                            <option>Frente de Loja</option>
                            <option>Recebimento</option>
                            <option>PDV</option>
                            <option>Salão</option>
                            <option>TI</option>
                            <option>Comercial Casc</option>
                            <option>DP</option>
                            <option>RH</option>
                            <option>Financeiro</option>
                            <option>Padaria</option>
                            <option>Chegue Pague</option>
                            <option>Frigorífico</option>
                            <option>Cartaz</option>
                            <option>DTI</option>
                            <option>Recepção</option>
                            <option>Preços</option>
                            <option>Entregas</option>
                        </select>
                        <div class="invalid-feedback">
                            Selecione um Setor válido.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="pdv" class="form-label">PDV <span class="text-body-secondary">(Optional)</span></label>
                        <input type="number" class="form-control" id="pdv" name="pdv" placeholder="Caixa...">
                    </div>

                    <div class="col-md-4">

                    </div>

                    <div class="col-md-4">

                    </div>

                    <div class="col-md-4">
                        <label for="status" class="form-label">Situação</label>
                        <input type="text" class="form-control" id="status" name="status" placeholder="Funcionando" required readonly>
                        <div class="invalid-feedback">
                            Situacao do Equipamento
                        </div>
                    </div>
                </div>
                <br>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fecha</button>
                    <input type="submit" value="Salvar" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>