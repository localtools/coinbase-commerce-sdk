<?php

namespace LocalTools\CoinbaseCommerceSdk\Responses\Events;

class EventResponse
{
    public string $id;

    public string $code;

    public string $name;

    public array $pricing;

    public array $metadata;

    public array $payments;

    public array $timeline;

    public bool $pwcb_only;

    public array $redirects;

    public array $web3_data;

    public string $created_at;

    public string $expires_at;

    public string $hosted_url;

    public string $brand_color;

    public string $charge_kind;

    public string $description;

    public string $pricing_type;

    public string $support_email;

    public string $brand_logo_url;

    public bool $collected_email;

    public string $organization_name;

    public bool $ocs_points_override;

    public array $web3_retail_payment_metadata;

    public bool $web3_retail_payments_enabled;

    public function __construct(
        string $id,
        string $code,
        string $name,
        array $pricing,
        array $metadata,
        array $payments,
        array $timeline,
        bool $pwcb_only,
        array $redirects,
        array $web3_data,
        string $created_at,
        string $expires_at,
        string $hosted_url,
        string $brand_color,
        string $charge_kind,
        string $description,
        string $pricing_type,
        string $support_email,
        string $brand_logo_url,
        bool $collected_email,
        string $organization_name,
        bool $ocs_points_override,
        array $web3_retail_payment_metadata,
        bool $web3_retail_payments_enabled
    ) {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->pricing = $pricing;
        $this->metadata = $metadata;
        $this->payments = $payments;
        $this->timeline = $timeline;
        $this->pwcb_only = $pwcb_only;
        $this->redirects = $redirects;
        $this->web3_data = $web3_data;
        $this->created_at = $created_at;
        $this->expires_at = $expires_at;
        $this->hosted_url = $hosted_url;
        $this->brand_color = $brand_color;
        $this->charge_kind = $charge_kind;
        $this->description = $description;
        $this->pricing_type = $pricing_type;
        $this->support_email = $support_email;
        $this->brand_logo_url = $brand_logo_url;
        $this->collected_email = $collected_email;
        $this->organization_name = $organization_name;
        $this->ocs_points_override = $ocs_points_override;
        $this->web3_retail_payment_metadata = $web3_retail_payment_metadata;
        $this->web3_retail_payments_enabled = $web3_retail_payments_enabled;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['code'],
            $data['name'],
            $data['pricing'],
            $data['metadata'],
            $data['payments'],
            $data['timeline'],
            $data['pwcb_only'],
            $data['redirects'],
            $data['web3_data'],
            $data['created_at'],
            $data['expires_at'],
            $data['hosted_url'],
            $data['brand_color'],
            $data['charge_kind'],
            $data['description'],
            $data['pricing_type'],
            $data['support_email'],
            $data['brand_logo_url'],
            $data['collected_email'],
            $data['organization_name'],
            $data['ocs_points_override'],
            $data['web3_retail_payment_metadata'],
            $data['web3_retail_payments_enabled']
        );
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'pricing' => $this->pricing,
            'metadata' => $this->metadata,
            'payments' => $this->payments,
            'timeline' => $this->timeline,
            'pwcb_only' => $this->pwcb_only,
            'redirects' => $this->redirects,
            'web3_data' => $this->web3_data,
            'created_at' => $this->created_at,
            'expires_at' => $this->expires_at,
            'hosted_url' => $this->hosted_url,
            'brand_color' => $this->brand_color,
            'charge_kind' => $this->charge_kind,
            'description' => $this->description,
            'pricing_type' => $this->pricing_type,
            'support_email' => $this->support_email,
            'brand_logo_url' => $this->brand_logo_url,
            'collected_email' => $this->collected_email,
            'organization_name' => $this->organization_name,
            'ocs_points_override' => $this->ocs_points_override,
            'web3_retail_payment_metadata' => $this->web3_retail_payment_metadata,
            'web3_retail_payments_enabled' => $this->web3_retail_payments_enabled,
        ];
    }
}
