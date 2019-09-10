<?php 

$max = (isset($_POST['max']) ? $_POST['max'] = " ");
$min = (isset($_POST['min']) ? $_POST['min'] = " ");


if ($max < $min && $min > $max) {
	echo "<em style='color:red' class='error help-block'>¡tamal!</em>";
}

?>
