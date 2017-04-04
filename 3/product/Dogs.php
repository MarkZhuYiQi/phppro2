<?php
class Dogs extends ProdLoadTemplate implements IProduct
{
    function getList()
    {
        return [
            ["prod_id"=>201,"prod_name"=>"斑点"],
            ["prod_id"=>202,"prod_name"=>"泰迪"],
            ["prod_id"=>203,"prod_name"=>"二哈"],
            ["prod_id"=>204,"prod_name"=>"金毛"],
            ["prod_id"=>205,"prod_name"=>"杂交"],
        ];


    }

    function setClick($id)
    {
        // TODO: Implement setClick() method.
    }

    function setLog($id)
    {
        // TODO: Implement setLog() method.
    }
}