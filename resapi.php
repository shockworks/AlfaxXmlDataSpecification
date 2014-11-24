<?php

/**
 * Router nejak prijme pozadovanou url adresu a odesila data.
 */
class Router
{
    /**
     * pro priklad vezmu /product[category.id=15&category.main_category=true&archived=0]/variant/
     * @param type $url
     */
    public function processAndSend($url)
    {
        parseUrl(); // provede nejaky preg_match a najde spravny model, where, apod.      
        $class = 'Product';
        $where = 'category.id=15&category.main_category=true&archived=0';
        $mainModel = new $class(); 
        $objects = $mainModel->selector($where);
    }    
}



class Product
{
    private $tableName = 'c_products';
    
    /**
     * @rest allow
     * @var type 
     */
    public $id;
    
    /**
     * @rest allow
     * @var type 
     */
    public $name;
    
    /**
     * @rest allow
     * @var type 
     */
    public $description;
    
    public function selector($where)
    {
        $columns = getAllowedColumns;
        $where = $this->processWhere($where);
        dibi::query('SELECT $columns FROM $tableName WHERE $where');
    }
    
    private function processWhere()
    {
        if ($where contain 'neco s teckou'){
            $tables = 'JOIN c_categories JOIN c_link_product_category';
        }
        
    }
}