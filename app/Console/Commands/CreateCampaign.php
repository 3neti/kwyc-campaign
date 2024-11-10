<?php

namespace App\Console\Commands;

use App\Actions\CreateCampaign as Action;
use function Laravel\Prompts\text;
use function Laravel\Prompts\form;
use Illuminate\Console\Command;
use App\Models\{Agent, System};

class CreateCampaign extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-campaign';

    protected Action $action;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(Action $action)
    {
        $this->action = $action;

        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $responses = form()
            ->text(
                label: 'Campaign Name',
                validate: $this->action->rules()['name'],
                name: 'name'
            )
            ->text(
                label: 'Email Address',
                validate: $this->action->rules()['email'],
                name: 'email'
            )
            ->text(
                label: 'Mobile Number',
                validate: $this->action->rules()['mobile'],
                name: 'mobile'
            )
            ->text(
                label: 'Webhook URL',
                validate: $this->action->rules()['webhook'],
                name: 'webhook'
            )
            ->submit();

        $system = System::first();

        $campaign = $this->action->run($system, $responses);
        $this->info($campaign->name . '  created.');
        $this->info($campaign->url);
    }
}
