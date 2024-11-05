<?php

namespace App\Notifications;

use Illuminate\Notifications\Slack\BlockKit\Composites\ConfirmObject;
use Illuminate\Notifications\Slack\BlockKit\Blocks\ContextBlock;
use Illuminate\Notifications\Slack\BlockKit\Blocks\SectionBlock;
use Illuminate\Notifications\Messages\MailMessage;
use App\Interfaces\MustChooseNotificationRoutes;
use NotificationChannels\Webhook\WebhookMessage;
use Illuminate\Notifications\Slack\SlackMessage;
use LBHurtado\EngageSpark\EngageSparkMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Traits\HasNotificationRoutes;
use Illuminate\Bus\Queueable;
use App\Models\Checkin;

class CheckinFeedback extends Notification implements MustChooseNotificationRoutes, ShouldQueue
{
    use HasNotificationRoutes;
    use Queueable;

    public function __construct(public Checkin $checkin){}

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    public function toEngageSpark(object $notifiable): EngageSparkMessage
    {
        $message = 'The quick brown fox jumps over the lazy dog.';

        return (new EngageSparkMessage())
            ->content($message);
    }

    public function toWebhook(object $notifiable): WebhookMessage
    {
        logger('NewCheckinFeedback@toWebhook');
        $data = $this->checkin->toArray();

        return WebhookMessage::create()
            ->header('X-Custom', 'Custom-Header')
            ->userAgent("Custom-User-Agent")
            ->data($data)
            ;
    }

    public function toSlack(object $notifiable): SlackMessage
    {
        return (new SlackMessage)
            ->text('One of your invoices has been paid!')
            ->headerBlock('Invoice Paid')
            ->contextBlock(function (ContextBlock $block) {
                $block->text('Customer #1234');
            })
            ->sectionBlock(function (SectionBlock $block) {
                $block->text('An invoice has been paid.');
                $block->field("*Invoice No:*\n1000")->markdown();
                $block->field("*Invoice Recipient:*\ntaylor@laravel.com")->markdown();
            })
            ->dividerBlock()
            ->sectionBlock(function (SectionBlock $block) {
                $block->text('Congratulations!');
            });
    }
}
