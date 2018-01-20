<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
    public function actionCard()
    {
        $id = $_GET["id"] ?: 1;
        $product = Product::getOne($id);

        if ($this->useLayout) {
            $structure = ["layouts/main" => [
                "title" => "Product Card",
                "header" => "Это header",
                "content" => [
                    "product/card" => [
                        "product" => $product
                    ]
                ],
                "footer" => "Это footer"
            ]];
        } else {
            $structure = ["product/card" => [
                "product" => $product
            ]];
        }
        echo $this->renderStructure($structure);
    }
}