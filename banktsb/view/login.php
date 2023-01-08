<div class="container">
        <div class="row justify-content-center">
            <?php if(isset($errorLogin)) : ?>
            <div class="col-6" style="justify-content: center; display: flex">
                <div class="alert alert-danger m-4" role="alert">
                    <?= $errorLogin ?>
                </div>
            </div>
            <?php endif ?>
            <div class="col-7">
                <div class="card m-4">
                    <div class="card-header" style="text-align: center; color: #006394; font-weight: bold; letter-spacing: 1px; font-size: 18px">
                        Prisijungimas
                    </div>
                    <div class="card-body">
                        <form action="<?= URL ?>login" method="post" method="post">
                            <div class="mb-3">
                                <label class="form-label">Vardas</label>
                                <input type="text" name="name" class="form-control" placeholder="vardas">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Slaptažodis</label>
                                <input type="password" name="psw" class="form-control" placeholder="slaptažodis">
                                <div style="justify-content: center; display: flex">
                                <button type="submit" class="btn btn-outline-info mt-4" style="text-align: center; justify-content: center">Prisijungti</button>
                        </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>