<?php
/**
 * @File: WinJsonWriter.php
 * @User: likai
 * @Date: 2019-09-16
 * @Time: 15:50
 * @Brief:
 */
class WinJsonWriter implements JsonWriter
{
    public function write(array $output, bool $formatted): string
    {
        return 'WinJson: ' . json_encode($output, JSON_PRETTY_PRINT) . "\r\n";
    }
}