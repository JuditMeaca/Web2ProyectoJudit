<?php

class CategoriesAndItemsController{

    public function showCategories(){

        $this->view->viewCategories();
    }

    public function showItems(){

        $this->view->viewItems();
    }

    public function showItemsByCategories(){

        $this->view->viewItemsByCategories();
    }

}