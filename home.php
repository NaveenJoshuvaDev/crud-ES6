
<?php
$data = array(
    "name" => "John",
    "age" => 30,
    "country" => "USA",
    "1invalid" => "value"
);

$prefix = "myvar_";
extract($data, EXTR_PREFIX_INVALID, $prefix);

echo $name;       // Outputs: John
echo $age;        // Outputs: 30
echo $country;    // Outputs: USA
echo ${$prefix . '1invalid'}; // Outputs: value
?>
