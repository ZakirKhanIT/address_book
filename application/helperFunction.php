<?php
// Define a function that converts array to xml.
function arrayToXml($input_array, $root_node, $child_node) {
    $xml = new DOMDocument();

    $rootNode = $xml->appendChild($xml->createElement($root_node));
    
    foreach ($input_array as $article) {
        if (! empty($article)) {
            $itemNode = $rootNode->appendChild($xml->createElement($child_node));
            foreach ($article as $k => $v) {
                $itemNode->appendChild($xml->createElement($k, $v));
            }
        }
    }
    
    $xml->formatOutput = true;

    return $xml;
}

function exportData( $fileName, $format ){
    header('Content-Description: File Transfer');
    header('Content-Type: application/'.$format);
    header('Content-Disposition: attachment; filename=' . basename($fileName));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($fileName));
    ob_clean();
    flush();
    readfile($fileName);   
}

function errorMessages(){
    $error = [];
    $error['info'] = 'Table will be auto created with dummy data while creating the database<br> for information adding the snippets of
    query<br />
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Table name</th>
                <th colspan=2>Query</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Contact</td>
                <td>CREATE TABLE IF NOT EXISTS `contact` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `first_name` varchar(255) NOT NULL,
                    `last_name` varchar(255) NOT NULL,
                    `zip_code` varchar(11) NOT NULL,
                    `street` varchar(255) NOT NULL,
                    `city_id` int(11) NOT NULL,
                    `email_address` varchar(255) NOT NULL DEFAULT "",
                    `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
                    `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
                    PRIMARY KEY(`id`)
                    ) </td>
                <td>INSERT INTO contact(
                    first_name,
                    last_name,
                    email_address,
                    street,
                    zip_code,
                    city_id
                    )
                    VALUES
                    ("Sam","Wallace","same@gmail.com","street 49","23456",1),
                    ("Tom","Vetter","tom@gmail.com","street 49","23456",2),
                    ("Mike","Graves","mike@gmail.com","street 49","23456",3),
                    ("Zack","Rohe","zack@gmail.com","street 49","23456",4)</td>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>City</td>
                <td>CREATE TABLE IF NOT EXISTS `city` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `name` varchar(100) NOT NULL,
                    `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
                    `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
                    PRIMARY KEY(`id`)</td>
                <td>INSERT INTO city(
                    name
                    )
                    VALUES("Mumbai"),("Delhi"),("Bengluru"),("Chennai")</td>
            </tr>
    </table>
    ';
    $error['dnf'] = 'Database is not created<br/>Please run this query <br/>CREATE DATABASE IF NOT EXISTS address_book DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci';
    return $error;
}