<?php

require_once("get-proxy.php");// au lycée pour faire des requêtes https vous avons besoin d'indiquer le proxy


    //fonction qui retourne dans un tableau asociatif les 20 films les plus populaires 
    function popularMovies(){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        $url = "https://api.themoviedb.org/3/movie/popular?api_key=$key&language=fr-FR";
        $response = getProxy($url);
        //$response = file_get_contents("https://api.themoviedb.org/3/movie/popular?api_key=$key&language=fr-FR");
       
        $result = json_decode($response, true);
        return $result['results'];
      }

    // Fonction de recherche de films par titre
    function searchMovies($query){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        $queryEnc = urlencode($query);
        $url = "https://api.themoviedb.org/3/search/movie?api_key=$key&language=fr-FR&query=$queryEnc";
        $response = getProxy($url);
        $result = json_decode($response, true);
        return isset($result['results']) ? $result['results'] : [];
    }

    // Fonction de recherche d'acteurs par nom
    function searchActors($query){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        $queryEnc = urlencode($query);
        $url = "https://api.themoviedb.org/3/search/person?api_key=$key&query=$queryEnc";
        $response = getProxy($url);
        $result = json_decode($response, true);
        return isset($result['results']) ? $result['results'] : [];
    }

    
?>

