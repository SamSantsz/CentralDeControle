<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-body">
            <form method="POST" action="CRUD/CADASTRA/cadastra_ips.php" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <label for="ipR" class="form-label">IP</label>
                        <input type="text" class="form-control" id="ipR" name="ipR" required>
                        <div class="invalid-feedback">
                            IP válido é obrigatório.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="nserieR" class="form-label">N° De Serie</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">#</span>
                            <input type="text" class="form-control" id="nserieR" name="nserieR" placeholder="" required>
                            <div class="invalid-feedback">
                                E-mail válido é obrigatório.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="nmacR" class="form-label">MAC</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text">&</span>
                            <input type="text" class="form-control" id="nmacR" name="nmacR">
                            <div class="invalid-feedback">
                                E-mail válido é obrigatório.
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            N° Whatsapp válido
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="lojaR" class="form-label">Loja</label>
                        <select class="form-select" id="lojaR" name="lojaR" required>
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
                        <label for="equipR" class="form-label">Equipamento</label>
                        <select class="form-select" id="equipR" name="equipR" required>
                            <option value="">...</option>
                            <option>Caixa</option>
                            <option>Computador</option>
                            <option>Telefone</option>
                            <option>MFE</option>
                            <option>Impressora</option>
                        </select>
                        <div class="invalid-feedback">
                            Selecione uma Equipamento válida.
                        </div>
                    </div>

                    <hr>

                    <div class="col-12">
                        <label for="patrimonioR" class="form-label">Patrimonio</label>
                        <input type="numver" class="form-control" id="patrimonioR" name="patrimonioR" rows="3">
                    </div>

                    <div class="col-12">
                        <label for="ramalR" class="form-label">Ramal</label>
                        <input type="number" class="form-control" id="ramalR" name="ramalR">
                    </div>

                    <div class="col-md-4">
                        <label for="ncaixaR" class="form-label">N° da Estação</label>
                        <input type="number" class="form-control" id="ncaixaR" name="ncaixaR">
                    </div>

                    <div class="col-md-4">
                    </div>

                    <div class="col-md-4">
                        <label for="numeroR" class="form-label">Caixa do MFE</label>
                        <input type="number" class="form-control" id="numeroR" name="numeroR">
                    </div>

                    <div class="col-md-6">
                        <label for="localR" class="form-label">Local</label>
                        <select class="form-select" id="localR" name="localR" required>
                            <option value="">...</option>
                            <option>Frente de Loja</option>
                            <option>Recebimento</option>
                            <option>Preços</option>
                            <option>Recepção</option>
                            <option>DP ou RH</option>
                            <option>Padaria</option>
                            <option>Comercial</option>
                            <option>DTI</option>
                            <option>Fiscal</option>
                            <option>Financeiro</option>
                        </select>
                        <div class="invalid-feedback">
                            Selecione uma Equipamento válida.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="modeloR" class="form-label">Modelo</label>
                        <select class="form-select" id="modeloR" name="modeloR" required>
                            <option value="">...</option>
                            <option>M2040dn</option>
                            <option>M2035dn</option>
                            <option>FS 1025MFP</option>
                            <option>Canon</option>
                            <option>Ricoh</option>
                        </select>
                        <div class="invalid-feedback">
                            Selecione uma Equipamento válida.
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