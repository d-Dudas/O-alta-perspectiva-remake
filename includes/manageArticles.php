<?php

    /*function getRecentArticles(){
        $conn = dbConnect();
        $r = $conn->query("SELECT * FROM articles ORDER BY uploadDate DESC LIMIT 3");
        $conn->close();
        $articles = array();
        while($row = $r->fetch_assoc()) {
            array_push($articles, $row);
        }

        return $articles;
    }*/

    function getArticles(){
        $conn = dbConnect();
        $r = $conn->query("SELECT * FROM articles ORDER BY uploadDate DESC");
        $conn->close();
        $articles = array();
        while($row = $r->fetch_assoc()) {
            array_push($articles, $row);
        }

        return $articles;
    }

    function getArticleById($id) {
        $conn = dbConnect();
        $r = $conn->query("SELECT * FROM articles WHERE id = '$id' LIMIT 1");
        $conn->close();
        
        return $r->fetch_assoc();
    } 

    function updateView($id){
        $conn = dbConnect();
        $v = $conn->query("SELECT views FROM articles WHERE id = '$id' LIMIT 1");
        $v = $v->fetch_assoc();
        $v = $v['views'] + 1;
        $conn->query("UPDATE articles SET views = '$v' WHERE id = '$id'");
        $conn->close();
    }

    function getComments($id) {
        $conn = dbConnect();
        $r = $conn->query("SELECT * FROM comments WHERE articleId = '$id' ORDER BY commentDate");
        $conn->close();
        $comments = array();
        while($row = $r->fetch_assoc()) {
            array_push($comments, $row);
        }

        return $comments;
    }

    function getNRecentNews($n)
    {
        $conn = dbConnect();
        $r = $conn->query("SELECT * FROM suggestedarticles ORDER BY dataTrimitere DESC LIMIT $n");
        $conn->close();

        return $r;
    }

    function getPrefferedNews() {
        $conn = dbConnect();
        $preferences = implode("\",\"",$_SESSION["preferences"]);
        $r = $conn->query("SELECT * FROM suggestedarticles WHERE category in (\"$preferences\") ORDER BY dataTrimitere DESC LIMIT 2");
        $conn->close();
        return $r;
    }

    function getNRecentNotPrefferedNews($n) {
        $conn = dbConnect();
        $preferences = implode("\",\"",$_SESSION["preferences"]);
        $r = $conn->query("SELECT * FROM suggestedarticles WHERE category not in (\"$preferences\") ORDER BY dataTrimitere DESC LIMIT $n");
        $conn->close();
        return $r;
    }

    function getSuggestedNews() {
        // If there are prefferences, then get the preffered articles
        if(isset($_SESSION['preferences'])) {
            if(!empty($_SESSION["preferences"])) {
                $r = getPrefferedNews();
            } else {
                $r = getNRecentNews(2);
            }
        } else {
            $r = getNRecentNews(2);
        }

        if($r->num_rows == 0) {
            $r = getNRecentNews(2);
        }

        // Put the articles in an array
        $news = array();
        while($row = $r->fetch_assoc()) {
            array_push($news, $row);
        }

        // If there aren't 2 articles, then get the rest of the articles from the most recent ones
        if(count($news) < 2) {
            $r = getNRecentNotPrefferedNews((2-count($news)));
            while($row = $r->fetch_assoc()) {
                array_push($news, $row);
            }
        }

        return $news;
    }

    function getNRecentArticles($n)
    {
        $conn = dbConnect();
        $r = $conn->query("SELECT * FROM articles ORDER BY uploadDate DESC LIMIT $n");
        $conn->close();

        return $r;
    }

    function getPrefferedArticles() {
        $conn = dbConnect();
        $preferences = implode("\",\"",$_SESSION["preferences"]);
        $r = $conn->query("SELECT * FROM articles WHERE category in (\"$preferences\") ORDER BY uploadDate DESC LIMIT 3");
        $conn->close();
        return $r;
    }

    function getNRecentNotPrefferedArticles($n) {
        $conn = dbConnect();
        $preferences = implode("\",\"",$_SESSION["preferences"]);
        $r = $conn->query("SELECT * FROM articles WHERE category not in (\"$preferences\") ORDER BY uploadDate DESC LIMIT $n");
        $conn->close();
        return $r;
    }

    function getRecentArticles() {
        // If there are prefferences, then get the preffered articles
        if(isset($_SESSION['preferences'])) {
            if(!empty($_SESSION["preferences"])) {
                $r = getPrefferedArticles();
            } else {
                $r = getNRecentArticles(3);
            }
        } else {
            $r = getNRecentArticles(3);
        }

        if($r->num_rows == 0) {
            $r = getNRecentArticles(3);
        }

        // Put the articles in an array
        $articles = array();
        while($row = $r->fetch_assoc()) {
            array_push($articles, $row);
        }

        // If there aren't 2 articles, then get the rest of the articles from the most recent ones
        if(count($articles) < 3) {
            $r = getNRecentNotPrefferedArticles((3-count($articles)));
            while($row = $r->fetch_assoc()) {
                array_push($articles, $row);
            }
        }

        return $articles;
    }