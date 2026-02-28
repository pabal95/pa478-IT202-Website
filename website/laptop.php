<!-- -- #Pabal Ahmed
-- #IT202-004
-- #pa478@njit.edu
-- #2/27/2026 -->

<?php
require_once('database.php');
class Laptop
{
   public $laptopID; 
   public $laptopCode;
   public $laptopName;
   public $laptopDescription;
   public $ram;
   public $storageCapacity;
   public $inchDimension;
   public $laptopTypeID;
   public $buyPrice;
   public $sellPrice;
   function __construct(
        $laptopID,
    $laptopCode,
    $laptopName,
    $laptopDescription, 
    $ram,                
    $storageCapacity,    
    $inchDimension,      
    $laptopTypeID,
    $buyPrice, 
    $sellPrice
) {
    $this->laptopID = $laptopID;
    $this->laptopCode = $laptopCode;
    $this->laptopName = $laptopName;
    $this->laptopDescription = $laptopDescription; 
    $this->ram = $ram;                               
    $this->storageCapacity = $storageCapacity;       
    $this->inchDimension = $inchDimension;           
    $this->laptopTypeID = $laptopTypeID;
    $this->buyPrice = $buyPrice;
    $this->sellPrice = $sellPrice;
   }
   static function findLaptop($laptopID)
   {
       $db = getDB();
       $query = "SELECT * FROM laptops WHERE laptop_id = $laptopID";
       $result = $db->query($query);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       if ($row) {
           $laptop = new Laptop(
               $row['laptop_id'],
               $row['laptop_code'],
               $row['laptop_name'],
               $row['laptop_description'],
               $row['ram'],
               $row['storage_capacity'],
               $row['inch_dimension'],
               $row['laptop_type_id'],
               $row['laptop_buy_price'],
               $row['laptop_sell_price']
           );
           $db->close();
           return $laptop;
       } else {
           $db->close();
           return NULL;
       }
   }
   function __toString()
   {
       $output = "<h2>Laptop : $this->laptopID</h2>" .
           "<h2>Name: $this->laptopName</h2>\n";
       "<h2>Type ID: $this->laptopTypeID at $this->sellPrice</h2>\n";
       return $output;
   }
   function saveLaptop() {
    $db = getDB();
    $query = "INSERT INTO laptops (laptop_id, laptop_code, laptop_name, laptop_description, ram, 
              storage_capacity, inch_dimension, laptop_type_id, laptop_buy_price, laptop_sell_price) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);
    // i = integer, s = string, d = double (decimal)
    $stmt->bind_param(
        "isssiididd", // 10 characters for 10 placeholders
        $this->laptopID,
        $this->laptopCode,
        $this->laptopName,
        $this->laptopDescription,
        $this->ram,
        $this->storageCapacity,
        $this->inchDimension,
        $this->laptopTypeID,
        $this->buyPrice,
        $this->sellPrice
    );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
      static function getLaptops()
   {
       $db = getDB();
       $query = "SELECT * FROM laptops ORDER BY laptop_id";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $laptops = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $laptop = new Laptop(
                   $row['laptop_id'],
                   $row['laptop_code'],
                   $row['laptop_name'],
                   $row['laptop_description'],
                   $row['ram'],
                   $row['storage_capacity'],
                   $row['inch_dimension'],
                   $row['laptop_type_id'],
                   $row['laptop_buy_price'],
                   $row['laptop_sell_price']
                   
               );
               array_push($laptops, $laptop);
           }
           $db->close();
           return $laptops;
       } else {
           $db->close();
           return NULL;
       }
   }
   function updateLaptop()
   {
       $db = getDB();
    $query = "UPDATE laptops SET 
                laptop_code = ?, 
                laptop_name = ?, 
                laptop_description = ?, 
                ram = ?, 
                storage_capacity = ?, 
                inch_dimension = ?, 
                laptop_type_id = ?, 
                laptop_buy_price = ?, 
                laptop_sell_price = ? 
              WHERE laptop_id = $this->laptopID";

    $stmt = $db->prepare($query);

    // FIX: 9 characters for 9 variables
    // s = string (code, name, desc)
    // i = integer (ram, storage, inch, type_id)
    // d = double (buy_price, sell_price)
    $stmt->bind_param(
        "sssiiiidd", 
        $this->laptopCode,
        $this->laptopName,
        $this->laptopDescription,
        $this->ram,
        $this->storageCapacity,
        $this->inchDimension,
        $this->laptopTypeID,
        $this->buyPrice,
        $this->sellPrice
    );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
   function removeLaptop()
   {
    $db = getDB();
    $query = "DELETE FROM laptops WHERE laptop_id = $this->laptopID";
    $result = $db->query($query);
    $db->close();
    return $result;
   }
}
?>