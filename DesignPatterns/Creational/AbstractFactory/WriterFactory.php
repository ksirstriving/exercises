<?php
/**
 * @File: WriterFactory.php
 * @User: likai
 * @Date: 2019-09-16
 * @Time: 15:28
 * @Brief:
 */
interface WriterFactory
{
    public function createCsvWriter(): CsvWriter;

    public function createJsonWriter(): JsonWriter;
}