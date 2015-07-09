<?php
	class add_student extends TMCore_Admin {
		
	/*
	* Метод отвечающий за добавление данных в таблицу БД
	*/
	
	protected function obr() {
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$grypa = $_POST['grypa'];
		$faculty = $_POST['faculty'];
		
		if (empty($name) || empty($surname) || empty($age) || empty($gender) || empty($grypa) || empty($faculty)) {
			exit("Не заполнены обязательные поля");
		}
		
		$query = " INSERT INTO table_students
							(name,surname,age,gender,grypa,faculty)
					VALUES ('$name','$surname','$age','$gender','$grypa','$faculty')";
		if (!mysql_query($query)) {
			exit(mysql_error());
		}
		else{
			$_SESSION['res'] = "Данные про студента успешно сохранены";
			header("Location:?option=add_student");
			exit;
		}		
	}
	
	/*
	* Метод отвечающий за вывод на экран формы для добавления нового студента в базу,
	* а также вывод сообщения о результатах добавления
	*/
	
	public function get_content() {
		echo "<a href='?option=admin'>Вернуться к списку студентов</a>";
		if($_SESSION['res']) {
			echo $_SESSION['res'];
			unset ($_SESSION['res']);
		}
		echo "
		<form enctype='multipart/form-data' action='' method='POST'>
			<p>Имя студента:<br/>
			<input type='text' name='name' style='width:420px;'>
			</p>
			<p>Фамилия студента:<br/>
			<input type='text' name='surname' style='width:420px;'>
			</p>
			<p>Возраст студента:<br/>
			<input type='text' name='age' style='width:80px;'>
			</p>
			<p>Пол студента: <br/>
			<select name='gender'>
				<option value='Мужской'>Мужской</option>
				<option value='Женский'>Женский</option>
			</select>
			</p>
			<p>Группа студента:<br/>
			<input type='text' name='grypa' style='width:80px;'>
			</p>
			<p>Факультет студента:<br/>
			<input type='text' name='faculty' style='width:150px;'>
			</p>
			<p>
			<input type='submit' name='button' value='Сохранить'>
			</p>
		</form>
		";
		
		}
	}
?>