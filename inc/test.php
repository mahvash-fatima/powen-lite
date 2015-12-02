<?php 

class Wp_Customize
{
	public $x = 10;

	public function __construct(){
		//add_action( 'wp_excerpt_length', array( $this, 'change_excerpt_length' ) );
	}

	public function change_excerpt_length(){
		
	}

	private function add_section(){
		return $this->x;	
	}

	private function delete(){
		echo "helloword";
		self::newitem(); 
	}

	static function newitem(){
		echo "yo you";
	}

	public function add(){
		echo $this->add_section() + 1;	
	}
}

new Wp_Customize();


class Mehmash extends Wp_Customize
{

}

$x = array( 'red', 24, 45  );

extract( $x );







