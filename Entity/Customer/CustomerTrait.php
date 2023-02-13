<?php

namespace Plugin\management\Entity\Customer;

use Doctrine\ORM\Mapping as ORM;
use Eccube\Annotation as Eccube;

/**
 * @Eccube\EntityExtension("Eccube\Entity\Customer")
 */
trait CustomerTrait
{

    /**
     * @var string
     *
     * @ORM\Column(name="customer_code", type="string", length=100)
     * @Assert\NotBlank
     */
    private $customer_code;

    /**
     * @return string
     */
    public function getCustomerCode()
    {
        return $this->customer_code;
    }

    /**
     * @param string $customer_code
     */
    public function setCustomerCode($customer_code)
    {
        $this->customer_code = $customer_code;
    }
}