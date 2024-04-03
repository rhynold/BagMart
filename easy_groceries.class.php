<?php

class EasyGroceries {

    public $dbo = "";
    public $province = "";
    public $day = "";

    public function __construct () {
        require_once("./inc/connect_pdo.php");
        $this->dbo = $dbo;
    }


    public function convertFancyQuotes ($str) {
        return str_replace(array(chr(145),chr(146),chr(147),chr(148),chr(151)),array("'","'",'"','"','-'),$str);
    }

    public function createSalt () {
        srand(time());				
        $pool = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        for($index = 0; $index < 2; $index++) {
            $salt .= substr($pool,(rand()%(strlen($pool))), 1);
        }
        return $salt;
    }

    public function encryptPassword ($password, $salt) {
        $password = sha1($password . $salt);
        for($index = 0; $index < 13; $index++) {
            $password = sha1($password . $salt);
        }
        return $password;
    }

    public function createSession () {
        srand(time());				
        $pool = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        for($index = 0; $index < 64; $index++) {
            $session .= substr($pool,(rand()%(strlen($pool))), 1);
        }
        return $session;
    }

    public function createAccount ($email, $name_last, $name_first, $password) {
        // create salt
        $salt = $this->createSalt();

        // encrypt password
        $encrypt_password = $this->encryptPassword($password, $salt);

        // save account
        $error_code = "0";
        $error_message = "";

        try {
            $query = "INSERT INTO ea_user
            SET email = '$email',
            password = '$encrypt_password',
            salt = '$salt',
            billing_name_last = '$name_last',
            billing_name_first = '$name_first' ";

            $this->dbo->query($query);

        } catch (PDOException $e) {
            $error_code = "1";
            $error_message = "PDOException for createAccount. $e";
        }

        $error["id"] = $error_code;
        $error["error_message"] = $error_message;
        
        $data["error"] = $error;
        $data["query"] = str_replace("\n"," ",$query);
        
        $data = json_encode($data);

        return $data;

    }

    public function loginAccount ($email, $password) {
        // get salt
        $email = addslashes($email);

        $query = "SELECT salt
        FROM ea_user
        WHERE email = '$email' ";
        foreach ($this->dbo->query($query) as $row) {
            $salt = $row[0];
        }

        // encrypt password
        $encrypt_password = $this->encryptPassword($password, $salt);

        // save account
        $error_code = "0";
        $error_message = "";

        try {
            $x = false;
            $query = "SELECT ea_user_id, billing_name_first, billing_name_last, billing_address
            FROM ea_user
            WHERE email = '$email'
            AND password = '$encrypt_password' ";
            //print("$query");
            foreach($this->dbo->query($query) as $row) {
                $ea_user_id = stripslashes($row[0]);
                $billing_name_first = stripslashes($row[1]);
                $billing_name_last = stripslashes($row[2]);
                $billing_address = stripslashes($row[3]);
                $x = true;
                
                $user["ea_user_id"] = $ea_user_id;
                $user["billing_name_first"] = $billing_name_first;
                $user["billing_name_last"] = $billing_name_last;
                $user["billing_address"] = $billing_address;
                $user["email"] = $username;
            }

            if (!$x) {
                $errorCode = 200;
                $errorMessage = "Your email and password do not match!";                    
            } else {
                $session = $this->createSession();
                $mytime = time();
                $query = "INSERT INTO ea_session
                SET ea_user_id = '$ea_user_id',
                session_id = '$session',
                date_start = '$mytime',
                date_end = '$mytime' ";

                $this->dbo->query($query);
            }


        } catch (PDOException $e) {
            $error_code = "1";
            $error_message = "PDOException for loginAccount. $e";
        }

        $error["id"] = $error_code;
        $error["error_message"] = $error_message;
        
        $data["error"] = $error;
        $data["user"] = $user;
        $data["query"] = str_replace("\n"," ",$query);
        
        $data = json_encode($data);

        return $data;

    }


    public function getCategories () {
        
        $error_code = "0";
        $error_message = "";

        try {
            $query = "SELECT id, name
            FROM ea_category
            ORDER BY name ";

            foreach ($this->dbo->query($query) as $row) {
                $id = $row[0];
                $name = $this->convertFancyQuotes(stripslashes($row[1]));
                $url = str_replace(" ","",$name);

                $category["id"] = $id;
                $category["name"] = $name;
                $category["url"] = $url;

                $categories[] = $category;
            }

        } catch (PDOException $e) {
            $error_code = "1";
            $error_message = "PDOException for getCategories. $e";
        }

        $error["id"] = $error_code;
        $error["error_message"] = $error_message;
        
        $data["error"] = $error;
        $data["categories"] = $categories;
        $data["query"] = str_replace("\n"," ",$query);
        
        $data = json_encode($data);

        return $data;
    }

