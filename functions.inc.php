<?php

function pr($arr){
echo '<pre>';
print_r($arr);
}

function prx($arr){
echo '<pre>';
print_r($arr);
die();
}

function get_safe_value($con,$str){
    if($str!=''){
        $str=trim($str);
return mysqli_real_escape_string($con,$str);
    }
}

function get_product($con, $cat_id='', $product_id='', $search_str=''){
    $sql="select product.*,categories.categories from product,categories where product.status=1 ";
    if($cat_id!='')
    {
        $sql.=" and product.categories_id=$cat_id ";
    }
    if($product_id!='')
    {
        $sql.=" and product.id=$product_id ";
    }
    $sql.=" and product.categories_id=categories.id";
    if($search_str!='')
    {
        $sql.=" and (product.name like '%$search_str%' or product.description like '%$search_str%')";
    }
    $sql.=" order by product.id desc";
    $res=mysqli_query($con, $sql);
    $data=array();
    while ($row=mysqli_fetch_assoc($res)){
        $data[]=$row;
    }
    return $data;
}

?>