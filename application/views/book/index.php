<?php foreach ($book as $book_item):?>
	<h2><?php echo $book_item['id']?></h2>
	<div class="main">
		<?php echo $book_item['name'] ?>
		<?php echo $book_item['category'] ?>
		<?php echo $book_item['page'] ?>
		<?php echo $book_item['content'] ?>
	</div>
<?php endforeach ?>
