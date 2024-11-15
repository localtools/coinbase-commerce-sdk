<?php

namespace LocalTools\CoinbaseCommerceSdk\Responses\Checkout;

use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\Extra\LocalPrice;
use LocalTools\CoinbaseCommerceSdk\Responses\Checkout\Extra\MaxContributionAmount;

class GetCheckoutsResponse
{
    public string $brand_color;

    public string $brand_logo_url;

    public bool $coinbase_managed_merchant;

    public string $description;

    public string $extended_description;

    public string $id;

    public LocalPrice $local_price;

    public string $logo_url;

    public MaxContributionAmount $max_contribution_amount;

    public string $name;

    public string $organization_name;

    public string $pricing_type;

    public array $requested_info;

    public string $resource;

    public array $suggested_amounts;

    public function __construct(
        string $brand_color,
        string $brand_logo_url,
        bool $coinbase_managed_merchant,
        string $description,
        string $extended_description,
        string $id,
        LocalPrice $local_price,
        string $logo_url,
        MaxContributionAmount $max_contribution_amount,
        string $name,
        string $organization_name,
        string $pricing_type,
        array $requested_info,
        string $resource,
        array $suggested_amounts
    ) {
        $this->brand_color = $brand_color;
        $this->brand_logo_url = $brand_logo_url;
        $this->coinbase_managed_merchant = $coinbase_managed_merchant;
        $this->description = $description;
        $this->extended_description = $extended_description;
        $this->id = $id;
        $this->local_price = $local_price;
        $this->logo_url = $logo_url;
        $this->max_contribution_amount = $max_contribution_amount;
        $this->name = $name;
        $this->organization_name = $organization_name;
        $this->pricing_type = $pricing_type;
        $this->requested_info = $requested_info;
        $this->resource = $resource;
        $this->suggested_amounts = $suggested_amounts;
    }

    public static function fromArray(array $checkout): GetCheckoutsResponse
    {
        return new GetCheckoutsResponse(
            $checkout['brand_color'],
            $checkout['brand_logo_url'],
            $checkout['coinbase_managed_merchant'],
            $checkout['description'],
            $checkout['extended_description'],
            $checkout['id'],
            $checkout['local_price'],
            $checkout['logo_url'],
            $checkout['max_contribution_amount'],
            $checkout['name'],
            $checkout['organization_name'],
            $checkout['pricing_type'],
            $checkout['requested_info'],
            $checkout['resource'],
            $checkout['suggested_amounts']
        );
    }
}
