<?php
class RealCustomer {
	function __construct(string $name) {
		$this->name = $name;
	}
	
	public function getName(): string {
		return $this->name;
	}
	
	public function isNil(): boolean {
		return false;
	}
}

class NullCustomer {
	function __construct() {}
	
	public function getName(): string {
		return 'Not Available in Customer Database';
	}
	
	public function isNil(): boolean {
		return true;
	}
}

class CustomerFactory {
	function __contruct() {}
	
	public function getCustomer(string $name): object {
		$this->customers = ['Rob', 'Joe', 'Julie'];
		for($i = 0; $i < sizeof($this->customers); $i++) {
			if($this->customers[$i] === $name) {
				return new RealCustomer($name);
			}
		}
		return new NullCustomer();
	}
}

$customer1 = new CustomerFactory();
$customer1_obj = $customer1->getCustomer('Rob');
$customer2 = new CustomerFactory();
$customer2_obj = $customer2->getCustomer('Bob');
$customer3 = new CustomerFactory();
$customer3_obj = $customer3->getCustomer('Julie');
$customer4 = new CustomerFactory();
$customer4_obj = $customer4->getCustomer('Laura');

echo 'Customers<br/>';
echo $customer1_obj->getName() . '<br/>';
echo $customer2_obj->getName() . '<br/>';
echo $customer3_obj->getName() . '<br/>';
echo $customer4_obj->getName() . '<br/>';
?>