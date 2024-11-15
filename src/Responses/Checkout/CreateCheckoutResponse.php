<?php

namespace LocalTools\CoinbaseCommerceSdk\Responses\Checkout;

use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\Extra\LocalPrice;

class CreateCheckoutResponse
{
    public string $brand_color;

    public string $brand_logo_url;

    public bool $coinbase_managed_merchant;

    public string $description;

    public string $id;

    public LocalPrice $local_price;

    public string $name;

    public string $organization_name;

    public string $pricing_type;

    public string $requested_info;

    public string $resource;

    public function __construct(
        string $brand_color,
        string $brand_logo_url,
        bool $coinbase_managed_merchant,
        string $description,
        string $id,
        LocalPrice $local_price,
        string $name,
        string $organization_name,
        string $pricing_type,
        string $requested_info,
        string $resource
    ) {
        $this->brand_color = $brand_color;
        $this->brand_logo_url = $brand_logo_url;
        $this->coinbase_managed_merchant = $coinbase_managed_merchant;
        $this->description = $description;
        $this->id = $id;
        $this->local_price = $local_price;
        $this->name = $name;
        $this->organization_name = $organization_name;
        $this->pricing_type = $pricing_type;
        $this->requested_info = $requested_info;
        $this->resource = $resource;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['brand_color'],
            $data['brand_logo_url'],
            $data['coinbase_managed_merchant'],
            $data['description'],
            $data['id'],
            LocalPrice::fromArray($data['local_price']),
            $data['name'],
            $data['organization_name'],
            $data['pricing_type'],
            $data['requested_info'],
            $data['resource']
        );
    }

    public function toArray(): array
    {
        return [
            'brand_color' => $this->brand_color,
            'brand_logo_url' => $this->brand_logo_url,
            'coinbase_managed_merchant' => $this->coinbase_managed_merchant,
            'description' => $this->description,
            'id' => $this->id,
            'local_price' => $this->local_price->toArray(),
            'name' => $this->name,
            'organization_name' => $this->organization_name,
            'pricing_type' => $this->pricing_type,
            'requested_info' => $this->requested_info,
            'resource' => $this->resource,
        ];
    }
}
