<h2>Add New Menu</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('menu/create'); ?>

<label for="name">Name</label>
<input type="text" name="name"><br>

<label for="description">Description</label>
<textarea name="description"></textarea><br>

<input type="submit" name="submit" value="Add Menu">

</form>