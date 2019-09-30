<?php
/**
 * @File: JsonWriter.php
 * @User: likai
 * @Date: 2019-09-16
 * @Time: 15:33
 * @Brief:
 */
interface JsonWriter
{
    public function write(array $output, bool $formatted): string;
}
