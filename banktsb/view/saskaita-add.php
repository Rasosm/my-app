<div class="container">
  <div class="row justify-content-center">

  <?php if(isset($message)) : ?>
    <div class="col-6" style="justify-content: center; display: flex">
        <div class="alert <?= $message['type'] ?> m-4 d-flex align-items-center" style="text-align: center" role="alert">
          <?= $message['text'] ?>
        </div>
    </div>
  <?php endif ?>
  
    <div class="card">
      <div class="card-header">
        <h5 style="font-size: 18px; font-weight: bold" class="card-title"><?=  $saskaita['name'] ?> <?= $saskaita['surname'] ?></h5>
      </div>
      <div class="card-body">
        <p class="card-text"><?= $saskaita['account_number'] ?><p style="font-weight: bold"> Likutis: <?= (float)$saskaita['balance']. ' eur'?></p></p>
      </div>
              
      <form style="padding: 0 16px" action="<?= URL . 'saskaitos/add/'. $saskaita['id'] ?>" method="post">
        <input type="text" name="balance" class="form-control" placeholder="0.00">
        <button style="margin-bottom: 10px"type="submit" class="btn btn-outline-info mt-4">Pridėti lėšas</button>
      </form>
    </div>  

    

  </div>
</div>  