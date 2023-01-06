<div class="container">
  <div class="row justify-content-center">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title"><?=  $saskaita['name'] ?> <?= $saskaita['surname'] ?></h5>
      </div>
      <div class="card-body">
        <p class="card-text"><?= $saskaita['account_number'] ?><h5><?= (float)$saskaita['balance']. ' eur' ?></h5></p>
        <!-- <?php if(isset($successAdd) && $li['id'] == $_GET['id']) : ?>
            <div class="col-4">
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    
                <?= $successAdd ?>
                </div>
            </div>
            <?php endif ?> -->
      </div>
     
    

            
      <form action="<?= URL . 'saskaitos/add/'. $saskaita['id'] ?>" method="post">
        <input type="text" name="balance" class="form-control" placeholder="0.00">
        <button style="margin-bottom: 10px"type="submit" class="btn btn-outline-info mt-4">Pridėti lėšas</button>
      </form>
    </div>  

    

  </div>
</div>  