<div class="container">
  <div class="row justify-content-center">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title"><?=  $saskaita['name'] ?> <?= $saskaita['surname'] ?></h5>
      </div>
      <div class="card-body">
        <p class="card-text"><?= $saskaita['account_number'] ?><h5><?= $saskaita['balance']. ' eur' ?></h5></p>
       
           

    <form action="<?= URL . 'saskaitos/transfer/'. $saskaita['id'] ?>" method="post">
      <input type="int" name="balance" class="form-control" placeholder="0.00">
      <button style="margin-bottom: 10px" type="submit" class="btn btn-outline-info mt-4">Nuskaičiuoti</button>
    </form>
    </div> 

  </div>
</div>  