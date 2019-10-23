<div class="container">
	<? foreach ($data as $item): ?>
	<h1><?=$item['title'];?></h1>
	<p><?=$item['description'];?></p>
	<? endforeach; ?>
</div>
