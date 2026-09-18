<?php

class Order
{
    private string $customer;
    private float $amount;

    public function __construct(string $customer, float $amount)
    {
        $this->customer = $customer;
        $this->amount = $amount;
    }

    public function getCustomer(): string
    {
        return $this->customer;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }
}

class OrderManager
{
    private array $orders = [];

    public function addOrder(string $customer, float $amount): void
    {
        $this->orders[] = new Order($customer, $amount);
    }

    public function totalRevenue(): float
    {
        $total = 0.0;

        foreach ($this->orders as $order) {
            $total += $order->getAmount();
        }

        return $total;
    }

    public function printReport(): void
    {
        echo "Order Report\n";
        echo "============\n";

        foreach ($this->orders as $order) {
            echo $order->getCustomer()
                . " | $"
                . number_format($order->getAmount(), 2)
                . PHP_EOL;
        }

        echo "============\n";
        echo "Total Revenue: $"
            . number_format($this->totalRevenue(), 2)
            . PHP_EOL;
    }
}

$manager = new OrderManager();

$manager->addOrder("Alice", 145.90);
$manager->addOrder("Brian", 89.50);
$manager->addOrder("Clara", 215.75);
$manager->addOrder("David", 63.40);

$manager->printReport();

?>