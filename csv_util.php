<?php


function getCSVArray($fileName) // Read CSV file and convert to a PHP Array
{
    return $arr = array_map('str_getcsv', file($fileName));
}


function getCSVElement($fileName, $index) // Read CSV file and return indexed Element
{
    $arr = array_map('str_getcsv', file($fileName));
    return $arr[$index];
}


function addCSVRecord($fileName, $index, $record) // Add new record to the end of the CSV file
{
    $array = getCSVArray($fileName); // Get CSV Array

    $handle = fopen($fileName, "w"); // Open Write Handle to CSV File

    $i = 0;
    foreach ($array as $item) // Add Record to CSV File
    {
        if ($i == $index)
            array_push($item, $record);

        fputcsv($handle, $item);
        $i++;
    }

    fclose($handle); // Close Handle
}


function modifyRecord($fileName, $index, $quote, $record) // Modify an exsisting record in the CSV file
{
    $array = getCSVArray($fileName); // Get CSV Array

    $handle = fopen($fileName, "w"); // Open Write Handle to CSV File

    $i = 0;
    foreach ($array as $item) // Edit Record in CSV File
    {
        if ($i == $index)
        {
            $itemIndex = array_search($quote, $item);
            $item[$itemIndex] = $record;
        }

        fputcsv($handle, $item);
        $i++;
    }

    fclose($handle); // Close Handle
}


function EmptyCSVQuote($fileName, $index, $quote) // Empty Line in CSV
{
    $array = getCSVArray($fileName); // Get CSV Array

    $handle = fopen($fileName, "w"); // Open Write Handle to CSV File

    $i = 0;
    foreach ($array as $item) // Empty Record in CSV File
    {
        if ($i == $index)
        {
            $itemIndex = array_search($quote, $item);
            unset($item[$itemIndex]);
        }

        fputcsv($handle, $item);
        $i++;
    }

    fclose($handle); // Close Handle
}


function DeleteCSVLine($fileName, $authorIndex) // Delete Line from CSV
{
    $array = getCSVArray($fileName); // Get CSV Array

    $handle = fopen($fileName, "w"); // Open Write Handle to CSV File

    $i = 0;
    foreach ($array as $item) // Empty Line in CSV File
    {
        if ($i == $index)
            fputcsv($handle, "");
        else
            fputcsv($handle, $item);
        $i++;
    }

    fclose($handle); // Close Handle
}


?>