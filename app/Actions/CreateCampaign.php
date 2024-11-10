<?php

namespace App\Actions;

use Propaganistas\LaravelPhone\Rules\Phone as PhoneRule;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\{DB, Validator};
use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\{Agent, Campaign};
use App\Interfaces\CampaignUser;

class CreateCampaign
{
    use AsAction;

    /**
     * @throws ValidationException
     */
    public function handle(CampaignUser $campaignUser, array $input): Campaign
    {
        $validated = Validator::make($input, $this->rules())->validate();

        return DB::transaction(function () use ($campaignUser, $validated) {
            return tap(app(Campaign::class)->make($validated), function ($campaign) use ($campaignUser, $validated) {
                $campaign->agent()->associate($campaignUser);
                $organization = $campaignUser->getRelationValue('currentOrganization');
                $campaign->organization()->associate($organization);
                $campaign->save();
                $campaignUser->switchCampaign($campaign);
            });
        });
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email'],
            'mobile' => ['nullable', (new PhoneRule)->mobile()->country('PH')],
            'webhook' => ['nullable', 'url'],
        ];
    }
}
