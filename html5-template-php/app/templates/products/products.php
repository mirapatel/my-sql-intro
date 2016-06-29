<h1>All products</h1>


<?php foreach( $this->allProducts as $item ): ?>

<article>
	<h1> <?= $item['name'] ?> </h1>
	<img src="http://placehold.it/200" alt="">
	<p>	<?= $item['desc'] ?> </p>
</article>

<?php endforeach; ?>