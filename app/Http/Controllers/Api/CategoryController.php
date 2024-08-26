<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Метод получения массива категорий в виде иерархического дерева
     * @return json Возвращает дерево категорий в формате json
     */
    public function index()
    {
        $categoriesAll = Category::get()->toArray();
        $CategoryAllStructure = array();

        //получ массив всех категорий НО структурированный ,где элементы  первого уровня будут массивы родителей
        //  и поле parent_id (в родительских категориях) меняем с null на 0
        foreach ($categoriesAll as $key => $item) {
            if (is_null($item['parent_id'])) {
                $item['parent_id'] = 0;
            }
            $CategoryAllStructure[$item['parent_id']][$item['id']] = $item;
        }
        $CategoryParents = $CategoryAllStructure[0];
        $treeMass = $this->getTree($CategoryParents, $CategoryAllStructure);
        return json_encode($treeMass, JSON_FORCE_OBJECT);
    }

    /**
     * Метод использует рекурсивную функцию , при каждом шаге обращаясь к новому массиву $CategoryParents
     */

    protected function getTree(&$CategoryParents, $CategoryAllStructure)
    {
        foreach ($CategoryParents as $key => $item) {
            if (!isset($item['categoryChildren'])) {
                $CategoryParents[$key]['categoryChildren'] = array();
            }
            if (array_key_exists($key, $CategoryAllStructure)) {
                $CategoryParents[$key]['categoryChildren'] = $CategoryAllStructure[$key];
                $this->getTree($CategoryParents[$key]['categoryChildren'], $CategoryAllStructure);
            }
        }
        return $CategoryParents;
    }

    /**
     * Метод для тестирования массива
     */
    protected function printArr($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';

    }
}