    public function getHints ($search) {
        
        $error_code = "0";
        $error_message = "";

        try {

            $words = explode(' ', trim($search));
            $regex = implode('|', $words);

            $query1 = "SELECT ea_product.brand, ea_product.product_name, ea_category.name
            FROM ea_product, ea_category
            WHERE ea_product.category_id = ea_category.id
            AND (ea_product.upc REGEXP '{$regex}'
            OR ea_product.brand REGEXP '{$regex}'
            OR ea_category.name REGEXP '{$regex}'
            OR ea_product.product_name REGEXP '{$regex}')
            ORDER BY ea_product.avg_price 
            LIMIT 0, 10 ";

            foreach ($this->dbo->query($query1) as $row) {
                $brand = $this->convertFancyQuotes(stripslashes($row[0]));
                $product_name = $this->convertFancyQuotes(stripslashes($row[1]));
                $category_name = $this->convertFancyQuotes(stripslashes($row[2]));

                $product["$brand"] = $brand;
                $product["$category_name"] = $category_name;
                $product["$product_name"] = $product_name;

            }
            
            // reduce array length
            array_splice($product, 10);
            $x = 0;
            foreach($product as $value) {
                $products[$x] = "$value";
                ++$x;
            }

            if (empty($search)) {
                $error_code = "-1";
                $error_message = "Nothing Searched on.";
            } else {
                if (count($products) == 0) {
                    $error_code = "-2";
                    $error_message = "The Searchs for found.";
                }
            }

            

        } catch (PDOException $e) {
            $error_code = "1";
            $error_message = "PDOException for getCategories. $e";
        }

        $error["id"] = $error_code;
        $error["error_message"] = $error_message;
        
        $data["error"] = $error;
        $data["products"] = $products;
        $data["query"] = str_replace("\n"," ",$query);
        $data["query1"] = str_replace("\n"," ",$query1);
        
        $data = json_encode($data);

        return $data;
    }

    public function getSearch ($search) {
        
        $error_code = "0";
        $error_message = "";

        try {

            $words = explode(' ', trim($search));
            $regex = implode('|', $words);

            $query1 = "SELECT ea_product.id, ea_product.upc, ea_product.family_id, 
            ea_product.brand, ea_product.product_name, 
            ea_product.product_description, ea_product.avg_price, 
            ea_product.taxable, ea_product.unit, ea_product.stars
            FROM ea_product
            WHERE (ea_product.upc REGEXP '{$regex}'
            OR ea_product.brand REGEXP '{$regex}'
            OR ea_product.product_name REGEXP '{$regex}')
            ORDER BY ea_product.avg_price ";

            foreach ($this->dbo->query($query1) as $row) {
                $id = $row[0];
                $upc = $this->convertFancyQuotes(stripslashes($row[1]));
                $family_id = $this->convertFancyQuotes(stripslashes($row[2]));
                $brand = $this->convertFancyQuotes(stripslashes($row[3]));
                $product_name = $this->convertFancyQuotes(stripslashes($row[4]));
                $product_description = $this->convertFancyQuotes(stripslashes($row[5]));
                $avg_price = $this->convertFancyQuotes(stripslashes($row[6]));
                $taxable = $this->convertFancyQuotes(stripslashes($row[7]));
                $unit = $this->convertFancyQuotes(stripslashes($row[8]));
                $stars = $this->convertFancyQuotes(stripslashes($row[9]));
                $category_name = $this->convertFancyQuotes(stripslashes($row[10]));
                $category_url = str_replace(" ","",$category_name);
                $url = str_replace(" ","",$product_name);


                $product["id"] = $id;
                $product["product_name"] = $product_name;
                $product["family_id"] = $family_id;
                $product["brand"] = $brand;
                $product["upc"] = $upc;
                $product["product_description"] = $product_description;
                $product["avg_price"] = $avg_price;
                $product["taxable"] = $taxable;
                $product["unit"] = $unit;
                $product["stars"] = $stars;
                $product["category_name"] = $category_name;
                $product["category_url"] = $category_url;
                $product["url"] = $url;

                $products[] = $product;

            }
            
            

            if (empty($search)) {
                $error_code = "-1";
                $error_message = "Nothing Searched on.";
            } else {
                if (count($products) == 0) {
                    $error_code = "-2";
                    $error_message = "The Searchs for found.";
                }
            }

            

        } catch (PDOException $e) {
            $error_code = "1";
            $error_message = "PDOException for getCategories. $e";
        }

        $error["id"] = $error_code;
        $error["error_message"] = $error_message;
        
        $data["error"] = $error;
        $data["products"] = $products;
        $data["query"] = str_replace("\n"," ",$query);
        $data["query1"] = str_replace("\n"," ",$query1);
        
        $data = json_encode($data);

        return $data;
    }

