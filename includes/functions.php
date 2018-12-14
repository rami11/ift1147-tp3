<?php

function getFilms($selectedCategory = "") {
  $filmQuery = "SELECT * FROM films";
  if (!empty($selectedCategory)) {
    $filmQuery .= " WHERE category = '$selectedCategory'";
  }
  $filmQuery .= " ORDER BY id DESC";

  $films = array();
  try{
       $model = new filmsModele($filmQuery, array());
       $stmt = $model->executer();

       while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
          $films[] = $ligne;
      }
    }catch(Exception $e){

    }finally{
      unset($model);
    }
    return $films;
}

function getFilm($id) {
  $query = "SELECT * FROM films WHERE id = '$id' LIMIT 1";

  try{
       $model = new filmsModele($query, array());
       $stmt = $model->executer();

       $film = $stmt->fetch(PDO::FETCH_OBJ);
    }catch(Exception $e){

    }finally{
      unset($model);
    }
    return $film;
}

function getCategories() {
  $categoryQuery = "SELECT * FROM categories";

    $categories = array();
    try{
       $model = new filmsModele($categoryQuery, array());
       $stmt = $model->executer();

       while($line = $stmt->fetch(PDO::FETCH_OBJ)){
          $categories[] = $line;
      }
    }catch(Exception $e){

    }finally{
      unset($model);
    }

    return $categories;
}


?>