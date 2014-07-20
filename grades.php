<?php
	header("Content-type: text/html; charset=utf-8");

	if(mysql_connect('localhost', 'root', '1234')){
		echo 'connection succeed!<br/>';
	}else{
		echo 'connection failed!<br/>';
	}

	if(mysql_select_db('exam_results')){
		echo 'selection succeed!<br/>';
	}else{
		echo 'selection failed!<br/>';
	}

	mysql_query('set names utf8');

	$query = "select student.姓名,score.* from student,score where student.学号=score.学号 order by 排名 asc;";
	$result = mysql_query($query);

	echo '<table width=1000>';
	
	echo '<tr>';
	for($i = 0; $i < mysql_num_fields($result); $i++){
		echo '<td>'.(mysql_field_name($result,$i)).'</td>';
	}
	echo '</tr>';

	echo '</br>';

	while($row = mysql_fetch_array($result)){
		echo '<tr>';
		for($i = 0; $i < mysql_num_fields($result); $i++)
		echo '<td>'.$row[$i].'</td>';
		echo '</tr>';
	}

	echo '</table>';
?>
