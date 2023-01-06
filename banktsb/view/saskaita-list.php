<div class="container">
        <div class="row justify-content-center">
<?php foreach($saskaitos as $saskaita) : ?>
  <div class="card" style="margin-bottom: 5px">
    <div class="card-header">
      <h5 class="card-title"><?=  $saskaita['name'] ?> <?= $saskaita['surname'] ?> <?= $saskaita['personal_id'] ?></h5>
    </div>
  <div class="card-body">
    <p class="card-text"><?= $saskaita['account_number'] ?><h5> Likutis: <?= (float)$saskaita['balance']. ' eur'?></h5></p>
    <?php if(isset($error0) && $li['id'] == $_GET['id']) : ?>
            <div class="col-6">
                <div class="alert alert-danger m-4" role="alert">
                  
                    <?= $error0 ?>
                </div>
            </div>
            <?php endif ?>

            
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
