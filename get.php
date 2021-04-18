<?php 
    // persiapkan curl
    $ch = curl_init(); 

    // set url 
    curl_setopt($ch, CURLOPT_URL, "https://trefle.io/api/v1/plants?token=QB6jODQAcyJoLbe79uYw1snNc6gWBgf4exzxTb7IJ5w");

    // return the transfer as a string 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

    // $output contains the output string 
    $output = curl_exec($ch); 

    // tutup curl 
    curl_close($ch);      

    // menampilkan hasil curl
    // echo $output;
    file_put_contents('data.json', $output);
?>