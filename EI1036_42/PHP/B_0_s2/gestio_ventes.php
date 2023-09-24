<?php
$dicc_ventas = importar_dades0('sales_2008_2011.csv');

/* Esta función dado un fichero csv devuelve un diccionarioo */
function importar_dades0($fitxer){
    $file = fopen($fitxer, 'r');
    $row0 = fgetcsv($file);
    $diccionario= array();
    while ($row = fgetcsv($file)) {
        $dicc=[];
        for ($i=1;$i<count($row);$i++){
            $dicc[$row0[$i]]= $row[$i];
        } 
        $diccionario[$row[0]][]= $dicc;
     }

     return $diccionario;
}

/* Esta función devuelve una lista con todos los productos que ha comprado un cliente */
function compra_clients($dicc,$cliente){
    $lista= array();
    foreach($dicc as $clave => $valor){
        for($i=0;$i< count($valor); $i++){
            if($cliente=$valor[$i]['Cust_ID']){
                $lista[]= $clave;
                break;
            }           
        }
    }
    return $lista;
}

/* Esta función guuarda los datos recibidos por un fichero csv en un fichero json */
function guardar_dades($fitxer){
    $file = fopen($fitxer, 'r');
    $row1 = fgetcsv($file);
    $nombre_archivo = 'ventas.json';
    $jsonArray = array();
    while ($row = fgetcsv($file)){
        $d =[]; 
        for ($i=0;$i<count($row);$i++){
            $d[$row1[$i]]= $row[$i];
        } 
        $jsonArray[] = $d; 
    } 

    $jsonString = json_encode($jsonArray);
    if(file_put_contents($nombre_archivo,$jsonString)){
        echo "Archivo json creado";
    }
    else{
        echo "No se ha podido crear el archivo";
    }  
    
} 

/* Esta función añade una nueva compra al diccionario de compras */
function afegeix_commpra($productx,$countryx,$datex,$quantityx,$amountx,$cardx,$Cust_IDx,$dicc){
    $d =array(
        'country' => $countryx,
        'date' => $datex,
        'quantity' => $quantityx,
        'amount' => $amountx,
        'card' => $cardx,
        'Cust_ID' => $Cust_IDx
    );

    $dicc[$productx][]  = $d;  
}

/* Esta función borra del diccionario la copmpra recibida si existe en éste */
function borrar_compra($productx,$countryx,$datex,$quantityx,$amountx,$cardx,$Cust_IDx,$dicc){
    if(array_key_exists($productx,$dicc)){
        $lista = $dicc[$productx];
        for($i=0; $i < count($lista);$i++){
            if ($countryx = $lista[$i]['country'] && $datex = $lista[$i]['date'] && $quantityx = $lista[$i]['quantity'] && $amountx = $lista[$i]['amount'] && $cardx = $lista[$i]['card'] && $Cust_IDx = $lista[$i]['Cust_ID']){
                unset($dicc[$productx]);
                break;
            } 
        } 
    }
} 

/* Esta función dado un fichero json devuelve un diccionario con los datos que contiene */
function importar_dades($fitxer){
    $f = file_get_contents($fitxer);
    $datos = json_decode($f,true);
    $d=[]; 
    for($i=0;$i < count($datos);$i++){
        if(!(array_key_exists($datos[$i]['product'],$d))){
            $d[$datos[$i]['product']][]=[];    
        }
        $coont= 0;
        $d2 =[]; 
        foreach($datos[$i] as $clave => $valor){
            if($coont>0){
                $d2[$clave]=$valor; 
            }
            $coont++;
        }
        $d[$datos[$i]['product']][]= $d2; 
    }
    return $d;
} 






?>
