<?php
class admin extends TMCore_Admin {

	/*
	* Класс отвечает за вывод списка студентов в админ части сайта
	*/

	public function get_content() {
		
		if($_SESSION['res']) {
			echo $_SESSION['res'];
			unset ($_SESSION['res']);
		}
		
		echo '<div class="table-students">
				<div class="table-students-id">№</div>
				<div class="table-students-name">Имя</div>
				<div class="table-students-surname">Фамилия</div>
				<div class="table-students-age">Возраст</div>
				<div class="table-students-gender">Пол</div>
				<div class="table-students-group">Группа</div>
				<div class="table-students-department">Факультет</div>
				<div class="table-students-delete">Редактирование/Удаление</div>
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
					<div class="table-students-group">'.$row["grypa"].'</div>
					<div class="table-students-department">'.$row["faculty"].'</div>
					<div class="table-students-delete"><a class="links-students-update" href="?option=update_student&id='.$row["id"].'">Редактировать</a> | <a class="links-students-delete" href="?option=delete_student&del='.$row["id"].'">Удалить</a></div>
					<div class="table-students-next"></div>
				';
				} while ($row = mysql_fetch_array($result));
			}
			echo '</div>';
			echo '<div class="add_student"><a class="add_student_1" href="?option=add_student">Добавить нового студента</a></div>';
	}
}
?>