<?php
session_start();
// if (!file_exists(__DIR__ .'/cliens')) {
//     $arr = [];
// } else {
//     $arr = unserialize(file_get_contents(__DIR__ .'/cliens'));
    
// }
// if(isset($senaData)){
//     print_r($senaData);
//     die;
// }

$account_number = 'LT82'.' '. '7300'.' '.'0'.rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9).' '.rand(0,9).rand(0,9).rand(0,9).rand(0,9);

?>

<div class="container">
    <div class="row justify-content-center">
         <?php if(isset($successNew)) : ?>
            <div class="col-6" style="justify-content: center; display: flex">
                <div class="alert alert-success m-4 d-flex align-items-center" style="text-align: center" role="alert">
                    
                <?= $successNew ?>
                </div>
            </div>
            <?php endif ?>
    
        <?php if(isset($errorName) ) : ?>
            <div class="col-6">
                <div class="alert alert-danger m-4" role="alert">
                     <?= $errorName ?>
                </div>
        </div>
                <?php endif ?>
                <?php if(isset($errorId) ) : ?>
                <div class="col-6">
                    <div class="alert alert-danger m-4" role="alert">
                  
                    <?= $errorId ?>
                </div>
            </div>
                <?php endif ?>

                <?php if(isset($errorUniqueID) ) : ?>
                <div class="col-6">
                    <div class="alert alert-danger m-4" role="alert">
                  
                    <?= $errorUniqueID ?>
                </div>
            </div>
                <?php endif ?>

                <?php if(isset($errorsMsg) ) : ?>
                <div class="col-6">
                    <div class="alert alert-danger m-4" role="alert">
                  
                    <?= print_r($errorsMsg) ?>
                </div>
            </div>
                <?php endif ?>

                

        <div class="col-7" style="margin-top: 0">
            <div class="card m-4">
                
                


                    <div class="card-header" style="text-align: center; color: #006394; font-weight: bold; letter-spacing: 1px; font-size: 18px">
                        Sukurti naują sąskaitą
                    </div>
                    <div class="card-body">
                        <form action="<?= URL ?>saskaitos/save" method="post">
                            <div class="mb-3">
                                <label class="form-label">Vardas</label>
                                <input type="text" name="name" class="form-control" placeholder="vardas"  value="<?= isset($senaData['name']) ? $senaData['name'] : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pavardė</label>
                                <input type="text" name="surname" class="form-control" placeholder="pavardė" value="<?= isset($senaData['surname']) ? $senaData['surname'] : ''; ?>">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Asmens kodas</label>
                                <input type="text" name="personal_id" class="form-control" placeholder="asmens kodas" value="<?= isset($senaData['personal_id']) ? $senaData['personal_id'] : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sąskaitos numeris</label>
                                <input type="text" name="account_number" class="form-control" placeholder="account number" value="<?= $account_number ?>" readonly>
                            </div>
                            <div class="mb-3" style="justify-content: center; display: flex">
                                <button type="submit" class="btn btn-outline-info mt-4">Patvirtinti</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

</div>
    </div>