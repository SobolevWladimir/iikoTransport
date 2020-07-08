<?php

namespace IikoTransport\Entity; 



class Order
{
 
  /**
   * string(uuid) 
   * Order ID. Must be unique.
   *  If sent null, it generates automatically on iikoTransport side.
   */
  private $id; 

  /**
   * string  <local-date-time> Nullable 
   * Order fulfillment date. 
   *  Date and time must be local for delivery terminal, without time zone (take a look at example). If null, order is urgent and time is calculated based on customer settings, i.e. the shortest delivery time possible. Permissible values: from current day and 14 days on.
   */
  private $completeBefore; 


  /**
   * Array of Product (object) or Compound (object) 
   * Order items(may include ProductOrderItem or CompoundOrderItem). 
   */
  private $items; 

  /**
   * Array of Combo 
   * Combos included in order.
   */

  private $combos; 

  /**
   * array of  Payment 
   */
  private $payment; 


  /**
   * string 
   * Telephone number.
   */ 
  private $phone; 

  /*
   * string
   * Order type ID.
   */
  private $orderTypeId; 

  /*
   * string (uuid) 
   * Order service type. 
   */ 
  private $orderServiceType; 


 /*
  * DeliveryPoint
  * Delivery point details.
  */
  private $deliveryPoint; 

  /*
   * string
   */
  private $comment; 

  /*
   * Guests
   */
  private $guests; 

  /*
   * string 
   */
  private $marketingSourceId; 

  /*
   * DiscountInfo
   */
  private $discountsInfo; 

  /*
   * Customer
   */ 
  private $customer; 

  /*
   * IikoCardInfo 
   * Information about iikoCard5.
   */ 
  private $iikoCard5Info;

  /*
   * string 
   * The string key (marker) of the source (partner - api user) that created the order.
   */
  private $sourceKey; 


}
