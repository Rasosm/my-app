<h1>Saskaita Redagavimas</h1>

<form action="<?= URL ?>saskaitos/update/<?= $saskaita['id'] ?>" method="post">

    <div>Pavadinimas<input type="text" name="title" value="<?= $saskaita['title'] ?>"></div>
    <div>Spalva<input type="text" name="color" value="<?= $saskaita['color'] ?>"></div>
    <div>Svoris<input type="text" name="weight" value="<?= $saskaita['weight'] ?>"></div>

    <button type="submit">Taip</button>

</form>