    public function getImage ($upc) {

        $query1 = "SELECT file
        FROM ea_images
        WHERE upc = '$upc'  ";
        foreach ($this->dbo->query($query1) as $row) {
            $file = $row[0];
        }
        $folder = substr($upc, 0, 4);
        $path = "images/$folder/$file";

        if (empty($file)) {
            $path = "images/missing/image/path.png"; 
        }
        return $path;
    }

    public function getProductsByCart ($json) {
		
        $errorCode = 0;
		$errorMessage = "";
        
		try {
            
			$cart_array = json_decode($json, true);
            //var_dump($cart_array);
            $list = "";
            $cart = array();
            foreach ($cart_array as $key=>$value) {
                if ($list == "") {
                    $list = "$key"; 
                } else {
                    $list .= ",$key";
                }
                $cart[$key] = $value;
            }
            
            $query = "SELECT ea_product.id, upc, brand, product_name, 
            product_description, avg_price, ea_category.name, ea_product.taxable
			FROM ea_product, ea_category
            WHERE ea_product.category_id = ea_category.id
            AND ea_product.id IN ($list)
			ORDER BY avg_price";
            // print("\r\n$query\r\n");
			foreach($this->dbo->query($query) as $row) {
				$id = stripslashes($row[0]);
				$upc = strval(stripslashes($row[1]));
				$brand = $this->convertFancyQuotes(stripslashes($row[2]));
				$product_name = $this->convertFancyQuotes(stripslashes($row[3]));
				$product_description = $this->convertFancyQuotes(stripslashes($row[4]));
				$avg_price = stripslashes($row[5]);
				$category_name = $this->convertFancyQuotes(stripslashes($row[6]));
                $taxable = stripslashes($row[7]);
                
                $product["id"] = $id;
                $product["upc"] = $upc;
                $product["brand"] = $brand;
                $product["product_name"] = $product_name;
                $product["product_description"] = $product_description;
                $product["avg_price"] = $avg_price;
                $product["category_name"] = $category_name;
                $product["quantity"] = "$cart[$id]"; 
                $product["taxable"] = $taxable; 
                //
                
                $product["image_path"] = $this->getImage($upc);
                
                $products[] = $product;
			}
	       
		} catch (PDOException $e) {
			$this->errorCode = 1;
			$errorCode = -1;
			$errorMessage = "PDOException for getProductsByCategory.";
		}	
        
        
		$error["id"] = $errorCode;
		$error["message"] = $errorMessage;
		
		$data["error"] = $error;
		
		$data["search"] = $category_name;
        $data["query"] = $query;
        
        $data["products"] = $products;
		
		
        
        
        $data = json_encode($data);
        
		return $data;
	}

