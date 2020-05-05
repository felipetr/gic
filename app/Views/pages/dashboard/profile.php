<div class="row">
    <div class="col-12 col-lg-6 border-light border-lg-right">
        <form id="profileform" class="font-weight-light text-secondary">
            <h5 class="font-weight-light"><i class="fas fa-address-card"></i> Informações</h5>
            <div class="row">
                <div class="col-12 col-md-12 pb-3">
                    Nome<small class="text-danger">*</small>
                    <input name="nome" class="form-control" value="<?php echo $logged->name; ?>" required>
                </div>
                <div class="col-12 col-xl-6 pb-3">
                    Email<small class="text-danger">*</small>
                    <input type="email" name="email" class="form-control" value="<?php echo $logged->email; ?>" required>
                </div>
                <div class="col-12 col-xl-6 pb-3">
                    Gênero<small class="text-danger">*</small>
                    <select name="gender" class="custom-select" required>
                        <option value="a" <?php if ($logged->gender == 'a') {
                                                echo 'selected';
                                            } ?>>Feminino</option>
                        <option value="o" <?php if ($logged->gender == 'o') {
                                                echo 'selected';
                                            } ?>>Masculino</option>
                        <option value="x" <?php if ($logged->gender == 'x') {
                                                echo 'selected';
                                            } ?>>Prefiro não informar</option>
                    </select>
                </div>
                <div class="col-12 col-xl-6 pb-3">
                    Whatsapp<small class="text-danger">*</small>
                    <input type="text" name="whataspp" class="form-control mobile" value="<?php echo $logged->whatsapp; ?>" required>
                </div>
                <div class="col-12 col-xl-6 pb-3">
                    Móvel 2 <small class="text-secondary">(opcional)</small>
                    <input type="text" name="mobile" class="form-control mobile" value="<?php echo $logged->mobile; ?>">
                </div>
                <div class="col-12 col-xl-6 pb-3">
                    Telefone Comercial <small class="text-secondary">(opcional)</small>
                    <input type="text" name="comercial" class="form-control fixo" value="<?php echo $logged->comercial; ?>">
                </div>
                <div class="col-12 col-xl-6 pb-3">
                    Estado<small class="text-danger">*</small>
                    <select name="state" class="custom-select" required>
                        <option value="AC" <?php if ($logged->state == 'AC') {
                                                echo 'selected';
                                            } ?>>Acre</option>
                        <option value="AL" <?php if ($logged->state == 'AL') {
                                                echo 'selected';
                                            } ?>>Alagoas</option>
                        <option value="AP" <?php if ($logged->state == 'AP') {
                                                echo 'selected';
                                            } ?>>Amapá</option>
                        <option value="AM" <?php if ($logged->state == 'AM') {
                                                echo 'selected';
                                            } ?>>Amazonas</option>
                        <option value="BA" <?php if ($logged->state == 'BA') {
                                                echo 'selected';
                                            } ?>>Bahia</option>
                        <option value="CE" <?php if ($logged->state == 'CE') {
                                                echo 'selected';
                                            } ?>>Ceará</option>
                        <option value="DF" <?php if ($logged->state == 'DF') {
                                                echo 'selected';
                                            } ?>>Distrito Federal</option>
                        <option value="ES" <?php if ($logged->state == 'ES') {
                                                echo 'selected';
                                            } ?>>Espírito Santo</option>
                        <option value="GO" <?php if ($logged->state == 'GO') {
                                                echo 'selected';
                                            } ?>>Goiás</option>
                        <option value="MA" <?php if ($logged->state == 'MA') {
                                                echo 'selected';
                                            } ?>>Maranhão</option>
                        <option value="MT" <?php if ($logged->state == 'MT') {
                                                echo 'selected';
                                            } ?>>Mato Grosso</option>
                        <option value="MS" <?php if ($logged->state == 'MS') {
                                                echo 'selected';
                                            } ?>>Mato Grosso do Sul</option>
                        <option value="MG" <?php if ($logged->state == 'MG') {
                                                echo 'selected';
                                            } ?>>Minas Gerais</option>
                        <option value="PA" <?php if ($logged->state == 'PA') {
                                                echo 'selected';
                                            } ?>>Pará</option>
                        <option value="PB" <?php if ($logged->state == 'PB') {
                                                echo 'selected';
                                            } ?>>Paraíba</option>
                        <option value="PR" <?php if ($logged->state == 'PR') {
                                                echo 'selected';
                                            } ?>>Paraná</option>
                        <option value="PE" <?php if ($logged->state == 'PE') {
                                                echo 'selected';
                                            } ?>>Pernambuco</option>
                        <option value="PI" <?php if ($logged->state == 'PI') {
                                                echo 'selected';
                                            } ?>>Piauí</option>
                        <option value="RJ" <?php if ($logged->state == 'RJ') {
                                                echo 'selected';
                                            } ?>>Rio de Janeiro</option>
                        <option value="RN" <?php if ($logged->state == 'RN') {
                                                echo 'selected';
                                            } ?>>Rio Grande do Norte</option>
                        <option value="RS" <?php if ($logged->state == 'RS') {
                                                echo 'selected';
                                            } ?>>Rio Grande do Sul</option>
                        <option value="RO" <?php if ($logged->state == 'RO') {
                                                echo 'selected';
                                            } ?>>Rondônia</option>
                        <option value="RR" <?php if ($logged->state == 'RR') {
                                                echo 'selected';
                                            } ?>>Roraima</option>
                        <option value="SC" <?php if ($logged->state == 'SC') {
                                                echo 'selected';
                                            } ?>>Santa Catarina</option>
                        <option value="SP" <?php if ($logged->state == 'SP') {
                                                echo 'selected';
                                            } ?>>São Paulo</option>
                        <option value="SE" <?php if ($logged->state == 'SE') {
                                                echo 'selected';
                                            } ?>>Sergipe</option>
                        <option value="TO" <?php if ($logged->state == 'TO') {
                                                echo 'selected';
                                            } ?>>Tocantins</option>
                    </select>
                </div>
                <div class="col-12 col-xl-12 pb-3">
                    Endereço Completo <small class="text-secondary">(opcional)</small>
                    <textarea name="address" class="addresssummernote" required><?php echo $logged->address; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-8">
                </div>
                <div class="col-12 col-md-4">
                    <button class="btn btn-dark text-warning btn-block">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-lg-6">
        <div class="d-block d-lg-none">
            <hr>
        </div>

        <form id="passform" class="font-weight-light text-secondary">
            <h5 class="font-weight-light"><i class="fas fa-key"></i> Segurança</h5>
            <div class="row">
                <div class="col-12 col-md-12 pb-3">
                    Senha Atual:
                    <div class="input-group mb-3 inputgroup-pass">
                        <input required  id="oldpass" name="oldpass" type="password" class="form-control">
                        <div class="input-group-append">
                            <button data-slash="0" class="btn btn-outline-secondary" type="button"><i class="fas fa-eye-slash"></i></button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 pb-3">
                    Nova Senha:
                    <div class="input-group mb-3 inputgroup-pass">
                        <input required id="newpass" name="newpass" type="password" class="form-control">
                        <div class="input-group-append">
                            <button data-slash="0" class="btn btn-outline-secondary" type="button"><i class="fas fa-eye-slash"></i></button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 pb-3">
                    Redigitar Senha:
                    <div class="input-group mb-3 inputgroup-pass">
                        <input required  id="newpass2" name="newpass2" type="password" class="form-control">
                        <div class="input-group-append">
                            <button data-slash="0" class="btn btn-outline-secondary" type="button"><i class="fas fa-eye-slash"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div id="alertbox" style="display: none">
                        <div class="py-3">
                            <div class="alert alert-warning text-left p-2 py-0">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8">
                </div>
                <div class="col-12 col-md-4">
                    <button class="btn btn-dark text-warning btn-block">Alterar</button>
                </div>
            </div>
        </form>

    </div>
</div>