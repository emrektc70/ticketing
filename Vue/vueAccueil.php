<?php $this->titre = "Ticket"; ?>

<?php foreach ($billets as $billet) :
?>
    <article>
        <header>
            <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
                <h1 class="titreBillet"><?= $billet['titre'] ?>
                </h1>
            </a>
            <time><?= $billet['date'] ?></time>
            <p><?= $billet['etat'] ?></p>
        </header>
        <p><?= $billet['contenu'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>