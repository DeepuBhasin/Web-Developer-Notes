<?php  
      
    class base  
    {  
        final public function dis1()  							// final key word for function 
        {  
            echo "Base class..";  
        }     
    }  
    class derived extends base  
    {  
        public function dis1()  								// this will give an erro 
        {  
            echo "derived class";  
        }  
    }  
    $obj = new derived();  
    $obj->dis1();  
  
?>  