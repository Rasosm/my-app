<div class="container">
    <div class="row justify-content-center">
           <?php if(isset($successNew)) : ?>
            <div class="col-4" style="justify-content: center; display: flex">
                <div class="alert alert-success d-flex align-items-center" style="text-align: center" role="alert">
                    
                <?= $successNew ?>
                </div>
            </div>
            <?php endif ?>
    <?php if(isset($error0)) : ?>
            <div class="col-6">
                <div class="alert alert-danger m-4" role="alert">
                  
                    <?= $error0 ?>
                </div>
            </div>
            <?php endif ?>
<?php foreach($saskaitos as $saskaita) : ?>
  <div class="card" style="margin-bottom: 5px">
    <div class="card-header" style="display: inherit">
      <p class="card-title"style="font-size: 18px; font-weight: bold; line-height: 1.3"><?=  $saskaita['name'] ?> <?= $saskaita['surname'] ?></p>
      <p class="card-title" style="margin-left: 7px;">a.k. <?= $saskaita['personal_id'] ?></p>
    </div>
  <div class="card-body">
    <p class="card-text"><?= $saskaita['account_number'] ?><p style="font-weight: bold"> Likutis: <?= (float)$saskaita['balance']. ' eur'?></p></p>

            
    <div>
    <form action="<?= URL . 'saskaitos/delete/'. $saskaita['id'] ?>" method="post">
        <button  style="float: right; color: red;" type="submit" class="btn btn-outline-info mt-4">Ištrinti</button>
        </form>
        <button type="submit" class="btn btn-outline-info mt-4"style="margin-right: 5px"><a style="text-decoration: none" href="<?= URL . 'saskaitos/add/'. $saskaita['id'] ?>">Pridėti lėšas</a></button>
        <button type="submit" class="btn btn-outline-info mt-4"><a style="text-decoration: none" href="<?= URL . 'saskaitos/transfer/'. $saskaita['id'] ?>">Nuskaičiuoti lėšas</a></button>
    </div>
    </div>
    </div>
    
  
<?php endforeach ?>

</div>
        </div>
