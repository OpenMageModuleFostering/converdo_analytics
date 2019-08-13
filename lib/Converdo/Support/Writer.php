<?php

class Converdo_Support_Writer
{
    /**
     * @var string
     */
    public $view;

    /**
     * @var array
     */
    public $data = [];

    /**
     * @var null|Converdo_Tracker_Query_Interface_QueryInterface
     */
    public $query;

    /**
     * @var null|Varien_Object
     */
    public $entity;

    /**
     * @param $input
     * @return $this
     */
    public function make($input)
    {
        unset($this->query, $this->entity, $this->view);

        if ($input instanceof Converdo_Tracker_Query_Interface_QueryInterface) {
            $this->view($input->getView());
            $this->with($input->getData());
            $this->query = $input;
        } else {
            $this->view($input);
        }

        return $this;
    }

    /**
     * Write a new line.
     *
     * @param $name
     * @return $this
     */
    public function view($name)
    {
        $this->view = (string) $name;
        return $this;
    }

    /**
     * Write a new line with this data.
     *
     * @param mixed $data
     * @return $this
     */
    public function with($data)
    {
        if ($data instanceof Varien_Object || $data instanceof Converdo_Entity_Interface_EntityInterface) {
            $this->withEntity($data);
        } elseif (is_array($data)) {
            $this->withData($data);
        }

        return $this;
    }

    /**
     * Add data to the query straight from the code.
     *
     * @param array $data
     * @return $this
     */
    protected function withData(array $data = [])
    {
        if (isset($this->query) && !empty($this->query)) {
            $this->data = @((array) $this->query->getData() + $data);
        } else {
            $this->data = (array) $data;
        }

        ksort($this->data);
        $this->data = array_values($this->data);
    }

    /**
     * Add data to the query from an entity.
     *
     * @param $entity
     * @return array
     */
    protected function withEntity($entity)
    {
        $this->query->setEntity($entity);
        $this->data = (array) $this->query->getData();
    }

    public function write()
    {
        $output = new Converdo_Support_StringBuilder;

        $output->append("_paq.push(['{$this->view}'");

        foreach ($this->data as $key => $value) {
            if (is_numeric($value) && $value > 0 && $value == round($value, 0)) {
                $output->append(", {$value}");
            } elseif ($value === false) {
                $output->append(', false');
            } else {
                $output->append(", '{$value}'");
            }
        }

        $output->append("]);")->append("\n\t\t\t\t");

        echo $output->toString();
    }
}