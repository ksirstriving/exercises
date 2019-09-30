<?php
/**
 * @File: TestAbstractFactory.php
 * @User: likai
 * @Date: 2019-09-16
 * @Time: 16:16
 * @Brief:
 */
spl_autoload_register(function ($class) {
    include '' . $class . '.php';
});

$data1 = ['a', 'b', 'c'];
$data2 = [
    ['name' => 'a', 'type' => 1],
    ['name' => 'b', 'type' => 2],
    ['name' => 'c', 'type' => 3],
];

// unix
$unixWriter = new UnixWriterFactory();

// csv
$unixCsv = $unixWriter->createCsvWriter();
echo $unixCsv->write($data1);
// json
$unixJson = $unixWriter->createJsonWriter();
echo $unixJson->write($data2, false);

// win
$winWriter = new WinWriterFactory();
// csv
$winCsv = $winWriter->createCsvWriter();
echo $winCsv->write($data1);
// json
$winJson = $winWriter->createJsonWriter();
echo $winJson->write($data2, false);