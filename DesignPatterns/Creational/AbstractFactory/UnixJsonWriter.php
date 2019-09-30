<?php
/**
 * @File: UnixJsonWriter.php
 * @User: likai
 * @Date: 2019-09-16
 * @Time: 15:38
 * @Brief:
 */
include_once 'JsonWriter.php';
class UnixJsonWriter implements JsonWriter
{
    public function write(array $output, bool $formatted): string
    {
        $options = $formatted ? JSON_PRETTY_PRINT : 0;
        return 'UnixJson: ' . json_encode($output, $options) . "\n";
    }
}