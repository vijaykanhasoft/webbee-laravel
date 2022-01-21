<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

  
  public function getAlldata($id)
  {
   
    $childerns = collect();
    $parents = MenuItem::where("parent_id",$id)->get();
    foreach($parents as $d){
    
        $d["children"] = $this->getAlldata($d->id);
     
        $childerns->push($d);
    }
    
    return $childerns;      
  }

      
}
