<?php
namespace App\Models;
class BaseElement implements Printable{
    private $title;
    public $description;
    public $visible = true;
    public $months;
    

    public function __construct($title, $description)
    {
       $this->setTitle($title);
       $this->description = $description;
    }

    public function setTitle($title){
        $this->title = ($title == '') ? 'N/A' : $title;
    }
    public function getTitle(){
        return $this->title;
    }


    public function getDurationAsString($months)
    {
        $years = floor($this->months / 12);
        $years = ($years > 0) ? $years . ' years' : '';

        $extraMoths = $this->months % 12;
        $extraMoths = ($extraMoths > 0) ? $extraMoths . ' months' : '';
        
        return "$years $extraMoths";
    }

    public function getDescription(){
		return $this->description;
	} 
}


?>