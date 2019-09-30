<?php
/**
 * @File: UnixCsvWriter.php
 * @User: likai
 * @Date: 2019-09-16
 * @Time: 15:42
 * @Brief:
 */
include_once 'CsvWriter.php';
class UnixCsvWriter implements CsvWriter
{
    public function write(array $output): string
    {
        return 'UnixCsv: ' . join(',', $output) . "\n";
    }
}