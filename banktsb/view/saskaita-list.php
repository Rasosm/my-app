<h1>Saskaitos Visi</h1>
<ul>

<?php foreach($saskaitos as $saskaita) : ?>


<li>
    <b>id: <?= $saskaita['id'] ?></b> <?= $saskaita['title'] ?> <?= $saskaita['color'] ?> <?= $saskaita['weight'] ?>
    <a href="<?= URL . 'saskaitos/edit/'. $saskaita['id'] ?>">Redaguoti</a>
    <form action="<?= URL . 'saskaitos/delete/'. $saskaita['id'] ?>" method="post">
        <button type="submit">Trinti</button>
    </form>
</li>


<?php endforeach ?>


</ul>
