<?php
namespace App\Controllers;


class HomeController {

    private $curso;
    private $capitulo;

    public function __construct(){
        $this->curso = new \App\Models\Cursos;
        $this->capitulo = new \App\Models\Capitulos;
    }

    public function index() {
        $page = array(
            "title" => "Inicio",
            "h" =>"active",
            "l" => "");

        require_once _VIEW_PATH_ . 'header.php';
        require_once _VIEW_PATH_ .'home/index.php';
        require_once _VIEW_PATH_ . 'footer.php';
    }

    public function listar(){
        $page = array(
            "title" => "Cursos",
            "h" =>"",
            "l" => "active");

        $cursos = $this->curso->listar();
        require_once _VIEW_PATH_ . 'header.php';
        require_once _VIEW_PATH_ .'home/listar.php';
        require_once _VIEW_PATH_ . 'footer.php';
    }

      public function curso(){
        if (isset($_REQUEST["id"])) {
            $data = $this->curso->obtener($_REQUEST["id"]);
            $caps = $this->capitulo->obtener($_REQUEST["id"]);
        }
        $page = array(
            "title" => "Curso",
            "h" =>"",
            "l" => "active");

        $cursos = $this->curso->listar();
        
        require_once _VIEW_PATH_ . 'header.php';
        require_once _VIEW_PATH_ .'home/edit.php';
        require_once _VIEW_PATH_ . 'footer.php';
    }
}