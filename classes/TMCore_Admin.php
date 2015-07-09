<?php

/*
* Класс аналогичный классу TMCore, но он содежржит все свойства и методы которые необходимы для 
* редактирования списка студентов
*/

abstract class TMCore_Admin {
	
	/*
	* Закрытое свойство в котором хранится дескриптор подключения к БД
	*/
	protected $db;
	
	/*
	* Метод конструктор предназначен для выполнения подключения к БД
	*/	
	public function __construct() {
		$this->db = mysql_connect(HOST,USER,PASSWORD);
		if(!$this->db) {
			exit("Ошибка соединения с базой данных".mysql_error());
		}
		if(!mysql_select_db(DB,$this->db)) {
			exit ("нет такой базы данных".mysql_error());
		}
		mysql_query("SET NAMES 'UTF8'");	
	}
	
	
	
	public function get_body() {
	
		
		if ($_POST || $_GET['del']) {
			$this->obr();
		}
		
		$this->get_content();
	}
	
	abstract function get_content();
	
	/*
	* Метод отвечает за вывод данных в форму для редактирования
	*/
	
	protected function get_info_studenta($id) {
		$query = "SELECT id,name,surname,age,gender,grypa,faculty FROM table_students WHERE id='$id'";
		$result = mysql_query($query);
		if(!$result) {
			exit(mysql_error());	
		}
		$row = array();
		$row = mysql_fetch_array($result,MYSQL_ASSOC);
		
		return $row;
	}
}
?>