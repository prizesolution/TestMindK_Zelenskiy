<?php
	header("Content-Type: text/html; charset=utf-8");



	class update_student extends TMCore_Admin {
		
	/*
	* Метод отвечающий за обновление данных в таблице БД
	*/
	
	protected function obr() {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$age = $_POST['age'];
		$gender = $_POST['gender'];
		$grypa = $_POST['grypa'];
		$faculty = $_POST['faculty'];
		
		if (empty($name) || empty($surname) || empty($age) || empty($gender) || empty($grypa) || empty($faculty)) {
			exit("Не заполнены обязательные поля");
		}
		
		$query = " UPDATE table_students SET name='$name',surname='$surname',age='$age',gender='$gender',grypa='$grypa',faculty='$faculty' WHERE id='$id'";
		if (!mysql_query($query)) {
			exit(mysql_error());
		}
		else{
			$_SESSION['res'] = "Изменения успешно сохранены";
			header("Location:?option=admin");
			exit();
		}		
	}
	
	/*
	* Метод отвечающий за вывод на экран формы с данными про студента из БД для их редактирования,
	* а также вывод сообщения о результатах редктирования
	*/
	
	public function get_content() {
		echo "<a href='?option=admin'>Вернуться к списку студентов</a>";
		
		if($_GET['id']) {
			$id = (int)$_GET['id'];
		}
		else
		{
			exit('Не правильные данные');
		}
		
		$info = $this->get_info_studenta($id);
		
		if($_SESSION['res']) {
			echo $_SESSION['res'];
			unset ($_SESSION['res']);
		}
		echo "
		<form enctype='multipart/form-data' action='' method='POST'>
			<p>Имя студента:<br/>
			<input type='text' name='name' style='width:420px;' value='$info[name]'>
			<input type='hidden' name='id' style='width:420px;' value='$info[id]'> <!--Указываем обработчику какую именно статью будем редктировать-->
			</p>
			<p>Фамилия студента:<br/>
			<input type='text' name='surname' style='width:420px;' value='$info[surname]'>
			<input type='hidden' name='id' style='width:420px;' value='$info[id]'>
			</p>
			<p>Возраст студента:<br/>
			<input type='text' name='age' style='width:80px;' value='$info[age]'>
			<input type='hidden' name='id' style='width:80px;' value='$info[id]'>
			</p>
			<p>Пол студента: <br/>
			<select name='gender'>
				<option selected value='$info[gender]'>$info[gender]</option>
				<option value='Мужской'>Мужской</option>
				<option value='Женский'>Женский</option>
			</select>
			</p>
			<p>Группа студента:<br/>
			<input type='text' name='grypa' style='width:80px;' value='$info[grypa]'>
			<input type='hidden' name='id' style='width:80px;' value='$info[id]'>
			</p>
			<p>Факультет студента:<br/>
			<input type='text' name='faculty' style='width:150px;' value='$info[faculty]'>
			<input type='hidden' name='id' style='width:150px;' value='$info[id]'>
			</p>
			<p>
			<input type='submit' name='button' value='Сохранить'>
			</p>
		</form>
		";
		
		}
	}
?>