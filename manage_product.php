<?php
require('top.inc.php');
$name='';
$categories_id='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc='';
$description='';
$meta_title='';
$meta_desc='';
$meta_keyword='';


$msg='';
$image_required='required';

if(isset($_GET['id']) && $_GET['id']!=''){//if you get id from url
    $image_required='';
    $id=get_safe_value($con,$_GET['id']);
    $res=mysqli_query($con,"select * from product where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0)
    {

    $row=mysqli_fetch_assoc($res);
    $categories_id=$row['categories_id'];
    $name=$row['name'];
    $mrp=$row['mrp'];
    $price=$row['price'];
    $qty=$row['qty'];//retrieving category data
    $short_desc=$row['short_desc'];
    $description=$row['description'];
    $meta_title=$row['meta_title'];
    $meta_desc=$row['meta_desc'];
    $meta_keyword=$row['meta_keyword'];
    }
    else//if try to change id from url then redirect to categories page
    {
        header('location:product.php');//redirect
        die();
    }
}

if(isset($_POST['submit']))//whenever data is submitted it should retrieve the data
{
    $categories_id=get_safe_value($con,$_POST['categories_id']);
    $name=get_safe_value($con,$_POST['name']);
    $mrp=get_safe_value($con,$_POST['mrp']);
    $price=get_safe_value($con,$_POST['price']);
    $qty=get_safe_value($con,$_POST['qty']);
    $short_desc=get_safe_value($con,$_POST['short_desc']);
    $description=get_safe_value($con,$_POST['description']);
    $meta_title=get_safe_value($con,$_POST['meta_title']);
    $meta_desc=get_safe_value($con,$_POST['meta_desc']);
    $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);


    $res=mysqli_query($con,"select * from product where name='$name'");
    $check=mysqli_num_rows($res);
    if($check>0){
        if(isset($_GET['id']) && $_GET['id']!='')
        {
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id'])//record youre trying to edit and the category youre trying to edit will have same name so it shouldnt give error when you try to save it
            {

            }
            else
            {
                $msg="Product already exists";
            }
        }
        else
        {
        $msg="Product already exists";
    }
}

    if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg')
    {
        $msg="Incorrect file format";
    }
    if($msg=='')
    {
        if(isset($_GET['id']) && $_GET['id']!='')
    {
        if($_FILES['image']['name']!='')//to update product details including image
        {
        $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];//to give image random name

        move_uploaded_file($_FILES['image']['tmp_name'],'../media/product/'.$image);

        $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image' where id='$id'";
        }
        else//to update product details not including image
        {
        $update_sql="update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword' where id='$id'";
        }
        
        mysqli_query($con,$update_sql);//to change category name
    }
    else
    {
        $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'../media/product/'.$image);
        mysqli_query($con,"insert into product(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image')");//whatever categories is added theyll start displaying on frontend
    }
    
    header('location:product.php');//redirect
    die();
    }
}

?>
<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small> Form</small></div>
                        <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                           <div class="form-group">
                               <label for="categories" class=" form-control-label">Categories</label>
                               <select class=" form-control" name="categories_id">
                                   <option>Select Category</option>
                                   <?php
                                   $res=mysqli_query($con,"select id,categories from categories order by categories asc");
                                   while($row=mysqli_fetch_assoc($res)){
                                       if($row['id']==$categories_id)
                                       {
                                           echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                       }
                                       else
                                       {
                                           echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                       }
                                       
                                   }
                                   ?>

                               </select>
                            </div>
                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Product Name</label>
                               <input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
                            </div>

                            <div class="form-group">
                               <label for="categories" class=" form-control-label">MRP</label>
                               <input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp?>">
                            </div>

                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Price</label>
                               <input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
                            </div>

                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Product Qty</label>
                               <input type="text" name="qty" placeholder="Enter product qty" class="form-control" required value="<?php echo $qty?>">
                            </div>

                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Product Image</label>
                               <input type="file" name="image"  class="form-control" <?php echo $image_required ?>
                            </div>

                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Short Description</label>
                               <textarea name="short_desc" placeholder="Enter product short description" class="form-control" required> <?php echo $short_desc?></textarea>
                            </div>

                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Description</label>
                               <textarea name="description" placeholder="Enter product description" class="form-control" required> <?php echo $description?></textarea>
                            </div>

                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Meta Title</label>
                               <textarea name="meta_title" placeholder="Enter product meta title" class="form-control"> <?php echo $meta_title?></textarea>
                            </div>

                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Meta Description</label>
                               <textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"> <?php echo $meta_desc?></textarea>
                            </div>

                            <div class="form-group">
                               <label for="categories" class=" form-control-label">Meta Keyword</label>
                               <textarea name="meta_keyword" placeholder="Enter meta keyword" class="form-control" > <?php echo $meta_keyword?></textarea>
                            </div>
                           

                           <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                           <span id="payment-button-amount">Submit</span>
                           </button>
                           <div class="field_error"><?php echo $msg?></div>
                        </div>

                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>         
<?php
require('footer.inc.php');
?>