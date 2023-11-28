<?php



$conn = mysqli_connect("localhost","root","","food") or die("Connect Failed");


$limit_per_page = 5;

$page = "";

if(isset($_POST["page_no"])){
    $page = $_POST["page_no"];
}
else
{
    $page = 1;
}

$offset = ($page - 1) * $limit_per_page;



$sql = "SELECT * FROM products LIMIT {$offset},{$limit_per_page}";
$result = mysqli_query($conn,$sql) or die("Sql Query Failed");

$output ="";
if(mysqli_num_rows($result) > 0){


    while($row = mysqli_fetch_assoc($result)){      
        $output .= "
        <form action='' method='post'>
        <div class='col mb-30' >
            <div class='product__items product__items2'>
                <div class='product__items--thumbnail'>
                    <a class='product__items--link' href='product-details.html'>
                        <img class='product__items--img product__primary--img' src='Image/{$row["Product_Image"]}' alt='product-img'>
                        <img class='product__items--img product__secondary--img' src='Image/{$row["Product_sub_img"]}' alt='product-img'>
                    </a>
                    <div class='product__badge'>";
                   


                    if($row["Discount_Price"] <= 0)
                    {                                                                 
                  
                    }
                    else{
                    
                        $output .= "<span class='product__badge--items sale'>Sale</span>";
                   
                    }
                 
                    $output .= "
                       
                    </div>
         
    
    
                       
                    
                    <ul class='product__items--action'>
                        <li class='product__items--action__list'>
                            
                        <a class='product__items--action__btn' href='#'>
                            <input type='submit' style='border:0;background-color:transparent;' class='add__to--cart__btn'  name='add_to_Wishlist' value=''> 
                            <svg class='product__items--action__btn--svg' xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 512 512'><path d='M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/></svg>
                            <span class='visually-hidden'>Wishlist</span>
                        </a>
    
                    
    
                        </li>
                        <li class='product__items--action__list'>
                            <a class='product__items--action__btn' data-open='modal1' href='javascript:void(0)'>
                                <svg class='product__items--action__btn--svg' xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 512 512'><path d='M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z' fill='none' stroke='currentColor' stroke-miterlimit='10' stroke-width='32'/><path fill='none' stroke='currentColor' stroke-linecap='round' stroke-miterlimit='10' stroke-width='32' d='M338.29 338.29L448 448'/></svg>
                                <span class='visually-hidden'>Quick View</span>  
                            </a>
                        </li>
                        <li class='product__items--action__list'>
                            <a class='product__items--action__btn' href='compare.html'>
                                <svg class='product__items--action__btn--svg' xmlns='http://www.w3.org/2000/svg'  viewBox='0 0 512 512'><path fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32' d='M400 304l48 48-48 48M400 112l48 48-48 48M64 352h85.19a80 80 0 0066.56-35.62L256 256'/><path d='M64 160h85.19a80 80 0 0166.56 35.62l80.5 120.76A80 80 0 00362.81 352H416M416 160h-53.19a80 80 0 00-66.56 35.62L288 208' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'/></svg>
                                <span class='visually-hidden'>Compare</span>    
                            </a>
                        </li>
                    </ul>
                </div>
                <div class='product__items--content product__items2--content text-center'>
                   
                    <!-- <a class='add__to--cart__btn' href='#' > </a> -->
                    
    
                    <input type='hidden' name='Product_Name' value='{$row["Product_Name"]}'>
    
    
    
    
                    <input type='hidden' name='Product_Price' value='{$row["Product_Price"]}'>
    
    
    
                    <input type='hidden' name='Product_Image' value='{$row["Product_Image"]}'>
    
    
                    <input type='hidden' name='Product_Qty' value='{$row["Product_Qty"]}'>
    
                  
    
                    
                    <input type='hidden' name='Product_code' value='{$row["Product_code"]}'>
    
                    <input type='hidden' name='Product_Id' value='{$row["Product_Id"]}'>
    
    
    
    
                    <input type='submit' style='border:0;background-color:transparent;' class='add__to--cart__btn'  name='add_to_cart' value='+ Add to cart'> 
               
    
                
                    <h3 class='product__items--content__title h4'><a href='#'>{$row["Product_Name"]}</a></h3>
                    <div class='product__items--price'>";
    
    
                 
                    
                    if($row["Discount_Price"] <= 0 )
                    {
                   
    
                    $output .= "<span class='current__price'>Rs: {$row['Product_Price']} </span>";
                  
                    }
                    else{
                    
                    $output .= " <span class='current__price'>Rs: {$row['Discount_Price']} </span>";  
                    $output .= " <span class='old__price'>Rs: {$row['Product_Price']} </span> ";
    
                    
                    }
                       
                 
                   $output .= " 
                       
    
    
                    </div>
                    <div class='product__items--rating d-flex justify-content-center align-items-center'>
                        <ul class='d-flex'>
                            <li class='product__items--rating__list'>
                                <span class='product__items--rating__icon'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='10.105' height='9.732' viewBox='0 0 10.105 9.732'>
                                    <path  data-name='star - Copy' d='M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z' transform='translate(0 -0.018)' fill='currentColor'/>
                                    </svg>
                                </span>
                            </li>
                            <li class='product__items--rating__list'>
                                <span class='product__items--rating__icon'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='10.105' height='9.732' viewBox='0 0 10.105 9.732'>
                                    <path  data-name='star - Copy' d='M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z' transform='translate(0 -0.018)' fill='currentColor'/>
                                    </svg>
                                </span>
                            </li>
                            <li class='product__items--rating__list'>
                                <span class='product__items--rating__icon'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='10.105' height='9.732' viewBox='0 0 10.105 9.732'>
                                    <path  data-name='star - Copy' d='M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z' transform='translate(0 -0.018)' fill='currentColor'/>
                                    </svg>
                                </span>
                            </li>
                            <li class='product__items--rating__list'>
                                <span class='product__items--rating__icon'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='10.105' height='9.732' viewBox='0 0 10.105 9.732'>
                                    <path  data-name='star - Copy' d='M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z' transform='translate(0 -0.018)' fill='currentColor'/>
                                    </svg>
                                </span>
                            </li>
                            <li class='product__items--rating__list'>
                                <span class='product__items--rating__icon'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='10.105' height='9.732' viewBox='0 0 10.105 9.732'>
                                        <path  data-name='star - Copy' d='M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z' transform='translate(0 -0.018)' fill='#c7c5c2'/>
                                    </svg> 
                                </span>
                            </li>
                        </ul>
                        <span class='product__items--rating__count--number'>(24)</span>
                    </div>
                </div>
            </div>
    
           
        </div>
        </form>";  
    }
    

    $sql_total = 'SELECT * FROM products';
    $records = mysqli_query($conn,$sql_total) or die ('Query Failed');
    $total_record = mysqli_num_rows($records);
    $total_pages = ceil($total_record/$limit_per_page);
    $output .='<div class="product__section--inner product__section--style3__inner" id="pagination">';
    for($i=1; $i <= $total_pages; $i++) { 

    if($i == $page){
        $class_name = "active";
    }
    else{
        $class_name = "";
    }

    $output .="<a href='' id='{$i}'><span class='pagination__item ' .{$class_name}.''>{$i}</span></a>";
    }   
    
    $output .= '</div>';
    echo $output;
}
else{

    echo '<h2><No Record Found </h2>';

}



?>