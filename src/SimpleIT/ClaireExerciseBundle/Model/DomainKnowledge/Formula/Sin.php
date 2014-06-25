<?php

namespace SimpleIT\ClaireExerciseBundle\Model\DomainKnowledge\Formula;

use SimpleIT\ClaireExerciseBundle\Exception\NotEvaluableException;

/**
 * Class Sin
 *
 * @author Baptiste Cablé <baptiste.cable@liris.cnrs.fr>
 */
class Sin extends Expression
{
    /**
     * @const EXPR_NAME = 'sin'
     */
    const EXPR_NAME = 'sin';

    /**
     * @var Expression
     */
    private $expression;

    /**
     * Evaluate the result of the operation with the values specified in parameters for the
     * variables.
     *
     * @param array $parameters
     *
     * @throws NotEvaluableException
     * @return int|float
     */
    public function evaluate(array $parameters = array())
    {
        return sin($this->expression->evaluate($parameters));
    }

    /**
     * Sets the values of the variables
     *
     * @param array $parameters
     */
    public function valuate(array $parameters)
    {
        $this->expression->valuate($parameters);
    }

    /**
     * Return if the expression contains one of the specified variables
     *
     * @param array $varNames
     *
     * @return bool
     */
    public function containsOneOfVariables(array $varNames)
    {
        return $this->expression->containsOneOfVariables($varNames);
    }

    /**
     * Checks if exactly one branch of the expression contains the variable
     *
     * @param $varName
     *
     * @return int
     */
    public function countBranchWithVariable($varName)
    {
        if ($this->containsOneOfVariables(array($varName))) {
            return 1;
        }

        return 0;
    }

    /**
     * Set expression
     *
     * @param \SimpleIT\ClaireExerciseBundle\Model\DomainKnowledge\Formula\Expression $expression
     */
    public function setExpression($expression)
    {
        $this->expression = $expression;
    }

    /**
     * Get expression
     *
     * @return \SimpleIT\ClaireExerciseBundle\Model\DomainKnowledge\Formula\Expression
     */
    public function getExpression()
    {
        return $this->expression;
    }

    /**
     * Get the expression name
     *
     * @return string
     */
    public function getExprName()
    {
        return self::EXPR_NAME;
    }

    /**
     * Distributes the multiplication over the addition
     *
     * @param string $varName
     *
     * @return Expression
     */
    public function distributeMultiplication($varName)
    {
        return $this;
    }

    /**
     * Get a clean version of the expression
     *
     * @return Expression
     */
    public function getClean()
    {
        $this->expression = $this->expression->getClean();

        return $this;
    }
}
