<?php

namespace App\Console\Commands;

use App\Repository\PaymentRepository;
use App\Services\PaymentService\YookassaApi;
use App\Services\PaymentStatusUpdateService\StatusUpdateService;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;
use YooKassa\Common\Exceptions\ApiException;
use YooKassa\Common\Exceptions\BadApiRequestException;
use YooKassa\Common\Exceptions\ExtensionNotFoundException;
use YooKassa\Common\Exceptions\ForbiddenException;
use YooKassa\Common\Exceptions\InternalServerError;
use YooKassa\Common\Exceptions\NotFoundException;
use YooKassa\Common\Exceptions\ResponseProcessingException;
use YooKassa\Common\Exceptions\TooManyRequestsException;
use YooKassa\Common\Exceptions\UnauthorizedException;

class UpdatePayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payments:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @param StatusUpdateService $service
     * @return int
     */
    public function handle(StatusUpdateService $service): int
    {
        $service->execute();

        return CommandAlias::SUCCESS;
    }
}
