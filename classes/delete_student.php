<?php
class delete_student extends TMCore_Admin {
	
	/*
	* Метод отвечающий за удаление данных из таблицы БД
	*/
	
	public function obr() {
		if($_GET['del']) {
			$id = (int)$_GET['del'];
			
			$query = "DELETE FROM table_students WHERE id='$id'";
			
			if(!mysql_query($query)) {
				exit("Ошибка удаления");
			}
			else{
				
				$_SESSION['res'] = "Данные про студента удалены";
				header("Location:?option=admin");
				exit();
			}
		}
		else{
			exit("Не верные данные для этой страницы");
		}
		
	}
	
	public function get_content() {
	
	}
}
?>