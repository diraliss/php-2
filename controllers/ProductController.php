<?php

namespace app\controllers;


use app\models\repositories\ProductRepository;

class ProductController extends Controller
{

    private function getRepository()
    {
        return new ProductRepository();
    }

    public function actionCard()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 1;
        $product = $this->getRepository()->getOne($id);

        if ($this->useLayout) {
            echo $this->render("layouts/main", [
                "title" => "Product Card",
                "header" => "Это header",
                "content" => [
                    "product/card" => [
                        "product" => $product
                    ]
                ],
                "footer" => "Это footer"
            ]);
        } else {
            echo $this->render("product/card", [
                "product" => $product
            ]);
        }
    }

    public function actionIndex()
    {
        $products = $this->getRepository()->getAll();

        if ($this->useLayout) {
            echo $this->render("layouts/main", [
                "title" => "Product Catalog",
                "header" => "Это header",
                "content" => [
                    "product/index" => [
                        "products" => $products
                    ]
                ],
                "footer" => "Это footer"
            ]);
        } else {
            echo $this->render("product/index", [
                "products" => $products
            ]);
        }
    }
}