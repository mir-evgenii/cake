<?php

/**
* 
*/
class Bid extends AppModel
{
	public function isOwnedBy($bid, $user) {
    return $this->field('id', array('id' => $bid, 'user_id' => $user)) !== false;
    }
}

?>