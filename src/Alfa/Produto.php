<?php

namespace Alfa;

class Produto extends Entidade {
    
    public function __construct(BaseDeDados $db) {
        parent::__construct($db);
    }
    
}