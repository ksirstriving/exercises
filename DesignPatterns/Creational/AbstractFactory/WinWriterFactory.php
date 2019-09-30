<?php
/**
 * @File: WinWriterFactory.php
 * @User: likai
 * @Date: 2019-09-16
 * @Time: 15:53
 * @Brief:
 */
include_once 'WriterFactory.php';
class WinWriterFactory implements WriterFactory
{
    public function createCsvWriter(): CsvWriter
    {
        return new WinCsvWriter();
    }

    public function createJsonWriter(): JsonWriter
    {
        return new WinJsonWriter();
    }
}