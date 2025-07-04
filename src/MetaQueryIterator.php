<?php

namespace Indielab\AutoScout24;

/**
 * Meta Query Iterator.
 *
 * @method Meta lng()
 * @method Meta page();
 * @method Meta itemsPerPage()
 * @method Meta vehtyp()
 * @method Meta sort()
 * @method Meta makefull()
 * @method Meta modelfull()
 * @method Meta make()
 * @method Meta model()
 * @method Meta typename()
 * @method Meta body()
 * @method Meta fuel()
 * @method Meta trans()
 * @method Meta drive()
 * @method Meta polnorm()
 * @method Meta liccat()
 * @method Meta consrat()
 * @method Meta cond()
 * @method Meta bodycol()
 * @method Meta intcol()
 * @method Meta tshaft()
 * @method Meta seg()
 * @method Meta equip()
 * @method Meta equipor()
 * @method Meta prop()
 * @method Meta extras()
 * @method Meta yearfrom()
 * @method Meta yearto()
 * @method Meta kmfrom()
 * @method Meta kmto()
 * @method Meta seatsfrom()
 * @method Meta seatsto()
 * @method Meta doorsfrom()
 * @method Meta doorsto()
 * @method Meta pricefrom()
 * @method Meta priceto()
 * @method Meta ccmfrom()
 * @method Meta ccmto()
 * @method Meta co2emitfrom()
 * @method Meta co2mitto()
 * @method Meta consfrom()
 * @method Meta consto()
 * @method Meta hpfrom()
 * @method Meta hpto()
 * @method Meta rad()
 * @method Meta loc()
 * @method Meta age()
 * @method Meta onlytoorder()
 * @method Meta includetoorder()
 * @method Meta hasimage()
 * @method Meta logo()
 *
 * @author Basil Suter <basil@nadar.io>
 */
class MetaQueryIterator implements \Iterator
{
    private array $_data;

    public function __construct(array $data)
    {
        $this->_data = $data;
    }

    #[\ReturnTypeWillChange]
    public function rewind(): void
    {
        reset($this->_data);
    }

    /**
     * @return Meta Returns the Vehicle Object.
     */
    #[\ReturnTypeWillChange]
    public function current(): Meta
    {
        return new Meta(current($this->_data));
    }

    /**
     * @return mixed The current position key
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
        return key($this->_data);
    }

    #[\ReturnTypeWillChange]
    public function next(): void
    {
        next($this->_data);
    }

    #[\ReturnTypeWillChange]
    public function valid(): bool
    {
        return key($this->_data) !== null;
    }

    /**
     * Filters the query iterator by one item and returns the Object.
     *
     * @param string $varName
     * @return Meta
     */
    public function filter(string $varName): Meta
    {
        $key = array_search($varName, array_column($this->_data, 'ParameterName'));

        return new Meta($this->_data[$key]);
    }

    /**
     * Magic method to handle dynamic method calls.
     *
     * @param string $name The name of the method being called.
     * @param array $args The arguments passed to the method.
     * @return Meta The result of the dynamic method call processing.
     */
    public function __call(string $name, array $args): Meta
    {
        return $this->filter($name);
    }
}
