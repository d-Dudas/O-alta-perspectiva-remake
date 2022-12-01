<?php

    function getRecentArticles(){
        $conn = dbConnect();
        $r = $conn->query("SELECT * FROM articles ORDER BY uploadDate DESC LIMIT 3");
        $conn->close();
        $articles = array();
        while($row = $r->fetch_assoc()) {
            array_push($articles, $row);
        }

        return $articles;
    }

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

    function getSuggestedNews() {
        $conn = dbConnect();
        $r = $conn->query("SELECT * FROM suggestedarticles ORDER BY dataTrimitere DESC LIMIT 2");
        $conn->close();
        $news = array();
        while($row = $r->fetch_assoc()) {
            array_push($news, $row);
        }

        return $news;
    }