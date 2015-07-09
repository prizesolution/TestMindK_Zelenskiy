<?php
/*
* Класс main является потомком класса TMCore 
*/
class main extends TMCore {
	
	/*
	* Данный класс отвечает за вывод на экран полного списка студентов который хранится в БД
	*/
	public function get_content() {
		
		echo '
			<div class="table-students">
				<div class="table-students-id">№</div>
				<div class="table-students-name">Имя</div>
				<div class="table-students-surname">Фамилия</div>
				<div class="table-students-age">Возраст</div>
				<div class="table-students-gender">Пол</div>
				<div class="table-students-group">Группа</div>
				<div class="table-students-department">Факультет</div>
				<div class="table-students-next"></div>
		';
		
		$result = mysql_query("SELECT * FROM table_students");
			if (mysql_num_rows($result) > 0)
			{
				$row = mysql_fetch_array($result);
				do
				{
				echo '
					<div class="table-students-id">'.$row["id"].'</div>
					<div class="table-students-name">'.$row["name"].'</div>
					<div class="table-students-surname">'.$row["surname"].'</div>
					<div class="table-students-age">'.$row["age"].'</div>
					<div class="table-students-gender">'.$row["gender"].'</div>
					<div class="table-students-group">'.$row["group"].'</div>
					<div class="table-students-department">'.$row["department"].'</div>
					 <p class="links-actions-students-delete">'.$link_accept.'<a class="delete" rel="index.php?id='.$row["id"].'&action=delete" >Удалить</a> </p>
					<div class="table-students-next"></div>
				';
				} while ($row = mysql_fetch_array($result));
			}
			echo '</div>';
	}

}
?>