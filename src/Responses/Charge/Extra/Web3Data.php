<?php

namespace LocalTools\CoinbaseCommerceSdk\Responses\Charge\Extra;

class Web3Data
{
    public ?string $transfer_intent;

    public array $success_events;

    public array $failure_events;

    public array $contract_addresses;

    public array $settlement_currency_addresses;

    public array $subsidized_payments_chain_to_tokens;

    public string $contract_caller_request_id;

    public function __construct(
        ?string $transfer_intent,
        array $success_events,
        array $failure_events,
        array $contract_addresses,
        array $settlement_currency_addresses,
        array $subsidized_payments_chain_to_tokens,
        string $contract_caller_request_id
    ) {
        $this->transfer_intent = $transfer_intent;
        $this->success_events = $success_events;
        $this->failure_events = $failure_events;
        $this->contract_addresses = $contract_addresses;
        $this->settlement_currency_addresses = $settlement_currency_addresses;
        $this->subsidized_payments_chain_to_tokens = $subsidized_payments_chain_to_tokens;
        $this->contract_caller_request_id = $contract_caller_request_id;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['transfer_intent'],
            $data['success_events'],
            $data['failure_events'],
            $data['contract_addresses'],
            $data['settlement_currency_addresses'],
            $data['subsidized_payments_chain_to_tokens'],
            $data['contract_caller_request_id']
        );
    }

    public function toArray(): array
    {
        return [
            'transfer_intent' => $this->transfer_intent,
            'success_events' => $this->success_events,
            'failure_events' => $this->failure_events,
            'contract_addresses' => $this->contract_addresses,
            'settlement_currency_addresses' => $this->settlement_currency_addresses,
            'subsidized_payments_chain_to_tokens' => $this->subsidized_payments_chain_to_tokens,
            'contract_caller_request_id' => $this->contract_caller_request_id,
        ];
    }
}
