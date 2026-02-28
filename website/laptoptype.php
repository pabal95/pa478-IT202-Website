<?php
require_once('database.php');
class LaptopType
{
   public $laptopTypeID;
   public $laptopTypeCode;
   public $laptopTypeName;
   public $laptopShelfNumber;
   function __construct($laptopTypeID, $laptopTypeCode, $laptopTypeName, $laptopShelfNumber)
   {
       $this->laptopTypeID = $laptopTypeID;
       $this->laptopTypeCode = $laptopTypeCode;
       $this->laptopTypeName = $laptopTypeName;
       $this->laptopShelfNumber = $laptopShelfNumber;
   }
   function __toString()
   {
       $output = "<h2>$this->laptopTypeID - $this->laptopTypeCode, $this->laptopTypeName, Shelf No: $this->laptopShelfNumber</h2>\n";
       return $output;
   }
   static function findLaptopType($laptopTypeID)
   {
       $db = getDB();
       $query = "SELECT * FROM laptop_types WHERE laptop_type_id = $laptopTypeID";
       $result = $db->query($query);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       if ($row) {
           $laptopType = new LaptopType(
               $row['laptop_type_id'],
               $row['laptop_type_code'],
               $row['laptop_type_name'],
               $row['laptop_ShelfNumber']
           );
           $db->close();
           return $laptopType;
       } else {
           $db->close();
           return NULL;
       }
   }
   function saveLaptopType()
   {
       $db = getDB();
       $query = "INSERT INTO laptop_types (laptop_type_id, laptop_type_code, laptop_type_name, laptop_ShelfNumber) 
              VALUES (?, ?, ?, ?)";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "issi",
           $this->laptopTypeID,
           $this->laptopTypeCode,
           $this->laptopTypeName,
           $this->laptopShelfNumber
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
      static function getLaptopTypes()
   {
       $db = getDB();
       $query = "SELECT * FROM laptop_types ORDER BY laptop_type_id";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $laptopTypes = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $laptopType = new LaptopType(
                   $row['laptop_type_id'],
                   $row['laptop_type_code'],
                   $row['laptop_type_name'],
                   $row['laptop_ShelfNumber']
               );
               array_push($laptopTypes, $laptopType);
               unset($laptopType);
           }
           $db->close();
           return $laptopTypes;
       } else {
           $db->close();
           return NULL;
       }
   }
      function updateLaptopType()
   {
       $db = getDB();
       $query = "UPDATE laptop_types SET laptop_type_code = ?, " .
           "laptop_type_name = ?, laptop_ShelfNumber = ? " .
           "WHERE laptop_type_id = $this->laptopTypeID";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "ssi",
           $this->laptopTypeCode,
           $this->laptopTypeName,
           $this->laptopShelfNumber
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
    function removeLaptopType() {
         $db = getDB();
         $query = "DELETE FROM laptop_types WHERE laptop_type_id = $this->laptopTypeID";
         $result = $db->query($query);
         $db->close();
         return $result;
    }
}
?>