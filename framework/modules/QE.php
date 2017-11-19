<?php

namespace Justify\Modules;

use Justify\Exceptions\InvalidArgumentException;

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
        try {
            if (!is_numeric($a)) {
                throw new InvalidArgumentException('number', gettype($a));
            }
            if (!is_numeric($b)) {
                throw new InvalidArgumentException('number', gettype($b));
            }
            if (!is_numeric($c)) {
                throw new InvalidArgumentException('number', gettype($c));
            }

            $this->_a = $a;
            $this->_b = $b;
            $this->_c = $c;

            $this->discriminant = $this->_getDiscriminant();
        } catch (InvalidArgumentException $e) {
            $e->printError();
        }

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
     * Method returns roots or root or false value
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
            return [
                'thirst' => (-($this->_b) + sqrt($this->discriminant)) / (2 * $this->_a),
                'second' => (-($this->_b) - sqrt($this->discriminant)) / (2 * $this->_a)
            ];
        }

        if ($this->discriminant === 0) {
            return -($this->_b) / (2 * $this->_a);
        }

        return false;
    }
}
