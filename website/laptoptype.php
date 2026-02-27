<?php
require_once('database.php');
class LaptopType
{
   public $laptopTypeID;
   public $laptopTypeCode;
   public $laptopTypeName;
   function __construct($laptopTypeID, $laptopTypeCode, $laptopTypeName)
   {
       $this->laptopTypeID = $laptopTypeID;
       $this->laptopTypeCode = $laptopTypeCode;
       $this->laptopTypeName = $laptopTypeName;
   }
   function __toString()
   {
       $output = "<h2>$this->laptopTypeID - $this->laptopTypeCode, $this->laptopTypeName</h2>\n";
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
               $row['laptop_type_name']
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
       $query = "INSERT INTO laptop_types VALUES (?, ?, ?)";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "iss",
           $this->laptopTypeID,
           $this->laptopTypeCode,
           $this->laptopTypeName
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
                   $row['laptop_type_name']
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
           "laptop_type_name = ? " .
           "WHERE laptop_type_id = $this->laptopTypeID";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "ss",
           $this->laptopTypeCode,
           $this->laptopTypeName
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