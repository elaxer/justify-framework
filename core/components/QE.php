<?php

namespace Justify\Components;

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
    private $a, $b, $c;

    /**
     * Discriminant of quadratic equation
     * 
     * @var int|float
     */
    private $discriminant;

    /**
     * Constructor of class
     * 
     * Initialize coefficients and discriminant
     * 
     * @param int|float $a
     * @param int|float $b
     * @param int|float $c
     */
    public function __construct(float $a, float $b, float $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->discriminant = $this->getDiscriminant();
    }

    /**
     * Method returns discriminant
     *
     * @return integer|float
     */
    private function getDiscriminant(): float
    {
        return pow($this->b, 2) - 4 * $this->a * $this->c;
    }

    /**
     * Method returns roots or root or false value
     *
     * If discriminant > 0 then method returns array of roots
     * If discriminant = 0 then method returns one root
     * If discriminant < 0 then method returns false
     *
     * @return array|number|bool
     */
    public function getRoots()
    {
        if ($this->discriminant > 0) {
            return [
                'thirst' => (-$this->b + sqrt($this->discriminant)) / (2 * $this->a),
                'second' => (-$this->b - sqrt($this->discriminant)) / (2 * $this->a)
            ];
        }
        
        return $this->discriminant === 0 ? -$this->b / (2 * $this->a) : false;
    }
}
