<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Mvc\Dispatcher;

class BookController extends Controller
{
    public function indexAction()
    {
        $this->view->books = Books::find();
    }

    public function showAction($id)
    {
        $book = $this->modelsManager->createBuilder()->from('books')->where('books.id = '.$id.'')->getQuery()->getSingleResult();
        $this->view->book = $book;
    }

    public function addAction()
    {
        $book = new Books();

        $book->assign(
            $this->request->getPost(),
            null,
            [
                "title",
                "summary",
                "release_date",
            ]
        );

        $sql     = "INSERT INTO `books` (`id`, `author_id`, `title`, `summary`, `release_date`) 
        VALUES (NULL, '2', '$book->title', '$book->summary', '$book->release_date' );";

        $connection = new Mysql(
            [
                'host'     => 'localhost',
                'username' => 'root',
                'password' => '',
                'dbname'   => 'phalcon',
            ]
        );

        $success = $connection->execute($sql);

        $this->response->redirect(BASE_URL.'/book');
        $this->view->disable();

        
    }

    public function updateAction()
    {
        $book = new Books();

        $book->assign(
            $this->request->getPost(),
            null,
            [
                "id",
                "title",
                "summary",
                "release_date",
            ]
        );

        $sql = "UPDATE `books`
        SET `title` = '$book->title', `summary` = '$book->summary', `release_date` = '$book->release_date'
        WHERE `id`= '$book->id';"; 

        $connection = new Mysql(
            [
                'host'     => 'localhost',
                'username' => 'root',
                'password' => '',
                'dbname'   => 'phalcon',
            ]
        );

        $success = $connection->execute($sql);

        $this->response->redirect(BASE_URL.'/book');
        $this->view->disable();
    }

    public function editAction($id)
    {
        $book = $this->modelsManager->createBuilder()->from('books')->where('books.id = '.$id.'')->getQuery()->getSingleResult();
        $this->view->book = $book;
    }

    public function deleteAction($id)
    {
        $sql     = "DELETE FROM `books` WHERE `id`= $id;";

        $connection = new Mysql(
            [
                'host'     => 'localhost',
                'username' => 'root',
                'password' => '',
                'dbname'   => 'phalcon',
            ]
        );

        $success = $connection->execute($sql);

        $this->response->redirect(BASE_URL.'/book');
        $this->view->disable();
    }

    public function registerAction()
    {

    }
}