    public function getProducts ($category_name) {
        
        $error_code = "0";
        $error_message = "";

        try {

        

            $query1 = "SELECT ea_product.id, ea_product.upc, ea_product.family_id, 
            ea_product.brand, ea_product.product_name, 
            ea_product.product_description, ea_product.avg_price, 
            ea_product.taxable, ea_product.unit, ea_product.stars, 
            ea_category.name
            FROM ea_product, ea_category
            WHERE ea_product.category_id = ea_category.id
            AND REPLACE(ea_category.name, ' ', '') LIKE '$category_name' 
            ORDER BY ea_product.avg_price ";

            foreach ($this->dbo->query($query1) as $row) {
                $id = $row[0];
                $upc = $this->convertFancyQuotes(stripslashes($row[1]));
                $family_id = $this->convertFancyQuotes(stripslashes($row[2]));
                $brand = $this->convertFancyQuotes(stripslashes($row[3]));
                $product_name = $this->convertFancyQuotes(stripslashes($row[4]));
                $product_description = $this->convertFancyQuotes(stripslashes($row[5]));
                $avg_price = $this->convertFancyQuotes(stripslashes($row[6]));
                $taxable = $this->convertFancyQuotes(stripslashes($row[7]));
                $unit = $this->convertFancyQuotes(stripslashes($row[8]));
                $stars = $this->convertFancyQuotes(stripslashes($row[9]));
                $category_name = $this->convertFancyQuotes(stripslashes($row[10]));
                $category_url = str_replace(" ","",$category_name);
                $url = str_replace(" ","",$product_name);
                $image = $this->getImage($upc);

                $product["id"] = $id;
                $product["product_name"] = $product_name;
                $product["family_id"] = $family_id;
                $product["brand"] = $brand;
                $product["upc"] = $upc;
                $product["product_description"] = $product_description;
                $product["avg_price"] = $avg_price;
                $product["taxable"] = $taxable;
                $product["unit"] = $unit;
                $product["stars"] = $stars;
                $product["category_name"] = $category_name;
                $product["category_url"] = $category_url;
                $product["url"] = $url;
                $product["image"] = $image;

                $products[] = $product;
            }



            if (empty($url)) {
                $error_code = "-1";
                $error_message = "The Category does not exist";
            } else {
                if (count($products) == 0) {
                    $error_code = "-2";
                    $error_message = "The Products for this Category";
                }
            }

            

        } catch (PDOException $e) {
            $error_code = "1";
            $error_message = "PDOException for getCategories. $e";
        }

        $error["id"] = $error_code;
        $error["error_message"] = $error_message;
        
        $data["error"] = $error;
        $data["products"] = $products;
        $data["query"] = str_replace("\n"," ",$query);
        $data["query1"] = str_replace("\n"," ",$query1);
        
        $data = json_encode($data);

        return $data;
    }
    public function getProduct ($product_name, $upc) {
        
        $error_code = "0";
        $error_message = "";

        try {

            if (empty($upc)) {
                $query1 = "SELECT ea_product.id, ea_product.upc, ea_product.family_id, 
                ea_product.brand, ea_product.product_name, 
                ea_product.product_description, ea_product.avg_price, 
                ea_product.taxable, ea_product.unit, ea_product.stars, 
                ea_category.name
                FROM ea_product, ea_category
                WHERE ea_product.category_id = ea_category.id
                AND REPLACE(ea_product.product_name, ' ', '') LIKE '$product_name' ";
            } else {
                $query1 = "SELECT ea_product.id, ea_product.upc, ea_product.family_id, 
                ea_product.brand, ea_product.product_name, 
                ea_product.product_description, ea_product.avg_price, 
                ea_product.taxable, ea_product.unit, ea_product.stars, 
                ea_category.name
                FROM ea_product, ea_category
                WHERE ea_product.category_id = ea_category.id
                AND ea_product.upc = '$upc' ";
            }
            
            foreach ($this->dbo->query($query1) as $row) {
                $id = $row[0];
                $upc = $this->convertFancyQuotes(stripslashes($row[1]));
                $family_id = $this->convertFancyQuotes(stripslashes($row[2]));
                $brand = $this->convertFancyQuotes(stripslashes($row[3]));
                $product_name = $this->convertFancyQuotes(stripslashes($row[4]));
                $product_description = $this->convertFancyQuotes(stripslashes($row[5]));
                $avg_price = $this->convertFancyQuotes(stripslashes($row[6]));
                $taxable = $this->convertFancyQuotes(stripslashes($row[7]));
                $unit = $this->convertFancyQuotes(stripslashes($row[8]));
                $stars = $this->convertFancyQuotes(stripslashes($row[9]));
                $category_name = $this->convertFancyQuotes(stripslashes($row[10]));
                $category_url = str_replace(" ","",$category_name);
                $url = str_replace(" ","",$product_name);


                $product["id"] = $id;
                $product["product_name"] = $product_name;
                $product["family_id"] = $family_id;
                $product["brand"] = $brand;
                $product["upc"] = $upc;
                $product["product_description"] = $product_description;
                $product["avg_price"] = $avg_price;
                $product["taxable"] = $taxable;
                $product["unit"] = $unit;
                $product["stars"] = $stars;
                $product["category_name"] = $category_name;
                $product["category_url"] = $category_url;
                $product["url"] = $url;

                $products[] = $product;
            }



            if (empty($url)) {
                $error_code = "-1";
                $error_message = "The Product does not exist";
            } else {
                if (count($products) == 0) {
                    $error_code = "-2";
                    $error_message = "There are no Products for this Category";
                }
            }

            

        } catch (PDOException $e) {
            $error_code = "1";
            $error_message = "PDOException for getProduct. $e";
        }

        $error["id"] = $error_code;
        $error["error_message"] = $error_message;
        
        $data["error"] = $error;
        $data["products"] = $products;
        $data["query"] = str_replace("\n"," ",$query);
        $data["query1"] = str_replace("\n"," ",$query1);
        
        $data = json_encode($data);

        return $data;
    }
    
}


?>