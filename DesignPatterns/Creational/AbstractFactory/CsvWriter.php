<?php
/**
 * @File: CsvWriter.php
 * @User: likai
 * @Date: 2019-09-16
 * @Time: 15:35
 * @Brief:
 */
interface CsvWriter
{
    public function write(array $output): string;
}
