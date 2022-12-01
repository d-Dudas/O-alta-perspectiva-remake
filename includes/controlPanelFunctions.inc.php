<?php

function getSentArticles()
{
    $conn = dbConnect();
    $r = $conn->query("SELECT numeAutor, email, titluArticol, fisierArticol, date_format(dataTrimitere, '%Y/%m/%d %H:%i') as dataTrimitere FROM sent_articles ORDER BY dataTrimitere DESC;");
    $conn->close();
    $articles = array();
    while($row = $r->fetch_assoc()) {
        array_push($articles, $row);
    }

    return $articles;
}

function getSentMessages()
{
    $conn = dbConnect();
    $r = $conn->query("SELECT nume, email, mesaj, date_format(dataTrimitere, '%Y/%m/%d %H:%i') as dataTrimitere FROM sent_messages ORDER BY dataTrimitere DESC;");
    $conn->close();
    $messages = array();
    while($row = $r->fetch_assoc()) {
        array_push($messages, $row);
    }

    return $messages;
}

function getArticleById($id) {
    $conn = dbConnect();
    $r = $conn->query("SELECT * FROM articles WHERE id = '$id' LIMIT 1");
    $conn->close();
    
    return $r->fetch_assoc();
} 