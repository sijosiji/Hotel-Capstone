<?php
/**
PHP file where classes are created for Capstone Project

*/

class Package
{	
	public $id;
	public $name;
	public $startDate;
	public $endDate;
	public $description;
	public $basePrice;
	public $agencyCommission;
	public $productSupplierIds=array();
	public $productIds=array();
	public $productNames=array();

	public function __construct($pkgId)
	{
		$this->id = $pkgId;
		$myDb = new mysqli('localhost', 'root', '','capstones');

		//get data from packages table
    	$sql = "SELECT PkgName,PkgStartDate, PkgEndDate,PkgDesc, PkgBasePrice, PkgAgencyCommission FROM packages WHERE PackageId = $pkgId";
		$result=$myDb->query($sql);
    	$row = $result->fetch_row();
    	$this->name=$row[0];
    	$this->startDate =$row[1];
    	$this->endDate=$row[2];
    	$this->description=$row[3];
    	$this->basePrice=$row[4];
		$this->agencyCommission=$row[5];
		
    	
    	
    	$myDb->close();
	}

	//check whether the package's start date has passed
	public function checkStartDate()
	{
		$currentDate=time();
		if ($currentDate>strtotime($this->startDate))
		{
			return false;
		}
		if ($currentDate<strtotime($this->startDate))
		{
			return true;
		}
	}
	//check whether the package's end date has passed
	public function checkEndDate()
	{
		$currentDate=time();
		if ($currentDate>strtotime($this->endDate))
		{
			return false;
		}
		if ($currentDate<strtotime($this->endDate))
		{
			return true;
		}
	}

}
//===================================================



?>