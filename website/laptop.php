<?php
require_once('database.php');
class Laptop
{
   public $laptopID;
   public $laptopName;
   public $laptopTypeID;
   public $listPrice;
   function __construct(
        $laptopID,
        $laptopName,
        $laptopTypeID,
        $listPrice
       ) {
       $this->laptopID= $laptopID;
       $this->laptopName = $laptopName;
       $this->laptopTypeID = $laptopTypeID;
       $this->listPrice = $listPrice;
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
               $row['laptop_name'],
               $row['laptop_type_id'],
               $row['list_price']
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
       "<h2>Type ID: $this->laptopTypeID at $this->listPrice</h2>\n";
       return $output;
   }
   function saveLaptop()
   {
       $db = getDB();
       $query = "INSERT INTO laptops VALUES (?, ?, ?, ?)";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "isid",
           $this->laptopID,     // integer data type
           $this->laptopName,   // string data type
           $this->laptopTypeID, // integer data type
           $this->listPrice   // float data type
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
                   $row['laptop_name'],
                   $row['laptop_type_id'],
                   $row['list_price']
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
       $query = "UPDATE laptops SET laptop_name = ?, laptop_type_id = ?, list_price = ? WHERE laptop_id = $this->laptopID";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "sid",
           $this->laptopName,   // string data type
           $this->laptopTypeID, // integer data type
           $this->listPrice,  // float data type 
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