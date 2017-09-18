<?php
/**
 * Class for procedures with quadratic equations
 */

namespace justify\framework\modules;

class QE
{
    private
        $a, $b, $c;

    public function __construct($a, $b, $c)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function getDiscriminant()
    {
        return $this->b * $this->b - 4 * $this->a * $this->c;
    }

    public function getRoot()
    {
        if ($this->getDiscriminant() > 0) {
            $roots = array();

            $roots['thirst'] = (-($this->b) + sqrt($this->getDiscriminant())) / (2 * $this->a);
            $roots['second'] = (-($this->b) - sqrt($this->getDiscriminant())) / (2 * $this->a);

            return $roots;
        }

        if ($this->getDiscriminant() === 0) {
            return -($this->b) / (2 * $this->a);
        }

        return false;
    }
}
