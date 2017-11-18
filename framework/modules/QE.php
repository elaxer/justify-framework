<?php

namespace Justify\Modules;

/**
 * Class for procedures with quadratic equations
 */
class QE
{
    /**
     * Coefficients of quadratic equation
     * 
     * @var int|float
     */
    private $_a, $_b, $_c;

    /**
     * Discriminant of quadratic equation
     * 
     * @var int|float
     */
    public $discriminant;

    /**
     * Constructor of class
     * 
     * Initialize coefficients and discriminant
     * 
     * @param int|float $a
     * @param int|float $b
     * @param int|float $c
     */
    public function __construct($a, $b, $c)
    {
        $this->_a = $a;
        $this->_b = $b;
        $this->_c = $c;

        $this->discriminant = $this->_getDiscriminant();
    }

    /**
     * Method returns discriminant
     *
     * @access private
     * @return integer
     */
    private function _getDiscriminant()
    {
        return $this->_b * $this->_b - 4 * $this->_a * $this->_c;
    }

    /**
     * Method returns roots/root/false
     *
     * If discriminant > 0 then method returns array of roots
     * If discriminant = 0 then method returns one root
     * If discriminant < 0 then method returns false
     *
     * @access public
     * @return array|integer|bool
     */
    public function getRoots()
    {
        if ($this->discriminant > 0) {
            $roots = [];

            $roots['thirst'] = (-($this->_b) + sqrt($this->discriminant)) / (2 * $this->_a);
            $roots['second'] = (-($this->_b) - sqrt($this->discriminant)) / (2 * $this->_a);

            return $roots;
        }

        if ($this->discriminant === 0) {
            return -($this->_b) / (2 * $this->_a);
        }

        return false;
    }
}
