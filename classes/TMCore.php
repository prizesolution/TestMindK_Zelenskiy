<?php

abstract class TMCore {
	
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
	
	
	/*
	* В методе get_body() вызываем класс get_content(), который отвечает за вывод информации на экран
	*/
	
	public function get_body() {
		
		$this->get_content();
	}
	
	/*
	* Создание абстрактного класса get_content(), для того чтоб переопределять его во всех дочерних классах,
	потому что у каждого класса своя информация для вывода
	*/
	abstract function get_content();
	
}
?>