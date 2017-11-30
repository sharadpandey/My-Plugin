<?php 
include('../../../../wp-config.php');
global $wpdb;
$plugin_url=$_POST['plugin_url'];
$data_in_array_string=$_POST['ids'];

$table_name = $wpdb->prefix . 'addcss_js';
$data_in_array=explode(",",$data_in_array_string[0]);

//get data from the table
$db_table_results = $wpdb->get_results("SELECT name FROM ".$table_name."");

$result_array=array();
foreach ($db_table_results as $result)
{
	//storing the data into array for comparing	
	$result_array[]=$result->name;
}

//insert data section
foreach ($data_in_array as $data)
{
	$ext = pathinfo($data, PATHINFO_EXTENSION);
	$file_name=basename($data,".".$ext);
	
	//Comparing value to array
	if (!in_array($data, $result_array))
	{	
		//insert data into table	
		$wpdb->insert($table_name, array('name' => $data));
	}
}
echo '1';
?>