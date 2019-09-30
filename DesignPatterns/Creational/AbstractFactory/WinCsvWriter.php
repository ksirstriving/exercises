<?php
/**
 * @File: WinCsvWriter.php
 * @User: likai
 * @Date: 2019-09-16
 * @Time: 15:49
 * @Brief:
 */
class WinCsvWriter implements CsvWriter
{
    public function write(array $output): string
    {
        return 'WinCsv: ' . join(',', $output) . "\r\n";
    }
}