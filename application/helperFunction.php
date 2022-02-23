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
    $error['dnf'] = 'Database is not created<br/>Please run this query <br/>CREATE DATABASE IF NOT EXISTS address_book DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci';
    return $error;
}

function getNameOfGroup( $string, $dataArray ){
    if( !  $string){
        echo ' No Data';
        return;
    }
     $array =explode(',',$string);
     $result = '<ol>';

     foreach( $array as $array){
        $result .= '<li>'.$dataArray[$array]['name'].'</li>';
     }

     $result .='</ol>';
     echo $result;
     
}

function getNameOfGroups( $string, $dataArray,$groups,$id ){
 
    foreach($groups as $group){
        $child_group=explode( ',',$group['child_group']);
        if(in_array($id,$child_group)){
            $string .=','.$group['contact'].',';
        }
    }

    $array =explode(',',$string);
   $array =  array_unique($array);

    $result = '<ol>';

    foreach( $array as $array){
        if(isset($dataArray[$array]) )
        $result .= '<li>'.$dataArray[$array]['name'].'</li>';;
    }

    $result .='</ol>';
    echo $result;
     
}

 function getPostData( $posts ){
    $data_to_save =[];

    if($posts ){
        foreach( $posts as $post){
            if(! array_search($post, $posts ) ){
                continue;
            }
            $data_to_save[array_search($post, $posts )]=isset($post) ? $post : NULL;
        }
    }

    return $data_to_save;
}