<?php

namespace justify\framework\modules;

/**
 * Class for procedures with quadratic equations
 */
class QE
{
    private $a, $b, $c;

    public $discriminant;

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;

        $this->discriminant = $this->getDiscriminant();
    }

    /**
     * Method returns discriminant
     *
     * @access private
     * @return integer
     */
    private function getDiscriminant()
    {
        return $this->b * $this->b - 4 * $this->a * $this->c;
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
    public function getRoot()
    {
        if ($this->discriminant > 0) {
            $roots = [];

            $roots['thirst'] = (-($this->b) + sqrt($this->discriminant)) / (2 * $this->a);
            $roots['second'] = (-($this->b) - sqrt($this->discriminant)) / (2 * $this->a);

            return $roots;
        }

        if ($this->discriminant === 0) {
            return -($this->b) / (2 * $this->a);
        }

        return false;
    }
}
