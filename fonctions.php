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

    //fonction qui retourne dans un tableau associatif les 20 films les mieux notés 
    function topRatedMovies(){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        $url = "https://api.themoviedb.org/3/movie/top_rated?api_key=$key&language=fr-FR";
        $response = getProxy($url);
        //$response = file_get_contents("https://api.themoviedb.org/3/movie/top_rated?api_key=$key&language=fr-FR");
        $result = json_decode($response, true);
        return $result['results'];
    }

    //fonction qui retourne un tableau associatif des films pour un genre donné
    function filmParGenre($genreId){
        $key = "9e43f45f94705cc8e1d5a0400d19a7b7";
        // utilisation de l'endpoint discover pour filtrer par genre
        $url = "https://api.themoviedb.org/3/discover/movie?api_key=$key&language=fr-FR&with_genres=$genreId";
        $response = getProxy($url);
        //$response = file_get_contents("https://api.themoviedb.org/3/discover/movie?api_key=$key&language=fr-FR&with_genres=$genreId");
        $result = json_decode($response, true);
        return $result['results'];
    }

    
?>

