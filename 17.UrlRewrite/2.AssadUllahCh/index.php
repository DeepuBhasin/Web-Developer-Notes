<h1>This is Index Page</h1>
<pre> 
<?php
// suppose this data is coming from the Database

function show_product($cat_is=null,$product_id=null){
    $product = [
        ['cat_id'=>111,'product_id'=>1,'name'=>'Nike Sneakers'],
        ['cat_id'=>112,'product_id'=>2,'name'=>'Samsung Galaxy'],
        ['cat_id'=>113,'product_id'=>3,'name'=>'iphone 7'],
        ['cat_id'=>114,'product_id'=>4,'name'=>'Macbook'],

    ];

    foreach($product as $product){
        if($product['cat_id']==$cat_is && $product['product_id']==$product_id){
            return $product;
        }
    }
}
if(isset($_GET['url'])){
    $url = $_GET['url'];
    $url = explode('/',$url);
        // print_r($url);

        if($url[0]=='show_product'){
            $cat_is = $url[1];
            $product_id = $url[2];
            $product = show_product($cat_is,$product_id);
            print_r($product);
        }else{
            echo "Not Found";
        }
}
else{
    echo "missing of Arrgument";
}




?>