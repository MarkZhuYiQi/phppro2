<?php
 class Wines extends ProdLoadTemplate implements IProduct
 {
  function getList()
  {
   return [
       ["prod_id"=>301,"prod_name"=>"红酒"],
       ["prod_id"=>302,"prod_name"=>"白酒"],
       ["prod_id"=>303,"prod_name"=>"啤酒"],
       ["prod_id"=>304,"prod_name"=>"洋酒"],
       ["prod_id"=>305,"prod_name"=>"酒精"],
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