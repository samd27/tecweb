<?php
namespace TECWEB\CONTROLLER;

use TECWEB\MODEL\Products as Products;
require_once __DIR__ . '/../Model/Products.php';

class ProductController{
    private $productObj;

    public function __construct(){
        $this->productObj = new Products('root','samd2704','marketzone');
    }

    public function productCase() {
        $action = $_GET['action'] ?? $_POST['action'] ?? null;

        switch ($action) {
            case 'list':
                $this->list();
                break;
            case 'add':
                $this->add($_POST);
                break;
            case 'edit':
                $this->edit($_POST);
                break;
            case 'delete':
                $this->delete($_POST['id']);
                break;
            case 'search':
                $this->search($_GET['query']);
                break;
            case 'single':
                $this->single($_POST['id']);
                break;
            case 'checkName':
                $this->checkName($_POST['nombre']);
                break;
            default:
                echo json_encode(['status' => 'error', 'message' => 'Acción no válida']);
        }
    }

    public function list() {
        $this->productObj->list();
        echo $this->productObj->getData();
    }

    public function add($data) {
        $this->productObj->add($data);
        echo $this->productObj->getData();
    }

    public function edit($data) {
        $this->productObj->edit($data);
        echo $this->productObj->getData();
    }

    public function delete($id) {
        $this->productObj->delete(['id' => $id]);
        echo $this->productObj->getData();
    }

    public function search($query) {
        $this->productObj->search($query);
        echo $this->productObj->getData();
    }

    public function single($id) {
        $this->productObj->single($id);
        echo $this->productObj->getData();
    }

    public function checkName($name) {
        $this->productObj->checkName($name);
        echo $this->productObj->getData();
    }
}

$controller = new ProductController();
$controller->productCase();

?>