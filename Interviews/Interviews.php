<?php 


// *
// **
// ***
// ****
// *****

	for($i=1;$i<=5;$i++){
		for($j=1; $j<=$i;$j++)
		{	
			echo "*";
		}
		echo "<br/>";
	}

	echo "<br/>";

// 3. *****
//    ****
//    ***
//    **
//    *  	
	for($i=1;$i<=5;$i++){
		for($j=$i; $j<=5;$j++)
		{	
			echo "*";
		}
		echo "<br/>";
	}


//            *
//           **
//          ***
//         ****
//        *****

	for($i=1;$i<=5;$i++){
		for($j=1; $j<=$i;$j++)
		{	
			echo "*";
		}
		echo "<br/>";
	}

// *
// **
// ***
// ****
// *****
// *****
// ****
// ***
// **
// *	
	$line = 5;
	//$half = ceil($line/2);

	for($i=1;$i<=$line;$i++)
	{

	     for($j=1;$j<=$i;$j++)
	    {
	         echo "*";
	    } 
	  echo "\n";
	  } 
	for($i=1;$i<=$line;$i++)
	{

	     for($j=$line;$j>$i;$j--)
	    {
	         echo "*";
	    } 
	  echo "\n";
	  }
	  

$input = [9, -3, 5, -2, -8, -6, 1, 3];

$count = count($input);
$newArrayPsoitive=[];
$newArrayNegative=[];


foreach($input as $key=>$value)
{
  if($value>0){
    
      $newArrayPsoitive[]=$value;
  }else{
      $newArrayNegative[]=$value;
  }
}

$output=[];
$new = count($newArrayPsoitive);
for($i=0;$i<$new;$i++){
  array_push($output,$newArrayPsoitive[$i]);
  array_push($output,$newArrayNegative[$i]);
}

foreach($output as $key=>$value){
  
  echo $key.' : '.$value."\n";
  
}


// // // Liner sorting array
// $array=[9,15,5,4,7,2,1,3,10,13,11,6];

// $temp=0;
// $countArray = count($array);

// for($i=0;$i<$countArray;$i++){
//   for($j=$i+1; $j<$countArray;$j++){

//         if($array[$i]>$array[$j])
//         {
//             $temp = $array[$i];
//             $array[$i]=$array[$j];
//             $array[$j]= $temp;
//         }
//   }
// }


// echo "<pre>";
// print_r($array);









// // prim number array 

// for($i = 2; $i <= 100; $i++){
//       $mm = 0;
//       for($j = 2; $j < $i/2; $j++)
//       {
// 		    	if ($i % $j == 0)
//         	{
//               $mm++;
//               break;
//           }
//       }
//       if ($mm == 0) 
//       {
//             echo"$i is prime number<br/>";
//       }
//     }




//  function Palindrome($number){ 
//     $temp = $number; 
//     $new = 0; 
//     while (floor($temp)) { 
//         $d = $temp % 10; 
//         $new = $new * 10 + $d; 
//         $temp = $temp/10; 
//     } 
//     if ($new == $number){ 
//         return 1; 
//     }
//     else{
//         return 0;
//     }
// } 
// $original = 123454321;
// if (Palindrome($original)){ 
//     echo "Palindrome"; 
// }
// else { 
// echo "Not a Palindrome"; 
// }   




// $num = 23;  
// $revnum = 0;  
// while ($num > 1)  
// {  
// $rem = $num % 10;  


// $revnum = ($revnum * 10) + $rem;  
// $num = ($num / 10);   
// }  
// echo "Reverse number of 23 is: $revnum";  
//	







?>