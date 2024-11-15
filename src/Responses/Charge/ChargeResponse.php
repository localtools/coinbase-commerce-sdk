<?php

namespace LocalTools\CoinbaseCommerceSdk\Responses\Charge;

use LocalTools\CoinbaseCommerceSdk\Responses\Charge\Extra\Web3Data;
use LocalTools\CoinbaseCommerceSdk\Responses\Charge\Extra\Web3RetailPaymentMetadata;

class ChargeResponse
{
    public ?string $brand_color;

    public ?string $brand_logo_url;

    public string $charge_kind;

    public string $code;

    public bool $collected_email;

    public string $created_at;

    public string $description;

    public string $expires_at;

    public string $hosted_url;

    public string $id;

    public array $metadata;

    public string $name;

    public bool $ocs_points_override;

    public ?string $organization_name;

    public array $payments;

    public array $pricing;

    public string $pricing_type;

    public bool $pwcb_only;

    public array $redirects;

    public string $support_email;

    public array $timeline;

    public ?Web3Data $web3_data;

    public ?Web3RetailPaymentMetadata $web3_retail_payment_metadata;

    public bool $web3_retail_payments_enabled;

    public function __construct(
        ?string $brand_color,
        ?string $brand_logo_url,
        string $charge_kind,
        string $code,
        bool $collected_email,
        string $created_at,
        string $description,
        string $expires_at,
        string $hosted_url,
        string $id,
        array $metadata,
        string $name,
        bool $ocs_points_override,
        ?string $organization_name,
        array $payments,
        array $pricing,
        string $pricing_type,
        bool $pwcb_only,
        array $redirects,
        string $support_email,
        array $timeline,
        ?Web3Data $web3_data,
        ?Web3RetailPaymentMetadata $web3_retail_payment_metadata,
        bool $web3_retail_payments_enabled
    ) {
        $this->brand_color = $brand_color;
        $this->brand_logo_url = $brand_logo_url;
        $this->charge_kind = $charge_kind;
        $this->code = $code;
        $this->collected_email = $collected_email;
        $this->created_at = $created_at;
        $this->description = $description;
        $this->expires_at = $expires_at;
        $this->hosted_url = $hosted_url;
        $this->id = $id;
        $this->metadata = $metadata;
        $this->name = $name;
        $this->ocs_points_override = $ocs_points_override;
        $this->organization_name = $organization_name;
        $this->payments = $payments;
        $this->pricing = $pricing;
        $this->pricing_type = $pricing_type;
        $this->pwcb_only = $pwcb_only;
        $this->redirects = $redirects;
        $this->support_email = $support_email;
        $this->timeline = $timeline;
        $this->web3_data = $web3_data;
        $this->web3_retail_payment_metadata = $web3_retail_payment_metadata;
        $this->web3_retail_payments_enabled = $web3_retail_payments_enabled;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['brand_color'],
            $data['brand_logo_url'],
            $data['charge_kind'],
            $data['code'],
            $data['collected_email'],
            $data['created_at'],
            $data['description'],
            $data['expires_at'],
            $data['hosted_url'],
            $data['id'],
            $data['metadata'],
            $data['name'],
            $data['ocs_points_override'],
            $data['organization_name'],
            $data['payments'],
            $data['pricing'],
            $data['pricing_type'],
            $data['pwcb_only'],
            $data['redirects'],
            $data['support_email'],
            $data['timeline'],
            isset($data['web3_data']) ? Web3Data::fromArray($data['web3_data']) : null,
            isset($data['web3_retail_payment_metadata']) ? Web3RetailPaymentMetadata::fromArray($data['web3_retail_payment_metadata']) : null,
            $data['web3_retail_payments_enabled']
        );
    }

    public function toArray(): array
    {
        return [
            'brand_color' => $this->brand_color,
            'brand_logo_url' => $this->brand_logo_url,
            'charge_kind' => $this->charge_kind,
            'code' => $this->code,
            'collected_email' => $this->collected_email,
            'created_at' => $this->created_at,
            'description' => $this->description,
            'expires_at' => $this->expires_at,
            'hosted_url' => $this->hosted_url,
            'id' => $this->id,
            'metadata' => $this->metadata,
            'name' => $this->name,
            'ocs_points_override' => $this->ocs_points_override,
            'organization_name' => $this->organization_name,
            'payments' => $this->payments,
            'pricing' => $this->pricing,
            'pricing_type' => $this->pricing_type,
            'pwcb_only' => $this->pwcb_only,
            'redirects' => $this->redirects,
            'support_email' => $this->support_email,
            'timeline' => $this->timeline,
            'web3_data' => $this->web3_data ? $this->web3_data->toArray() : null,
            'web3_retail_payment_metadata' => $this->web3_retail_payment_metadata ? $this->web3_retail_payment_metadata->toArray() : null,
            'web3_retail_payments_enabled' => $this->web3_retail_payments_enabled,
        ];
    }
}
