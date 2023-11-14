<?php

namespace App\Data;

class SearchData 
{
    /**
     * Undocumented variable
     *
     * @var integer
     */
  public $page= 1;
     /**
      * varibale qui represente bare de recherche
      *
      * @var string
      */
    public $q='';


    /**
     * varibale qui represente filtere category
     * 
     * @var Categories[]
     */
    public $Category=[];
    

    /**
     *  varibale qui represente filtere prix max
     * 
     * @var int|null
     */

    public $pmax;


     /**
      *  varibale qui represente filtere prix min

     * @var int|null
     */
    public $pmin;



     /**
      *  varibale qui represente filtere k/m max

     * @var null|integer
     */

     public $kmax;


     /**
      * varibale qui represente filtere k/m min

     * @var null|integer
     */
     public $kmin;



     /**
      * varibale qui represente filtere Année max

     * @var null|integer
     */

     public $amax;


     /**
      * varibale qui represente filtere Année min 

     * @var null|integer
     */
     public $amin;

    /**
     *  varibale qui represente select promotion
     * @var boolean
     */

     public $promo= false;


   public function __toString()
   {
    return $this->q;
   
   }

}



?>